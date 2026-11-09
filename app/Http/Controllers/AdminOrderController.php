<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminOrderController extends Controller
{
    // Menampilkan semua pesanan
    public function index()
    {
        $orders = DB::table('orders')
            ->join('users', 'orders.user_id', '=', 'users.id')
            ->select(
                'orders.*',
                'users.nama as nama_customer',
                'users.email'
            )
            ->orderByDesc('orders.created_at')
            ->get();

        return view('admin.orders.index', compact('orders'));
    }

    // Menampilkan detail pesanan
    public function show($id)
    {
        $order = DB::table('orders')
            ->join('users', 'orders.user_id', '=', 'users.id')
            ->leftJoin(
                'addresses',
                'orders.address_id',
                '=',
                'addresses.id'
            )
            ->where('orders.id', $id)
            ->select(
                'orders.*',
                'users.nama as nama_customer',
                'users.email',
                'addresses.penerima',
                'addresses.no_hp',
                'addresses.alamat_lengkap',
                'addresses.kota',
                'addresses.kode_pos'
            )
            ->first();

        if (!$order) {
            abort(404);
        }

        $items = DB::table('order_items')
            ->where('order_id', $id)
            ->get();

        return view('admin.orders.show', compact(
            'order',
            'items'
        ));
    }

    // Memverifikasi pembayaran
    public function approve($id)
    {
        $message = DB::transaction(function () use ($id) {

            $order = DB::table('orders')
                ->where('id', $id)
                ->lockForUpdate()
                ->first();

            if (!$order) {
                abort(404);
            }

            if ($order->status !== 'menunggu_bayar') {
                return 'Pesanan ini sudah diproses sebelumnya.';
            }

            // Transfer dan e-wallet wajib memiliki bukti pembayaran
            if (
                in_array($order->metode_bayar, ['transfer', 'ewallet'])
                && !$order->bukti_bayar
            ) {
                return 'Pelanggan belum mengunggah bukti pembayaran.';
            }

            DB::table('orders')
                ->where('id', $id)
                ->update([
                    'status' => 'dikemas'
                ]);

            return 'Pembayaran berhasil diverifikasi. Pesanan masuk tahap pengemasan.';
        });

        return back()->with('success', $message);
    }

    // Menolak pesanan dan mengembalikan stok
    public function reject($id)
    {
        $message = DB::transaction(function () use ($id) {

            $order = DB::table('orders')
                ->where('id', $id)
                ->lockForUpdate()
                ->first();

            if (!$order) {
                abort(404);
            }

            // Hanya pesanan menunggu pembayaran yang dapat ditolak
            if ($order->status !== 'menunggu_bayar') {
                return 'Pesanan ini sudah diproses sebelumnya.';
            }

            // Mengambil seluruh produk dalam pesanan
            $items = DB::table('order_items')
                ->where('order_id', $id)
                ->get();

            foreach ($items as $item) {

                // Produk yang memiliki variasi
                if ($item->variant_id !== null) {

                    $variant = DB::table('product_variants')
                        ->where('id', $item->variant_id)
                        ->where('product_id', $item->product_id)
                        ->lockForUpdate()
                        ->first();

                    if (!$variant) {
                        abort(422, 'Data variasi produk tidak ditemukan.');
                    }

                    // Mengembalikan stok variasi
                    // trg_log_stok akan mencatat perubahan ini
                    DB::table('product_variants')
                        ->where('id', $variant->id)
                        ->increment('stok', $item->qty);

                } else {

                    // Produk tanpa variasi
                    $product = DB::table('products')
                        ->where('id', $item->product_id)
                        ->lockForUpdate()
                        ->first();

                    if (!$product) {
                        abort(422, 'Data produk tidak ditemukan.');
                    }

                    // Mengembalikan stok produk biasa
                    // trg_log_stok_produk akan mencatat perubahan ini
                    DB::table('products')
                        ->where('id', $item->product_id)
                        ->increment('stok', $item->qty);
                }
            }

            // Mengubah status pesanan
            // Trigger riwayat status akan berjalan otomatis
            DB::table('orders')
                ->where('id', $id)
                ->update([
                    'status' => 'ditolak'
                ]);

            return 'Pesanan berhasil ditolak dan stok produk telah dikembalikan.';
        });

        return back()->with('success', $message);
    }

    // Mengirim pesanan dan menyimpan nomor resi
    public function ship(Request $request, $id)
    {
        $request->validate([
            'resi' => 'required|string|max:50',
        ], [
            'resi.required' => 'Nomor resi wajib diisi.',
            'resi.max' => 'Nomor resi maksimal 50 karakter.',
        ]);

        $result = DB::transaction(function () use ($id, $request) {

            $order = DB::table('orders')
                ->where('id', $id)
                ->lockForUpdate()
                ->first();

            if (!$order) {
                abort(404);
            }

            if ($order->status !== 'dikemas') {
                return false;
            }

            DB::table('orders')
                ->where('id', $id)
                ->update([
                    'resi' => $request->resi,
                    'status' => 'dikirim',
                ]);

            return true;
        });

        if (!$result) {
            return back()->with(
                'error',
                'Pesanan hanya dapat dikirim jika berstatus dikemas.'
            );
        }

        return redirect()
            ->route('admin.orders.show', $id)
            ->with(
                'success',
                'Pesanan berhasil dikirim dan nomor resi tersimpan.'
            );
    }
}
