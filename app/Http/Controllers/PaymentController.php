<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class PaymentController extends Controller
{
    // Menampilkan daftar pesanan milik customer
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

        return view('customer.orders.show', compact('order', 'items'));
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

        if (!in_array($order->metode_bayar, ['transfer', 'ewallet'])) {
            return back()->with(
                'error',
                'Metode pembayaran ini tidak memerlukan upload bukti.'
            );
        }

        $request->validate([
            'bukti_bayar' => 'required|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $namaFile = $request->file('bukti_bayar')
            ->store('bukti-pembayaran', 'public');

        DB::table('orders')
            ->where('id', $id)
            ->where('user_id', $userId)
            ->update([
                'bukti_bayar' => $namaFile,
            ]);

        if ($order->bukti_bayar) {
            Storage::disk('public')->delete($order->bukti_bayar);
        }

        return redirect()
            ->route('customer.orders.show', $id)
            ->with('success', 'Bukti pembayaran berhasil diunggah.');
    }
}
