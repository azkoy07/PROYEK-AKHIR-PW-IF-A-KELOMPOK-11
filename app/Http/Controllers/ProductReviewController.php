<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class ProductReviewController extends Controller
{
    // Menampilkan seluruh ulasan suatu produk
    public function index($productId)
    {
        // Mengambil data produk
        $product = DB::table('products')
            ->where('id', $productId)
            ->first();

        if (!$product) {
            abort(404);
        }

        // Mengambil ulasan dan nama customer
        $reviews = DB::table('reviews')
            ->join('users', 'reviews.user_id', '=', 'users.id')
            ->where('reviews.product_id', $productId)
            ->select(
                'reviews.*',
                'users.nama as nama_customer'
            )
            ->orderByDesc('reviews.created_at')
            ->get();

        // Menghitung jumlah ulasan
        $totalReviews = $reviews->count();

        // Menghitung rata-rata rating
        $averageRating = $totalReviews > 0
            ? round($reviews->avg('rating'), 1)
            : 0;

        return view('products.reviews.index', compact(
            'product',
            'reviews',
            'totalReviews',
            'averageRating'
        ));
    }

    // Menyimpan ulasan customer
    public function store(Request $request, $orderId, $productId)
    {
        // Validasi input
        $request->validate([
            'rating' => 'required|integer|min:1|max:5',
            'komentar' => 'nullable|string|max:1000',
        ], [
            'rating.required' => 'Silakan pilih rating produk.',
            'rating.integer' => 'Rating harus berupa angka.',
            'rating.min' => 'Rating minimal 1 bintang.',
            'rating.max' => 'Rating maksimal 5 bintang.',
            'komentar.max' => 'Komentar maksimal 1000 karakter.',
        ]);

        $userId = Auth::id();

        $result = DB::transaction(function () use (
            $orderId,
            $productId,
            $userId,
            $request
        ) {
            // Memastikan pesanan milik customer yang login
            $order = DB::table('orders')
                ->where('id', $orderId)
                ->where('user_id', $userId)
                ->lockForUpdate()
                ->first();

            if (!$order) {
                abort(404);
            }

            // Ulasan hanya dapat diberikan jika pesanan selesai
            if ($order->status !== 'selesai') {
                return 'not_completed';
            }

            // Memastikan produk terdapat dalam pesanan
            $productOrdered = DB::table('order_items')
                ->where('order_id', $orderId)
                ->where('product_id', $productId)
                ->exists();

            if (!$productOrdered) {
                abort(403, 'Produk ini tidak terdapat dalam pesanan kamu.');
            }

            // Memeriksa apakah produk sudah pernah diulas
            $alreadyReviewed = DB::table('reviews')
                ->where('order_id', $orderId)
                ->where('product_id', $productId)
                ->exists();

            if ($alreadyReviewed) {
                return 'already_reviewed';
            }

            // Menyimpan ulasan ke tabel reviews
            DB::table('reviews')->insert([
                'product_id' => $productId,
                'user_id' => $userId,
                'order_id' => $orderId,
                'rating' => $request->rating,
                'komentar' => $request->komentar,
                'created_at' => now(),
            ]);

            return 'success';
        });

        if ($result === 'not_completed') {
            return back()->with(
                'error',
                'Ulasan hanya dapat diberikan setelah pesanan selesai.'
            );
        }

        if ($result === 'already_reviewed') {
            return back()->with(
                'error',
                'Produk ini sudah pernah kamu ulas pada pesanan tersebut.'
            );
        }

        return redirect()
            ->route('customer.orders.show', $orderId)
            ->with(
                'success',
                'Terima kasih! Ulasan produk berhasil disimpan.'
            );
    }
}
