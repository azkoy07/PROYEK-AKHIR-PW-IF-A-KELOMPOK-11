<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CheckoutController extends Controller
{
    // Menghitung subtotal berdasarkan barang yang sedang akan dibeli
    private function getCheckoutSubtotal($userId)
    {
        $direct = session('checkout_direct');

        if ($direct) {
            $product = DB::table('products')
                ->where('id', $direct['product_id'])
                ->where('status', 'aktif')
                ->first();

            if (!$product) {
                return null;
            }

            if ($direct['variant_id']) {
                $variant = DB::table('product_variants')
                    ->where('id', $direct['variant_id'])
                    ->where('product_id', $product->id)
                    ->first();

                if (!$variant) {
                    return null;
                }

                return $variant->harga * $direct['qty'];
            }

            return $product->harga_dasar * $direct['qty'];
        }

        $items = DB::table('cart_items')
            ->join('products', 'cart_items.product_id', '=', 'products.id')
            ->leftJoin(
                'product_variants',
                'cart_items.variant_id',
                '=',
                'product_variants.id'
            )
            ->where('cart_items.user_id', $userId)
            ->where('products.status', 'aktif')
            ->select(
                'cart_items.qty',
                'cart_items.variant_id',
                'products.harga_dasar',
                'product_variants.harga'
            )
            ->get();

        if ($items->isEmpty()) {
            return null;
        }

        return $items->sum(function ($item) {
            $harga = $item->variant_id
                ? $item->harga
                : $item->harga_dasar;

            return $harga * $item->qty;
        });
    }

    // Menampilkan halaman checkout
    public function index()
    {
        $userId = Auth::id();

        $direct = session('checkout_direct');

        if ($direct) {
            $product = DB::table('products')
                ->where('id', $direct['product_id'])
                ->where('status', 'aktif')
                ->first();

            if (!$product) {
                session()->forget([
                    'checkout_direct',
                    'checkout_voucher'
                ]);

                return redirect()
                    ->route('home')
                    ->with('error', 'Produk tidak tersedia.');
            }

            $variant = null;

            if ($direct['variant_id']) {
                $variant = DB::table('product_variants')
                    ->where('id', $direct['variant_id'])
                    ->where('product_id', $product->id)
                    ->first();

                if (!$variant) {
                    session()->forget([
                        'checkout_direct',
                        'checkout_voucher'
                    ]);

                    return redirect()
                        ->route('products.show', $product->id)
                        ->with('error', 'Variasi produk tidak ditemukan.');
                }
            }

            $image = DB::table('product_images')
                ->where('product_id', $product->id)
                ->where('is_utama', 1)
                ->orderBy('id')
                ->first();

            $items = collect([
                (object) [
                    'cart_item_id' => null,
                    'product_id' => $product->id,
                    'variant_id' => $variant->id ?? null,
                    'nama' => $product->nama,
                    'qty' => $direct['qty'],
                    'harga_satuan' => $variant
                        ? $variant->harga
                        : $product->harga_dasar,
                    'ukuran' => $variant->ukuran ?? null,
                    'warna' => $variant->warna ?? null,
                    'file_name' => $image->file_name ?? null,
                ]
            ]);

        } else {
            $items = DB::table('cart_items')
                ->join(
                    'products',
                    'cart_items.product_id',
                    '=',
                    'products.id'
                )
                ->leftJoin(
                    'product_variants',
                    'cart_items.variant_id',
                    '=',
                    'product_variants.id'
                )
                ->where('cart_items.user_id', $userId)
                ->where('products.status', 'aktif')
                ->select(
                    'cart_items.id as cart_item_id',
                    'cart_items.product_id',
                    'cart_items.variant_id',
                    'cart_items.qty',
                    'products.nama',
                    'product_variants.ukuran',
                    'product_variants.warna'
                )
                ->selectRaw("
                    CASE
                        WHEN cart_items.variant_id IS NOT NULL
                        THEN product_variants.harga
                        ELSE products.harga_dasar
                    END AS harga_satuan
                ")
                ->selectSub(function ($query) {
                    $query->from('product_images')
                        ->select('file_name')
                        ->whereColumn(
                            'product_images.product_id',
                            'products.id'
                        )
                        ->where('is_utama', 1)
                        ->orderBy('id')
                        ->limit(1);
                }, 'file_name')
                ->orderByDesc('cart_items.id')
                ->get();

            if ($items->isEmpty()) {
                session()->forget('checkout_voucher');

                return redirect()
                    ->route('cart.index')
                    ->with('error', 'Keranjang masih kosong.');
            }
        }

        $addresses = DB::table('addresses')
            ->where('user_id', $userId)
            ->orderByDesc('is_utama')
            ->orderByDesc('id')
            ->get();

        // Menghitung subtotal
        $total = $items->sum(function ($item) {
            return $item->harga_satuan * $item->qty;
        });

        // Mengambil voucher yang sedang diterapkan
        $voucher = null;
        $diskon = 0;

        $voucherSession = session('checkout_voucher');

        if ($voucherSession) {
            $voucher = DB::table('vouchers')
                ->where('id', $voucherSession['id'])
                ->first();

            if (
                $voucher &&
                $voucher->kuota > 0 &&
                $voucher->expired >= now()->toDateString() &&
                $total >= $voucher->min_belanja
            ) {
                $diskon = min($voucher->potongan, $total);
            } else {
                session()->forget('checkout_voucher');
                $voucher = null;
            }
        }

        $totalBayar = $total - $diskon;

        return view('customer.checkout.index', compact(
            'items',
            'addresses',
            'total',
            'direct',
            'voucher',
            'diskon',
            'totalBayar'
        ));
    }

    // Menerapkan voucher
    public function applyVoucher(Request $request)
    {
        $validated = $request->validate([
            'kode' => 'required|string|max:30',
        ], [
            'kode.required' => 'Masukkan kode voucher terlebih dahulu.',
        ]);

        $userId = Auth::id();

        $subtotal = $this->getCheckoutSubtotal($userId);

        if ($subtotal === null || $subtotal <= 0) {
            return redirect()
                ->route('checkout.index')
                ->with('error', 'Barang checkout tidak tersedia.');
        }

        $kode = strtoupper(trim($validated['kode']));

        $voucher = DB::table('vouchers')
            ->where('kode', $kode)
            ->first();

        if (!$voucher) {
            return back()->with('error', 'Kode voucher tidak ditemukan.');
        }

        if ($voucher->expired < now()->toDateString()) {
            return back()->with('error', 'Voucher sudah kedaluwarsa.');
        }

        if ($voucher->kuota <= 0) {
            return back()->with('error', 'Kuota voucher sudah habis.');
        }

        if ($subtotal < $voucher->min_belanja) {
            return back()->with(
                'error',
                'Minimal belanja untuk voucher ini adalah Rp' .
                number_format($voucher->min_belanja, 0, ',', '.')
            );
        }

        session([
            'checkout_voucher' => [
                'id' => $voucher->id,
                'kode' => $voucher->kode,
            ]
        ]);

        return redirect()
            ->route('checkout.index')
            ->with('success', 'Voucher berhasil digunakan.');
    }

    // Menghapus voucher dari checkout
    public function removeVoucher()
    {
        session()->forget('checkout_voucher');

        return redirect()
            ->route('checkout.index')
            ->with('success', 'Voucher berhasil dilepas.');
    }

    // Proses Beli Sekarang dari detail produk
    public function buyNow(Request $request)
    {
        $validated = $request->validate([
            'product_id' => 'required|integer|exists:products,id',
            'variant_id' => 'nullable|integer|exists:product_variants,id',
            'qty' => 'required|integer|min:1',
        ]);

        $product = DB::table('products')
            ->where('id', $validated['product_id'])
            ->where('status', 'aktif')
            ->first();

        if (!$product) {
            return back()->with('error', 'Produk tidak tersedia.');
        }

        $variantId = $validated['variant_id'] ?? null;

        if ($product->jenis_produk === 'variasi') {
            if (!$variantId) {
                return back()->with(
                    'error',
                    'Silakan pilih variasi produk terlebih dahulu.'
                );
            }

            $variant = DB::table('product_variants')
                ->where('id', $variantId)
                ->where('product_id', $product->id)
                ->first();

            if (!$variant) {
                return back()->with(
                    'error',
                    'Variasi produk tidak ditemukan.'
                );
            }

            $stok = $variant->stok;

        } else {
            if ($variantId) {
                return back()->with(
                    'error',
                    'Produk ini tidak menggunakan variasi.'
                );
            }

            $stok = $product->stok;
        }

        if ($validated['qty'] > $stok) {
            return back()->with(
                'error',
                'Jumlah pembelian melebihi stok tersedia.'
            );
        }

        // Pembelian langsung dimulai sebagai checkout baru
        session()->forget('checkout_voucher');

        session([
            'checkout_direct' => [
                'product_id' => $product->id,
                'variant_id' => $variantId,
                'qty' => $validated['qty'],
            ]
        ]);

        return redirect()->route('checkout.index');
    }

    // Menyimpan pesanan
    public function store(Request $request)
    {
        $validated = $request->validate([
            'address_id' => 'required|integer|exists:addresses,id',
            'metode_bayar' => 'required|in:transfer,cod,ewallet',
        ]);

        $userId = Auth::id();

        $address = DB::table('addresses')
            ->where('id', $validated['address_id'])
            ->where('user_id', $userId)
            ->first();

        if (!$address) {
            return back()
                ->with('error', 'Alamat pengiriman tidak valid.')
                ->withInput();
        }

        $direct = session('checkout_direct');
        $voucherSession = session('checkout_voucher');

        $orderId = DB::transaction(function () use (
            $validated,
            $userId,
            $direct,
            $voucherSession
        ) {
            if ($direct) {
                $cartItems = collect([
                    (object) [
                        'product_id' => $direct['product_id'],
                        'variant_id' => $direct['variant_id'],
                        'qty' => $direct['qty'],
                        'cart_item_id' => null,
                    ]
                ]);
            } else {
                $cartItems = DB::table('cart_items')
                    ->where('user_id', $userId)
                    ->lockForUpdate()
                    ->get()
                    ->map(function ($item) {
                        $item->cart_item_id = $item->id;
                        return $item;
                    });
            }

            if ($cartItems->isEmpty()) {
                abort(422, 'Keranjang masih kosong.');
            }

            $subtotal = 0;
            $orderDetails = [];

            foreach ($cartItems as $item) {
                $product = DB::table('products')
                    ->where('id', $item->product_id)
                    ->lockForUpdate()
                    ->first();

                if (!$product || $product->status !== 'aktif') {
                    abort(422, 'Salah satu produk tidak tersedia.');
                }

                $variant = null;

                if ($product->jenis_produk === 'variasi') {
                    if (!$item->variant_id) {
                        abort(422, 'Variasi produk belum dipilih.');
                    }

                    $variant = DB::table('product_variants')
                        ->where('id', $item->variant_id)
                        ->where('product_id', $product->id)
                        ->lockForUpdate()
                        ->first();

                    if (!$variant) {
                        abort(422, 'Variasi produk tidak ditemukan.');
                    }

                    $stok = $variant->stok;
                    $harga = $variant->harga;

                    $namaVarian = trim(
                        ($variant->ukuran ?? '') . ' ' .
                        ($variant->warna ?? '')
                    );

                } else {
                    if ($item->variant_id) {
                        abort(422, 'Produk biasa tidak menggunakan variasi.');
                    }

                    $stok = $product->stok;
                    $harga = $product->harga_dasar;
                    $namaVarian = null;
                }

                if ($item->qty < 1 || $item->qty > $stok) {
                    abort(422, 'Stok produk tidak mencukupi.');
                }

                $subtotal += $harga * $item->qty;

                $orderDetails[] = [
                    'product_id' => $product->id,
                    'variant_id' => $variant->id ?? null,
                    'nama_produk' => $product->nama,
                    'varian' => $namaVarian ?: null,
                    'qty' => $item->qty,
                    'harga_satuan' => $harga,
                ];

                // Mengurangi stok produk
                if ($variant) {
                    DB::table('product_variants')
                        ->where('id', $variant->id)
                        ->decrement('stok', $item->qty);
                } else {
                    DB::table('products')
                        ->where('id', $product->id)
                        ->decrement('stok', $item->qty);
                }
            }

            // Validasi ulang voucher di dalam transaksi
            $voucherId = null;
            $diskon = 0;

            if ($voucherSession) {
                $voucher = DB::table('vouchers')
                    ->where('id', $voucherSession['id'])
                    ->lockForUpdate()
                    ->first();

                if (!$voucher) {
                    abort(422, 'Voucher tidak ditemukan.');
                }

                if ($voucher->expired < now()->toDateString()) {
                    abort(422, 'Voucher sudah kedaluwarsa.');
                }

                if ($voucher->kuota <= 0) {
                    abort(422, 'Kuota voucher sudah habis.');
                }

                if ($subtotal < $voucher->min_belanja) {
                    abort(422, 'Subtotal tidak memenuhi minimal belanja voucher.');
                }

                $voucherId = $voucher->id;
                $diskon = min($voucher->potongan, $subtotal);

                // Mengurangi kuota voucher
                $berhasilKurangiKuota = DB::table('vouchers')
                    ->where('id', $voucher->id)
                    ->where('kuota', '>', 0)
                    ->decrement('kuota');

                if (!$berhasilKurangiKuota) {
                    abort(422, 'Kuota voucher sudah habis.');
                }
            }

            $ongkir = 0;
            $total = $subtotal + $ongkir - $diskon;

            $kodeOrder = 'ORD-' . date('YmdHis') . random_int(100, 999);

            $orderId = DB::table('orders')->insertGetId([
                'kode_order' => $kodeOrder,
                'user_id' => $userId,
                'address_id' => $validated['address_id'],
                'voucher_id' => $voucherId,
                'subtotal' => $subtotal,
                'diskon' => $diskon,
                'ongkir' => $ongkir,
                'total' => $total,
                'metode_bayar' => $validated['metode_bayar'],
                'status' => 'menunggu_bayar',
            ]);

            DB::table('order_status_history')->insert([
                'order_id' => $orderId,
                'status' => 'menunggu_bayar',
                'created_at' => now(),
            ]);

            foreach ($orderDetails as $detail) {
                $detail['order_id'] = $orderId;

                DB::table('order_items')->insert($detail);
            }

            if (!$direct) {
                DB::table('cart_items')
                    ->where('user_id', $userId)
                    ->delete();
            }

            return $orderId;
        });

        session()->forget([
            'checkout_direct',
            'checkout_voucher'
        ]);

        return redirect()
            ->route('checkout.success', $orderId)
            ->with('success', 'Pesanan berhasil dibuat.');
    }

    // Menampilkan pesanan yang berhasil dibuat
    public function success($id)
    {
        $order = DB::table('orders')
            ->where('id', $id)
            ->where('user_id', Auth::id())
            ->first();

        if (!$order) {
            abort(404);
        }

        $items = DB::table('order_items')
            ->where('order_id', $id)
            ->get();

        return view('customer.checkout.success', compact(
            'order',
            'items'
        ));
    }
}
