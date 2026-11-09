<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminStockLogController extends Controller
{
    // Menampilkan riwayat perubahan stok
    public function index(Request $request)
    {
        $query = DB::table('stock_logs as sl')

            // Menghubungkan log stok produk biasa
            ->leftJoin('products as p', 'sl.product_id', '=', 'p.id')

            // Menghubungkan log stok produk variasi
            ->leftJoin(
                'product_variants as pv',
                'sl.variant_id',
                '=',
                'pv.id'
            )

            // Mengambil nama produk dari variasi
            ->leftJoin(
                'products as p2',
                'pv.product_id',
                '=',
                'p2.id'
            )

            ->select(
                'sl.id',
                'sl.product_id',
                'sl.variant_id',
                'sl.selisih',
                'sl.stok_akhir',
                'sl.created_at',
                DB::raw('COALESCE(p.nama, p2.nama) as nama_produk'),
                'pv.ukuran',
                'pv.warna'
            );

        // Pencarian berdasarkan nama produk
        if ($request->filled('search')) {
            $search = $request->search;

            $query->where(function ($q) use ($search) {
                $q->where('p.nama', 'like', "%{$search}%")
                    ->orWhere('p2.nama', 'like', "%{$search}%")
                    ->orWhere('pv.ukuran', 'like', "%{$search}%")
                    ->orWhere('pv.warna', 'like', "%{$search}%");
            });
        }

        // Mengurutkan data dari yang terbaru
        $logs = $query
            ->orderByDesc('sl.created_at')
            ->orderByDesc('sl.id')
            ->paginate(15)
            ->withQueryString();

        return view('admin.stock-logs.index', compact('logs'));
    }
}
