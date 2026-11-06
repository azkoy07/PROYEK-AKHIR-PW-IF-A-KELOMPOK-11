<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    // Menampilkan isi keranjang
    public function index()
    {
        $items = DB::table('cart_items')
            ->join('products', 'cart_items.product_id', '=', 'products.id')
            ->leftJoin(
                'product_variants',
                'cart_items.variant_id',
                '=',
                'product_variants.id'
            )
            ->where('cart_items.user_id', Auth::id())
            ->select(
                'cart_items.id',
                'cart_items.product_id',
                'cart_items.variant_id',
                'cart_items.qty',
                'products.nama',
                'products.jenis_produk',
                'products.harga_dasar',
                'products.stok as stok_produk',
                'product_variants.ukuran',
                'product_variants.warna',
                'product_variants.harga as harga_varian',
                'product_variants.stok as stok_varian'
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

        $total = $items->sum(function ($item) {
            return $item->harga_satuan * $item->qty;
        });

        return view('customer.cart', compact('items', 'total'));
    }

    // Menambahkan produk ke keranjang
    public function store(Request $request)
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

        // Memeriksa produk variasi
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
            // Produk biasa tidak menggunakan variasi
            if ($variantId) {
                return back()->with(
                    'error',
                    'Produk ini tidak memiliki variasi.'
                );
            }

            $stok = $product->stok;
        }

        $qty = $validated['qty'];

        if ($stok < $qty) {
            return back()->with(
                'error',
                'Stok produk tidak mencukupi.'
            );
        }

        // Mencari item yang sama di keranjang customer
        $cartQuery = DB::table('cart_items')
            ->where('user_id', Auth::id())
            ->where('product_id', $product->id);

        if ($variantId) {
            $cartQuery->where('variant_id', $variantId);
        } else {
            $cartQuery->whereNull('variant_id');
        }

        $existingItem = $cartQuery->first();

        $newQty = $qty;

        if ($existingItem) {
            $newQty += $existingItem->qty;
        }

        if ($newQty > $stok) {
            return back()->with(
                'error',
                'Jumlah produk melebihi stok yang tersedia.'
            );
        }

        if ($existingItem) {
            DB::table('cart_items')
                ->where('id', $existingItem->id)
                ->update([
                    'qty' => $newQty,
                ]);
        } else {
            DB::table('cart_items')->insert([
                'user_id' => Auth::id(),
                'product_id' => $product->id,
                'variant_id' => $variantId,
                'qty' => $qty,
            ]);
        }

        return redirect()
            ->route('cart.index')
            ->with('success', 'Produk berhasil ditambahkan ke keranjang.');
    }

    // Mengubah jumlah produk di keranjang
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'qty' => 'required|integer|min:1',
        ]);

        $item = DB::table('cart_items')
            ->where('id', $id)
            ->where('user_id', Auth::id())
            ->first();

        if (!$item) {
            abort(404);
        }

        $product = DB::table('products')
            ->where('id', $item->product_id)
            ->first();

        if (!$product) {
            return back()->with('error', 'Produk tidak ditemukan.');
        }

        if ($item->variant_id) {
            $variant = DB::table('product_variants')
                ->where('id', $item->variant_id)
                ->where('product_id', $product->id)
                ->first();

            if (!$variant) {
                return back()->with('error', 'Variasi produk tidak ditemukan.');
            }

            $stok = $variant->stok;
        } else {
            $stok = $product->stok;
        }

        if ($validated['qty'] > $stok) {
            return back()->with(
                'error',
                'Jumlah melebihi stok yang tersedia.'
            );
        }

        DB::table('cart_items')
            ->where('id', $id)
            ->where('user_id', Auth::id())
            ->update([
                'qty' => $validated['qty'],
            ]);

        return back()->with('success', 'Jumlah produk berhasil diperbarui.');
    }

    // Menghapus produk dari keranjang
    public function destroy($id)
    {
        DB::table('cart_items')
            ->where('id', $id)
            ->where('user_id', Auth::id())
            ->delete();

        return back()->with('success', 'Produk berhasil dihapus dari keranjang.');
    }
}