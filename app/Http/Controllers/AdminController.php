<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function index()
    {
        // Menghitung total produk
        $totalProduk = DB::table('products')->count();

        // Menghitung total kategori
        $totalKategori = DB::table('categories')->count();

        // Menghitung total customer
        $totalCustomer = DB::table('users')
            ->where('role', 'customer')
            ->count();

        // Menghitung total pesanan
        $totalPesanan = DB::table('orders')->count();

        // Mengambil lima produk terbaru
        $produkTerbaru = DB::table('products')
            ->leftJoin(
                'categories',
                'products.category_id',
                '=',
                'categories.id'
            )
            ->select(
                'products.id',
                'products.nama',
                'products.merek',
                'products.harga_dasar',
                'products.status',
                'products.created_at',
                'categories.nama_kategori'
            )
            ->orderBy('products.created_at', 'desc')
            ->limit(5)
            ->get();

        // Mengambil logo dan informasi toko
        $settings = DB::table('store_settings')
            ->where('id', 1)
            ->first();

        return view('admin.dashboard', compact(
            'totalProduk',
            'totalKategori',
            'totalCustomer',
            'totalPesanan',
            'produkTerbaru',
            'settings'
        ));
    }
}
