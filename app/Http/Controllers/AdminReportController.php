<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminReportController extends Controller
{
    public function index(Request $request)
    {
        // Validasi tanggal laporan
        $validated = $request->validate([
            'tanggal_mulai' => 'nullable|date',
            'tanggal_akhir' => 'nullable|date|after_or_equal:tanggal_mulai',
        ]);

        // Default periode: awal bulan sampai hari ini
        $tanggalMulai = $validated['tanggal_mulai']
            ?? now()->startOfMonth()->toDateString();

        $tanggalAkhir = $validated['tanggal_akhir']
            ?? now()->toDateString();

        // 1. Mengambil laporan penjualan harian dari view database
        $laporanHarian = DB::table('v_laporan_penjualan')
            ->whereBetween('tanggal', [$tanggalMulai, $tanggalAkhir])
            ->orderByDesc('tanggal')
            ->get();

        // 2. Menghitung ringkasan penjualan
        $ringkasan = DB::table('v_laporan_penjualan')
            ->whereBetween('tanggal', [$tanggalMulai, $tanggalAkhir])
            ->selectRaw('
                COALESCE(SUM(jumlah_pesanan), 0) AS total_pesanan,
                COALESCE(SUM(item_terjual), 0) AS total_item,
                COALESCE(SUM(omzet), 0) AS total_omzet
            ')
            ->first();

        // 3. Laporan penjualan berdasarkan kategori
        // Menggunakan query langsung agar dapat difilter berdasarkan tanggal
        $laporanKategori = DB::table('order_items as oi')
            ->join('orders as o', 'o.id', '=', 'oi.order_id')
            ->join('products as p', 'p.id', '=', 'oi.product_id')
            ->join('categories as c', 'c.id', '=', 'p.category_id')
            ->whereIn('o.status', ['dikemas', 'dikirim', 'selesai'])
            ->whereBetween('o.created_at', [
                $tanggalMulai . ' 00:00:00',
                $tanggalAkhir . ' 23:59:59'
            ])
            ->select(
                'c.nama_kategori',
                DB::raw('SUM(oi.qty) AS item_terjual'),
                DB::raw('SUM(oi.qty * oi.harga_satuan) AS omzet')
            )
            ->groupBy('c.id', 'c.nama_kategori')
            ->orderByDesc('omzet')
            ->get();

        // 4. Mengirim data ke halaman laporan
        return view('admin.reports.index', compact(
            'tanggalMulai',
            'tanggalAkhir',
            'laporanHarian',
            'ringkasan',
            'laporanKategori'
        ));
    }
}