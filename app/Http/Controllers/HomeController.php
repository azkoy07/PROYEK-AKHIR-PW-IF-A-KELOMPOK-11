<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        // ==========================================
        // 1. MENGAMBIL KATEGORI
        // ==========================================
        $categories = DB::table('categories')
            ->orderBy('nama_kategori')
            ->get();

        // ==========================================
        // 2. MENGAMBIL KATALOG
        // ==========================================
        $query = DB::table('v_katalog')
            ->select(
                'v_katalog.id',
                'v_katalog.nama',
                'v_katalog.merek',
                'v_katalog.harga_dasar',
                'v_katalog.terjual',
                'v_katalog.created_at',
                'v_katalog.nama_kategori',
                'v_katalog.slug',
                'v_katalog.rating_rata',
                'v_katalog.jumlah_ulasan'
            )
            ->selectSub(function ($subquery) {
                $subquery->from('product_images')
                    ->select('file_name')
                    ->whereColumn('product_images.product_id', 'v_katalog.id')
                    ->where('is_utama', 1)
                    ->orderBy('id')
                    ->limit(1);
            }, 'file_name')
            ->selectRaw("
                CASE
                    WHEN EXISTS (
                        SELECT 1
                        FROM products
                        WHERE products.id = v_katalog.id
                          AND products.jenis_produk = 'biasa'
                    )
                    THEN (
                        SELECT products.stok
                        FROM products
                        WHERE products.id = v_katalog.id
                    )
                    ELSE (
                        SELECT COALESCE(SUM(product_variants.stok), 0)
                        FROM product_variants
                        WHERE product_variants.product_id = v_katalog.id
                    )
                END AS total_stok
            ");

        // ==========================================
        // 3. PENCARIAN
        // ==========================================
        if ($request->filled('search')) {
            $search = $request->search;

            $query->where(function ($q) use ($search) {
                $q->where('v_katalog.nama', 'like', "%{$search}%")
                    ->orWhere('v_katalog.merek', 'like', "%{$search}%");
            });
        }

        // ==========================================
        // 4. FILTER KATEGORI
        // ==========================================
        if ($request->filled('category')) {
            $query->where('v_katalog.slug', $request->category);
        }

        // ==========================================
        // 5. SORTING
        // ==========================================
        switch ($request->sort) {
            case 'price_low':
                $query->orderBy('v_katalog.harga_dasar', 'asc');
                break;

            case 'price_high':
                $query->orderBy('v_katalog.harga_dasar', 'desc');
                break;

            case 'popular':
                $query->orderBy('v_katalog.terjual', 'desc');
                break;

            default:
                $query->orderBy('v_katalog.created_at', 'desc');
                break;
        }

        // ==========================================
        // 6. PAGINATION
        // ==========================================
        $products = $query->paginate(9)->withQueryString();

        // ==========================================
        // 7. MENENTUKAN PENERIMA NOTIFIKASI
        // ==========================================
        if (Auth::check()) {
            $user = Auth::user();

            if ($user->role === 'admin') {
                $recipientKey = 'admin';
                $recipientType = 'admin';
            } else {
                $recipientKey = 'customer:' . Auth::id();
                $recipientType = 'customer';
            }

            $userId = Auth::id();
        } else {
            $recipientKey = 'guest:' . session()->getId();
            $recipientType = 'guest';
            $userId = null;
        }

        // ==========================================
        // 8. MEMBUAT NOTIFIKASI ADMIN
        // ==========================================
        if ($recipientType === 'admin') {

            // Pesanan menunggu pembayaran
            $pesananBelumBayar = DB::table('orders')
                ->where('status', 'menunggu_bayar')
                ->whereNull('bukti_bayar')
                ->orderByDesc('created_at')
                ->limit(5)
                ->get();

            foreach ($pesananBelumBayar as $pesanan) {
                $this->simpanNotifikasi(
                    $recipientKey,
                    $recipientType,
                    $userId,
                    [
                        'source_key' => 'order:' . $pesanan->id . ':menunggu-pembayaran',
                        'judul' => 'Pesanan Baru',
                        'pesan' => 'Pesanan ' . $pesanan->kode_order .
                            ' menunggu pembayaran.',
                        'ikon' => 'bi-cart',
                        'warna' => 'warning',
                        'link' => route('admin.orders.index'),
                    ]
                );
            }

            // Bukti pembayaran masuk
            $pembayaranMasuk = DB::table('orders')
                ->where('status', 'menunggu_bayar')
                ->whereNotNull('bukti_bayar')
                ->orderByDesc('created_at')
                ->limit(5)
                ->get();

            foreach ($pembayaranMasuk as $pesanan) {
                $this->simpanNotifikasi(
                    $recipientKey,
                    $recipientType,
                    $userId,
                    [
                        'source_key' => 'order:' . $pesanan->id . ':bukti-pembayaran',
                        'judul' => 'Bukti Pembayaran Masuk',
                        'pesan' => 'Periksa pembayaran pesanan ' .
                            $pesanan->kode_order . '.',
                        'ikon' => 'bi-credit-card',
                        'warna' => 'primary',
                        'link' => route('admin.orders.index'),
                    ]
                );
            }

            // Pesanan dikemas
            $pesananDikemas = DB::table('orders')
                ->where('status', 'dikemas')
                ->orderByDesc('created_at')
                ->limit(5)
                ->get();

            foreach ($pesananDikemas as $pesanan) {
                $this->simpanNotifikasi(
                    $recipientKey,
                    $recipientType,
                    $userId,
                    [
                        'source_key' => 'order:' . $pesanan->id . ':dikemas',
                        'judul' => 'Pesanan Perlu Diproses',
                        'pesan' => 'Pesanan ' . $pesanan->kode_order .
                            ' sedang dalam tahap pengemasan.',
                        'ikon' => 'bi-box-seam',
                        'warna' => 'info',
                        'link' => route('admin.orders.index'),
                    ]
                );
            }

            // Stok produk biasa menipis
            $stokProduk = DB::table('products')
                ->where('jenis_produk', 'biasa')
                ->where('status', 'aktif')
                ->where('stok', '<=', 5)
                ->orderBy('stok')
                ->limit(5)
                ->get();

            foreach ($stokProduk as $produk) {
                $this->simpanNotifikasi(
                    $recipientKey,
                    $recipientType,
                    $userId,
                    [
                        'source_key' => 'product:' . $produk->id .
                            ':low-stock:' . $produk->stok,
                        'judul' => 'Stok Produk Menipis',
                        'pesan' => $produk->nama .
                            ' memiliki sisa stok ' . $produk->stok . '.',
                        'ikon' => 'bi-exclamation-triangle',
                        'warna' => 'danger',
                        'link' => route('admin.stock-logs.index'),
                    ]
                );
            }

            // Stok varian menipis
            $stokVariasi = DB::table('product_variants as pv')
                ->join('products as p', 'p.id', '=', 'pv.product_id')
                ->where('p.status', 'aktif')
                ->where('pv.stok', '<=', 5)
                ->select(
                    'pv.id',
                    'pv.ukuran',
                    'pv.warna',
                    'pv.stok',
                    'p.nama'
                )
                ->orderBy('pv.stok')
                ->limit(5)
                ->get();

            foreach ($stokVariasi as $variasi) {
                $this->simpanNotifikasi(
                    $recipientKey,
                    $recipientType,
                    $userId,
                    [
                        'source_key' => 'variant:' . $variasi->id .
                            ':low-stock:' . $variasi->stok,
                        'judul' => 'Stok Varian Menipis',
                        'pesan' => $variasi->nama . ' (' .
                            $variasi->ukuran . ' / ' .
                            $variasi->warna . ') tersisa ' .
                            $variasi->stok . '.',
                        'ikon' => 'bi-exclamation-triangle',
                        'warna' => 'danger',
                        'link' => route('admin.stock-logs.index'),
                    ]
                );
            }

            // Ulasan terbaru
            $ulasanTerbaru = DB::table('reviews as r')
                ->join('products as p', 'p.id', '=', 'r.product_id')
                ->select(
                    'r.id',
                    'r.rating',
                    'r.product_id',
                    'p.nama'
                )
                ->orderByDesc('r.created_at')
                ->limit(5)
                ->get();

            foreach ($ulasanTerbaru as $ulasan) {
                $this->simpanNotifikasi(
                    $recipientKey,
                    $recipientType,
                    $userId,
                    [
                        'source_key' => 'review:' . $ulasan->id,
                        'judul' => 'Ulasan Produk Baru',
                        'pesan' => 'Produk ' . $ulasan->nama .
                            ' mendapatkan rating ' . $ulasan->rating .
                            ' bintang.',
                        'ikon' => 'bi-star',
                        'warna' => 'warning',
                        'link' => route('products.show', $ulasan->product_id),
                    ]
                );
            }
        }

        // ==========================================
        // 9. MEMBUAT NOTIFIKASI CUSTOMER
        // ==========================================
        elseif ($recipientType === 'customer') {

            $pesananCustomer = DB::table('orders')
                ->where('user_id', $userId)
                ->orderByDesc('created_at')
                ->limit(10)
                ->get();

            foreach ($pesananCustomer as $pesanan) {

                $judul = '';
                $pesan = '';
                $ikon = 'bi-bell';
                $warna = 'primary';

                switch ($pesanan->status) {
                    case 'menunggu_bayar':
                        if (empty($pesanan->bukti_bayar)) {
                            $judul = 'Menunggu Pembayaran';
                            $pesan = 'Silakan selesaikan pembayaran pesanan ' .
                                $pesanan->kode_order . '.';
                            $ikon = 'bi-credit-card';
                            $warna = 'warning';
                            $state = 'belum-bayar';
                        } else {
                            $judul = 'Pembayaran Sedang Diperiksa';
                            $pesan = 'Bukti pembayaran pesanan ' .
                                $pesanan->kode_order .
                                ' sedang menunggu verifikasi admin.';
                            $ikon = 'bi-hourglass-split';
                            $warna = 'info';
                            $state = 'pembayaran-diperiksa';
                        }
                        break;

                    case 'dikemas':
                        $judul = 'Pesanan Sedang Dikemas';
                        $pesan = 'Pesanan ' . $pesanan->kode_order .
                            ' sedang disiapkan oleh toko.';
                        $ikon = 'bi-box-seam';
                        $warna = 'primary';
                        $state = 'dikemas';
                        break;

                    case 'dikirim':
                        $judul = 'Pesanan Sedang Dikirim';
                        $pesan = 'Pesanan ' . $pesanan->kode_order .
                            ' sedang dalam perjalanan.';
                        $ikon = 'bi-truck';
                        $warna = 'info';
                        $state = 'dikirim';
                        break;

                    case 'selesai':
                        $judul = 'Pesanan Selesai';
                        $pesan = 'Pesanan ' . $pesanan->kode_order .
                            ' telah selesai.';
                        $ikon = 'bi-check-circle';
                        $warna = 'success';
                        $state = 'selesai';
                        break;

                    case 'ditolak':
                        $judul = 'Pembayaran Ditolak';
                        $pesan = 'Pesanan ' . $pesanan->kode_order .
                            ' ditolak. Silakan periksa detail pesanan.';
                        $ikon = 'bi-x-circle';
                        $warna = 'danger';
                        $state = 'ditolak';
                        break;

                    default:
                        continue 2;
                }

                $this->simpanNotifikasi(
                    $recipientKey,
                    $recipientType,
                    $userId,
                    [
                        'source_key' => 'order:' . $pesanan->id .
                            ':customer:' . $state,
                        'judul' => $judul,
                        'pesan' => $pesan,
                        'ikon' => $ikon,
                        'warna' => $warna,
                        'link' => route('customer.orders.show', $pesanan->id),
                    ]
                );
            }
        }

        // ==========================================
        // 10. MEMBUAT NOTIFIKASI GUEST
        // ==========================================
        else {

            // Produk terbaru
            $produkTerbaru = DB::table('products')
                ->where('status', 'aktif')
                ->orderByDesc('created_at')
                ->limit(5)
                ->get();

            foreach ($produkTerbaru as $produk) {
                $this->simpanNotifikasi(
                    $recipientKey,
                    $recipientType,
                    $userId,
                    [
                        'source_key' => 'guest-product:' . $produk->id,
                        'judul' => 'Produk Terbaru',
                        'pesan' => 'Lihat produk terbaru kami: ' .
                            $produk->nama . '.',
                        'ikon' => 'bi-box',
                        'warna' => 'primary',
                        'link' => route('products.show', $produk->id),
                    ]
                );
            }

            // Voucher aktif
            $voucherAktif = DB::table('vouchers')
                ->whereDate('expired', '>=', now()->toDateString())
                ->where('kuota', '>', 0)
                ->orderBy('expired')
                ->limit(5)
                ->get();

            foreach ($voucherAktif as $voucher) {
                $this->simpanNotifikasi(
                    $recipientKey,
                    $recipientType,
                    $userId,
                    [
                        'source_key' => 'guest-voucher:' . $voucher->id,
                        'judul' => 'Voucher Tersedia',
                        'pesan' => 'Gunakan kode ' . $voucher->kode .
                            ' untuk mendapatkan potongan Rp ' .
                            number_format($voucher->potongan, 0, ',', '.') . '.',
                        'ikon' => 'bi-ticket-perforated',
                        'warna' => 'success',
                        'link' => route('home'),
                    ]
                );
            }
        }

        // ==========================================
        // 11. MENGAMBIL NOTIFIKASI DARI DATABASE
        // ==========================================
        $notifikasi = DB::table('notifications')
            ->where('recipient_key', $recipientKey)
            ->orderByDesc('created_at')
            ->orderByDesc('id')
            ->limit(15)
            ->get();

        $jumlahNotifikasi = DB::table('notifications')
            ->where('recipient_key', $recipientKey)
            ->whereNull('read_at')
            ->count();

        // ==========================================
        // 12. MENGIRIM DATA KE WELCOME
        // ==========================================
        return view('welcome', compact(
            'categories',
            'products',
            'notifikasi',
            'jumlahNotifikasi'
        ));
    }

    // ==========================================
    // MENYIMPAN NOTIFIKASI TANPA DUPLIKAT
    // ==========================================
    private function simpanNotifikasi(
        $recipientKey,
        $recipientType,
        $userId,
        array $data
    ) {
        DB::table('notifications')->insertOrIgnore([
            'user_id' => $userId,
            'recipient_key' => $recipientKey,
            'recipient_type' => $recipientType,
            'source_key' => $data['source_key'],
            'judul' => $data['judul'],
            'pesan' => $data['pesan'],
            'ikon' => $data['ikon'],
            'warna' => $data['warna'],
            'link' => $data['link'],
            'read_at' => null,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
