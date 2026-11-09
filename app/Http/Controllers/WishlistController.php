<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class WishlistController extends Controller
{
    // Menampilkan wishlist customer
    public function index()
    {
        $userId = Auth::id();

        $products = DB::table('wishlists as w')
            ->join('products as p', 'w.product_id', '=', 'p.id')
            ->leftJoin('categories as c', 'p.category_id', '=', 'c.id')
            ->where('w.user_id', $userId)
            ->select(
                'p.id',
                'p.nama',
                'p.merek',
                'p.harga_dasar',
                'p.status',
                'c.nama_kategori'
            )
            ->selectSub(function ($query) {
                $query->from('product_images')
                    ->select('file_name')
                    ->whereColumn('product_images.product_id', 'p.id')
                    ->orderByDesc('is_utama')
                    ->orderBy('id')
                    ->limit(1);
            }, 'file_name')
            ->orderByDesc('w.product_id')
            ->get();

        return view('customer.wishlist.index', compact('products'));
    }

    // Menambahkan produk ke wishlist
    public function store($productId)
    {
        $userId = Auth::id();

        // Memastikan produk tersedia
        $product = DB::table('products')
            ->where('id', $productId)
            ->first();

        if (!$product) {
            return back()->with('error', 'Produk tidak ditemukan.');
        }

        // Memeriksa apakah produk sudah ada di wishlist
        $exists = DB::table('wishlists')
            ->where('user_id', $userId)
            ->where('product_id', $productId)
            ->exists();

        if ($exists) {
            return back()->with('error', 'Produk sudah ada di wishlist.');
        }

        // Menyimpan wishlist
        DB::table('wishlists')->insert([
            'user_id' => $userId,
            'product_id' => $productId
        ]);

        return back()->with('success', 'Produk berhasil ditambahkan ke wishlist.');
    }

    // Menghapus produk dari wishlist
    public function destroy($productId)
    {
        DB::table('wishlists')
            ->where('user_id', Auth::id())
            ->where('product_id', $productId)
            ->delete();

        return back()->with('success', 'Produk berhasil dihapus dari wishlist.');
    }
}
