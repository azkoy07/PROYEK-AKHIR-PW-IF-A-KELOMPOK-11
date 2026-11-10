<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Dashboard Admin - SportZone</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css"
        rel="stylesheet">

    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
</head>

<body class="bg-light">

<div class="container-fluid">
    <div class="row">

        <!-- SIDEBAR ADMIN -->
        <div class="col-md-2 bg-dark text-white min-vh-100 p-3">

            <!-- Logo -->
            <h4 class="fw-bold mb-4">
                <i class="bi bi-dribbble me-2"></i>
                SportZone
            </h4>

            <p class="text-secondary small fw-semibold">
                MENU ADMIN
            </p>

            <!-- Dashboard -->
            <a
                href="{{ route('admin.dashboard') }}"
                class="d-block text-white text-decoration-none mb-3"
            >
                <i class="bi bi-grid me-2"></i>
                Dashboard
            </a>

            <!-- Produk -->
            <a
                href="{{ route('admin.products.index') }}"
                class="d-block text-white text-decoration-none mb-3"
            >
                <i class="bi bi-box-seam me-2"></i>
                Produk
            </a>

            <!-- Kategori -->
            <a
                href="{{ route('admin.categories.index') }}"
                class="d-block text-white text-decoration-none mb-3"
            >
                <i class="bi bi-tags me-2"></i>
                Kategori
            </a>

            <!-- Pesanan -->
            <a
                href="{{ route('admin.orders.index') }}"
                class="d-block text-white text-decoration-none mb-3"
            >
                <i class="bi bi-cart me-2"></i>
                Pesanan
            </a>

            <!-- Riwayat Stok -->
            <a
                href="{{ route('admin.stock-logs.index') }}"
                class="d-block text-white text-decoration-none mb-3"
            >
                <i class="bi bi-clipboard-data me-2"></i>
                Riwayat Stok
            </a>

            <!-- Laporan Penjualan -->
            <a
                href="{{ route('admin.reports.index') }}"
                class="d-block text-white text-decoration-none mb-3"
            >
                <i class="bi bi-bar-chart-line me-2"></i>
                Laporan Penjualan
            </a>

            <hr class="border-secondary">

            <p class="text-secondary small fw-semibold">
                PENGELOLAAN TOKO
            </p>

            <!-- Voucher -->
            <a
                href="{{ route('admin.vouchers.index') }}"
                class="d-block text-white text-decoration-none mb-3"
            >
                <i class="bi bi-ticket-perforated me-2"></i>
                Voucher
            </a>


            <!-- Pengaturan Toko -->
            <a
                href="{{ route('admin.settings.edit') }}"
                class="d-block text-white text-decoration-none mb-3"
            >
                <i class="bi bi-gear me-2"></i>
                Pengaturan Toko
            </a>

            <hr class="border-secondary">

            <p class="text-secondary small fw-semibold">
                NAVIGASI
            </p>

            <!-- Lihat Toko -->
            <a
                href="{{ route('home') }}"
                class="d-block text-white text-decoration-none mb-3"
            >
                <i class="bi bi-shop me-2"></i>
                Lihat Toko
            </a>

            <!-- KEMBALI KE HALAMAN UTAMA -->
            <a
                href="{{ route('home') }}"
                class="btn btn-outline-light w-100 mt-4"
            >
                <i class="bi bi-arrow-left-circle me-2"></i>
                Kembali ke Halaman Utama
            </a>

        </div>


        <!-- KONTEN UTAMA -->
        <div class="col-md-10 p-4">

            <!-- NOTIFIKASI SUKSES -->
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show">
                    <i class="bi bi-check-circle me-2"></i>
                    {{ session('success') }}

                    <button
                        type="button"
                        class="btn-close"
                        data-bs-dismiss="alert"
                    ></button>
                </div>
            @endif

            <!-- NOTIFIKASI ERROR -->
            @if(session('error'))
                <div class="alert alert-danger alert-dismissible fade show">
                    <i class="bi bi-exclamation-circle me-2"></i>
                    {{ session('error') }}

                    <button
                        type="button"
                        class="btn-close"
                        data-bs-dismiss="alert"
                    ></button>
                </div>
            @endif


            <!-- NAVBAR / HEADER -->
            <div class="d-flex justify-content-between align-items-center mb-4 flex-wrap gap-3">

                <div>
                    <h3 class="fw-bold mb-1">
                        Dashboard Admin
                    </h3>

                    <p class="text-secondary mb-0">
                        Ringkasan aktivitas toko SportZone
                    </p>
                </div>

                <!-- INFORMASI ADMIN -->
                <div class="d-flex align-items-center gap-3">

                    <div class="text-end">
                        <strong>
                            {{ auth()->user()->nama }}
                        </strong>

                        <div class="text-secondary small">
                            {{ auth()->user()->email }}
                        </div>

                        <span class="badge bg-primary mt-1">
                            Administrator
                        </span>
                    </div>

                    <!-- LOGO TOKO -->
                    <div
                        class="bg-white rounded-circle shadow-sm d-flex align-items-center justify-content-center overflow-hidden"
                        style="width: 55px; height: 55px; flex-shrink: 0;"
                    >

                        @if($settings && $settings->logo)
                            <img
                                src="{{ asset('storage/' . $settings->logo) }}"
                                alt="Logo SportZone"
                                style="width: 100%; height: 100%; object-fit: contain; padding: 5px;"
                            >
                        @else
                            <i class="bi bi-shop fs-3 text-primary"></i>
                        @endif

                    </div>

                </div>

            </div>


            <!-- STATISTIK -->
            <div class="row g-3 mb-4">

                <!-- TOTAL PRODUK -->
                <div class="col-md-3">
                    <div class="card border-0 shadow-sm p-3 h-100">
                        <i class="bi bi-box-seam fs-3 text-primary"></i>

                        <h3 class="fw-bold mt-2">
                            {{ $totalProduk }}
                        </h3>

                        <p class="text-secondary mb-0">
                            Total Produk
                        </p>
                    </div>
                </div>

                <!-- TOTAL KATEGORI -->
                <div class="col-md-3">
                    <div class="card border-0 shadow-sm p-3 h-100">
                        <i class="bi bi-tags fs-3 text-success"></i>

                        <h3 class="fw-bold mt-2">
                            {{ $totalKategori }}
                        </h3>

                        <p class="text-secondary mb-0">
                            Total Kategori
                        </p>
                    </div>
                </div>

                <!-- TOTAL CUSTOMER -->
                <div class="col-md-3">
                    <div class="card border-0 shadow-sm p-3 h-100">
                        <i class="bi bi-people fs-3 text-warning"></i>

                        <h3 class="fw-bold mt-2">
                            {{ $totalCustomer }}
                        </h3>

                        <p class="text-secondary mb-0">
                            Total Customer
                        </p>
                    </div>
                </div>

                <!-- TOTAL PESANAN -->
                <div class="col-md-3">
                    <div class="card border-0 shadow-sm p-3 h-100">
                        <i class="bi bi-cart-check fs-3 text-danger"></i>

                        <h3 class="fw-bold mt-2">
                            {{ $totalPesanan }}
                        </h3>

                        <p class="text-secondary mb-0">
                            Total Pesanan
                        </p>
                    </div>
                </div>

            </div>


            <!-- AKSES CEPAT -->
            <div class="card border-0 shadow-sm mb-4">

                <div class="card-header bg-white py-3">
                    <h5 class="fw-bold mb-0">
                        Akses Cepat
                    </h5>
                </div>

                <div class="card-body">

                    <div class="row g-3">

                        <!-- KELOLA PRODUK -->
                        <div class="col-md-3">
                            <a
                                href="{{ route('admin.products.index') }}"
                                class="btn btn-outline-primary w-100 py-3"
                            >
                                <i class="bi bi-box-seam fs-5 d-block mb-1"></i>
                                Kelola Produk
                            </a>
                        </div>

                        <!-- KELOLA KATEGORI -->
                        <div class="col-md-3">
                            <a
                                href="{{ route('admin.categories.index') }}"
                                class="btn btn-outline-success w-100 py-3"
                            >
                                <i class="bi bi-tags fs-5 d-block mb-1"></i>
                                Kelola Kategori
                            </a>
                        </div>

                        <!-- KELOLA PESANAN -->
                        <div class="col-md-3">
                            <a
                                href="{{ route('admin.orders.index') }}"
                                class="btn btn-outline-warning w-100 py-3"
                            >
                                <i class="bi bi-cart-check fs-5 d-block mb-1"></i>
                                Kelola Pesanan
                            </a>
                        </div>

                        <!-- PENGATURAN TOKO -->
                        <div class="col-md-3">
                            <a
                                href="{{ route('admin.settings.edit') }}"
                                class="btn btn-outline-dark w-100 py-3"
                            >
                                <i class="bi bi-gear fs-5 d-block mb-1"></i>
                                Pengaturan Toko
                            </a>
                        </div>

                        <!-- RIWAYAT STOK -->
                        <div class="col-md-3">
                            <a
                                href="{{ route('admin.stock-logs.index') }}"
                                class="btn btn-outline-info w-100 py-3"
                            >
                                <i class="bi bi-clipboard-data fs-5 d-block mb-1"></i>
                                Riwayat Stok
                            </a>
                        </div>

                        <!-- LAPORAN PENJUALAN -->
                        <div class="col-md-3">
                            <a
                                href="{{ route('admin.reports.index') }}"
                                class="btn btn-outline-primary w-100 py-3"
                            >
                                <i class="bi bi-bar-chart-line fs-5 d-block mb-1"></i>
                                Laporan Penjualan
                            </a>
                        </div>

                    </div>

                </div>

            </div>


            <!-- PRODUK TERBARU -->
            <div class="card border-0 shadow-sm">

                <div class="card-header bg-white py-3">

                    <div class="d-flex justify-content-between align-items-center flex-wrap gap-2">

                        <h5 class="fw-bold mb-0">
                            Produk Terbaru
                        </h5>

                        <a
                            href="{{ route('admin.products.index') }}"
                            class="btn btn-sm btn-outline-primary"
                        >
                            Lihat Semua Produk
                        </a>

                    </div>

                </div>

                <div class="card-body">

                    <div class="table-responsive">

                        <table class="table table-hover align-middle">

                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Produk</th>
                                    <th>Merek</th>
                                    <th>Kategori</th>
                                    <th>Harga</th>
                                    <th>Status</th>
                                </tr>
                            </thead>

                            <tbody>

                                @forelse($produkTerbaru as $produk)

                                    <tr>
                                        <td>
                                            {{ $loop->iteration }}
                                        </td>

                                        <td>
                                            {{ $produk->nama }}
                                        </td>

                                        <td>
                                            {{ $produk->merek ?? '-' }}
                                        </td>

                                        <td>
                                            {{ $produk->nama_kategori ?? '-' }}
                                        </td>

                                        <td>
                                            Rp {{ number_format($produk->harga_dasar, 0, ',', '.') }}
                                        </td>

                                        <td>
                                            @if($produk->status == 'aktif')
                                                <span class="badge bg-success">
                                                    Aktif
                                                </span>
                                            @else
                                                <span class="badge bg-secondary">
                                                    Nonaktif
                                                </span>
                                            @endif
                                        </td>
                                    </tr>

                                @empty

                                    <tr>
                                        <td colspan="6" class="text-center py-4 text-secondary">
                                            Belum ada produk.
                                        </td>
                                    </tr>

                                @endforelse

                            </tbody>

                        </table>

                    </div>

                </div>

            </div>

        </div>

    </div>
</div>


<!-- JAVASCRIPT BOOTSTRAP -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>