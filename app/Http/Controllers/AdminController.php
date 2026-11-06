<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function index()
    {
        // Menghitung jumlah produk
        $totalProduk = DB::table('products')->count();

        // Menghitung jumlah kategori
        $totalKategori = DB::table('categories')->count();

        // Menghitung jumlah pelanggan
        $totalCustomer = DB::table('users')
            ->where('role', 'customer')
            ->count();

        // Menghitung jumlah pesanan
        $totalPesanan = DB::table('orders')->count();

        // Mengambil 5 produk terbaru
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

        return view('admin.dashboard', compact(
            'totalProduk',
            'totalKategori',
            'totalCustomer',
            'totalPesanan',
            'produkTerbaru'
        ));
    }
}

