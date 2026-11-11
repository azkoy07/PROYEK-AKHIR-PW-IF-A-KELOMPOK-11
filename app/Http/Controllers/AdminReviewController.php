<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class AdminReviewController extends Controller
{
    // Menampilkan seluruh ulasan pelanggan
    public function index()
    {
        $reviews = DB::table('reviews')
            ->join('users', 'reviews.user_id', '=', 'users.id')
            ->join('products', 'reviews.product_id', '=', 'products.id')
            ->leftJoin('orders', 'reviews.order_id', '=', 'orders.id')
            ->select(
                'reviews.*',
                'users.nama as nama_customer',
                'products.nama as nama_produk',
                'orders.kode_order'
            )
            ->orderByDesc('reviews.created_at')
            ->paginate(10);

        $totalReviews = DB::table('reviews')->count();

        $averageRating = $totalReviews > 0
            ? round(DB::table('reviews')->avg('rating'), 1)
            : 0;

        return view('admin.reviews.index', compact(
            'reviews',
            'totalReviews',
            'averageRating'
        ));
    }

    // Menghapus ulasan pelanggan
    public function destroy($id)
    {
        $review = DB::table('reviews')
            ->where('id', $id)
            ->first();

        if (!$review) {
            return redirect()
                ->route('admin.reviews.index')
                ->with('error', 'Ulasan tidak ditemukan.');
        }

        DB::table('reviews')
            ->where('id', $id)
            ->delete();

        return redirect()
            ->route('admin.reviews.index')
            ->with('success', 'Ulasan pelanggan berhasil dihapus.');
    }
}
