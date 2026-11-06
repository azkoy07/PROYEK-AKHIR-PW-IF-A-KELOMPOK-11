<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        // 1. Mengambil seluruh kategori
        $categories = DB::table('categories')
            ->orderBy('nama_kategori')
            ->get();

        // 2. Mengambil produk dan kategori
        $query = DB::table('products')
            ->join(
                'categories',
                'products.category_id',
                '=',
                'categories.id'
            )
            ->select(
                'products.id',
                'products.nama',
                'products.merek',
                'products.deskripsi',
                'products.harga_dasar',
                'products.terjual',
                'products.created_at',
                'categories.nama_kategori',
                'categories.slug'
            )
            // Mengambil gambar utama produk
            ->selectSub(function ($subquery) {
                $subquery->from('product_images')
                    ->select('file_name')
                    ->whereColumn(
                        'product_images.product_id',
                        'products.id'
                    )
                    ->where('is_utama', 1)
                    ->orderBy('id')
                    ->limit(1);
            }, 'file_name')
            
            // Menghitung stok berdasarkan jenis produk
            ->selectRaw("
                CASE
                    WHEN products.jenis_produk = 'biasa'
                    THEN products.stok
                    ELSE (
                        SELECT COALESCE(SUM(product_variants.stok), 0)
                        FROM product_variants
                        WHERE product_variants.product_id = products.id
                    )
                END AS total_stok
            ")
            ->where('products.status', 'aktif');

        // 3. Pencarian berdasarkan nama atau merek
        if ($request->filled('search')) {
            $search = $request->search;

            $query->where(function ($q) use ($search) {
                $q->where(
                    'products.nama',
                    'like',
                    "%{$search}%"
                )->orWhere(
                    'products.merek',
                    'like',
                    "%{$search}%"
                );
            });
        }

        // 4. Filter berdasarkan kategori
        if ($request->filled('category')) {
            $query->where(
                'categories.slug',
                $request->category
            );
        }

        // 5. Sorting produk
        switch ($request->sort) {
            case 'price_low':
                $query->orderBy(
                    'products.harga_dasar',
                    'asc'
                );
                break;

            case 'price_high':
                $query->orderBy(
                    'products.harga_dasar',
                    'desc'
                );
                break;

            case 'popular':
                $query->orderBy(
                    'products.terjual',
                    'desc'
                );
                break;

            default:
                $query->orderBy(
                    'products.created_at',
                    'desc'
                );
                break;
        }

        // 6. Membatasi 9 produk per halaman
        $products = $query
            ->paginate(9)
            ->withQueryString();

        // 7. Mengirim data ke halaman Blade
        return view('welcome', compact(
            'categories',
            'products'
        ));
    }
}

