<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class PaymentController extends Controller
{
    // Menampilkan daftar pesanan customer
    public function index()
    {
        $userId = Auth::id();

        $orders = DB::table('orders')
            ->where('user_id', $userId)
            ->orderByDesc('created_at')
            ->get();

        return view('customer.orders.index', compact('orders'));
    }

    // Menampilkan detail pesanan
    public function show($id)
    {
        $userId = Auth::id();

        $order = DB::table('orders')
            ->where('id', $id)
            ->where('user_id', $userId)
            ->first();

        if (!$order) {
            abort(404);
        }

        $items = DB::table('order_items')
            ->where('order_id', $id)
            ->get();

        // Mengambil produk yang sudah diulas
        $reviewedProductIds = DB::table('reviews')
            ->where('order_id', $id)
            ->where('user_id', $userId)
            ->pluck('product_id')
            ->toArray();

        return view('customer.orders.show', compact(
            'order',
            'items',
            'reviewedProductIds'
        ));
    }

    // Upload bukti pembayaran
    public function upload(Request $request, $id)
    {
        $userId = Auth::id();

        $order = DB::table('orders')
            ->where('id', $id)
            ->where('user_id', $userId)
            ->first();

        if (!$order) {
            abort(404);
        }

        if ($order->status !== 'menunggu_bayar') {
            return back()->with(
                'error',
                'Pesanan ini sudah diproses dan tidak dapat mengunggah bukti pembayaran.'
            );
        }

        // COD tidak memerlukan bukti pembayaran
        if (!in_array($order->metode_bayar, ['transfer', 'ewallet'])) {
            return back()->with(
                'error',
                'Metode pembayaran ini tidak memerlukan upload bukti.'
            );
        }

        $request->validate([
            'bukti_bayar' => 'required|image|mimes:jpg,jpeg,png|max:2048',
        ], [
            'bukti_bayar.required' => 'Silakan pilih bukti pembayaran.',
            'bukti_bayar.image' => 'File harus berupa gambar.',
            'bukti_bayar.mimes' => 'Format file harus JPG, JPEG, atau PNG.',
            'bukti_bayar.max' => 'Ukuran gambar maksimal 2 MB.',
        ]);

        // Menyimpan file bukti pembayaran
        $namaFile = $request->file('bukti_bayar')
            ->store('bukti-pembayaran', 'public');

        // Memperbarui lokasi bukti pembayaran
        DB::table('orders')
            ->where('id', $id)
            ->where('user_id', $userId)
            ->update([
                'bukti_bayar' => $namaFile,
            ]);

        // Menghapus bukti lama jika ada
        if ($order->bukti_bayar) {
            Storage::disk('public')->delete($order->bukti_bayar);
        }

        return redirect()
            ->route('customer.orders.show', $id)
            ->with('success', 'Bukti pembayaran berhasil diunggah.');
    }

    // Konfirmasi pesanan sudah diterima
    public function confirmReceived($id)
    {
        $userId = Auth::id();

        $result = DB::transaction(function () use ($id, $userId) {

            // Mengambil pesanan dan mengunci data
            $order = DB::table('orders')
                ->where('id', $id)
                ->where('user_id', $userId)
                ->lockForUpdate()
                ->first();

            if (!$order) {
                abort(404);
            }

            // Hanya pesanan yang sedang dikirim dapat dikonfirmasi
            if ($order->status !== 'dikirim') {
                return false;
            }

            // Mengambil seluruh produk dalam pesanan
            $items = DB::table('order_items')
                ->where('order_id', $id)
                ->get();

            // Menambahkan jumlah produk terjual
            foreach ($items as $item) {

                $product = DB::table('products')
                    ->where('id', $item->product_id)
                    ->lockForUpdate()
                    ->first();

                if (!$product) {
                    abort(422, 'Data produk tidak ditemukan.');
                }

                DB::table('products')
                    ->where('id', $item->product_id)
                    ->increment('terjual', $item->qty);
            }

            // Mengubah status pesanan menjadi selesai
            DB::table('orders')
                ->where('id', $id)
                ->where('user_id', $userId)
                ->update([
                    'status' => 'selesai',
                ]);

            return true;
        });

        if (!$result) {
            return back()->with(
                'error',
                'Pesanan belum dapat dikonfirmasi atau sudah selesai diproses.'
            );
        }

        return redirect()
            ->route('customer.orders.show', $id)
            ->with(
                'success',
                'Pesanan berhasil dikonfirmasi. Jumlah produk terjual telah diperbarui.'
            );
    }
}
