<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class ProductDetailController extends Controller
{
    public function show($id)
    {
        // Mengambil data produk dan kategori
        $product = DB::table('products')
            ->leftJoin(
                'categories',
                'products.category_id',
                '=',
                'categories.id'
            )
            ->select(
                'products.*',
                'categories.nama_kategori'
            )
            ->where('products.id', $id)
            ->where('products.status', 'aktif')
            ->first();

        // Jika produk tidak ditemukan
        if (!$product) {
            abort(404);
        }

        // Mengambil gambar utama produk
        $image = DB::table('product_images')
            ->where('product_id', $id)
            ->where('is_utama', 1)
            ->orderBy('id')
            ->first();

        // Mengambil seluruh variasi produk
        $variants = DB::table('product_variants')
            ->where('product_id', $id)
            ->orderBy('id')
            ->get();

        // Menghitung total stok berdasarkan jenis produk
        if ($product->jenis_produk == 'biasa') {
            $totalStok = $product->stok;
        } else {
            $totalStok = $variants->sum('stok');
        }

        return view('products.show', compact(
            'product',
            'image',
            'variants',
            'totalStok'
        ));
    }
}