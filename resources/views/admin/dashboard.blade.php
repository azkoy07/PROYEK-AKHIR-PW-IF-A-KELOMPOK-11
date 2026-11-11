
@extends('layouts.admin')

@section('title', 'Dashboard Admin - SportZone')
@section('page_title', 'Dashboard Admin')
@section('page_subtitle', 'Ringkasan aktivitas dan pengelolaan toko SportZone.')

@section('content')

    <!-- JUDUL DASHBOARD -->
    <div class="sz-dashboard-heading">
        <div class="d-flex justify-content-between align-items-center gap-3">

            <div>
                <h3 class="sz-dashboard-title">Selamat Datang di Admin SportZone</h3>
                <p class="sz-dashboard-description">
                    Pantau aktivitas dan kelola operasional toko melalui dashboard ini.
                </p>
            </div>

            <div class="text-end">
                <span class="badge bg-primary-subtle text-primary px-3 py-2">
                    <i class="bi bi-shield-check me-1"></i>
                    Administrator
                </span>
            </div>

        </div>
    </div>

    <!-- STATISTIK -->
    <div class="row g-3 mb-4">

        <div class="col-md-3">
            <div class="sz-dashboard-stat">

                <div class="d-flex justify-content-between align-items-center">
                    <div class="sz-stat-icon blue">
                        <i class="bi bi-box-seam"></i>
                    </div>
                    <i class="bi bi-three-dots text-secondary"></i>
                </div>

                <p class="sz-stat-label">Total Produk</p>
                <h3 class="sz-stat-value">
                    {{ number_format($totalProduk, 0, ',', '.') }}
                </h3>

            </div>
        </div>

        <div class="col-md-3">
            <div class="sz-dashboard-stat">

                <div class="d-flex justify-content-between align-items-center">
                    <div class="sz-stat-icon green">
                        <i class="bi bi-tags"></i>
                    </div>
                    <i class="bi bi-three-dots text-secondary"></i>
                </div>

                <p class="sz-stat-label">Total Kategori</p>
                <h3 class="sz-stat-value">
                    {{ number_format($totalKategori, 0, ',', '.') }}
                </h3>

            </div>
        </div>

        <div class="col-md-3">
            <div class="sz-dashboard-stat">

                <div class="d-flex justify-content-between align-items-center">
                    <div class="sz-stat-icon orange">
                        <i class="bi bi-people"></i>
                    </div>
                    <i class="bi bi-three-dots text-secondary"></i>
                </div>

                <p class="sz-stat-label">Total Customer</p>
                <h3 class="sz-stat-value">
                    {{ number_format($totalCustomer, 0, ',', '.') }}
                </h3>

            </div>
        </div>

        <div class="col-md-3">
            <div class="sz-dashboard-stat">

                <div class="d-flex justify-content-between align-items-center">
                    <div class="sz-stat-icon red">
                        <i class="bi bi-cart-check"></i>
                    </div>
                    <i class="bi bi-three-dots text-secondary"></i>
                </div>

                <p class="sz-stat-label">Total Pesanan</p>
                <h3 class="sz-stat-value">
                    {{ number_format($totalPesanan, 0, ',', '.') }}
                </h3>

            </div>
        </div>

    </div>

    <!-- AKSES CEPAT -->
    <div class="card mb-4">

        <div class="card-header bg-white p-4">
            <h5 class="sz-dashboard-section-title">Akses Cepat</h5>
            <p class="sz-dashboard-section-description">
                Pilih menu untuk mengelola bagian toko.
            </p>
        </div>

        <div class="card-body p-4">

            <div class="row g-3">

                <div class="col-md-3">
                    <a href="{{ route('admin.products.index') }}" class="sz-quick-link">
                        <i class="bi bi-box-seam"></i>
                        Kelola Produk
                    </a>
                </div>

                <div class="col-md-3">
                    <a href="{{ route('admin.categories.index') }}" class="sz-quick-link">
                        <i class="bi bi-tags"></i>
                        Kelola Kategori
                    </a>
                </div>

                <div class="col-md-3">
                    <a href="{{ route('admin.orders.index') }}" class="sz-quick-link">
                        <i class="bi bi-receipt"></i>
                        Kelola Pesanan
                    </a>
                </div>

                <div class="col-md-3">
                    <a href="{{ route('admin.stock-logs.index') }}" class="sz-quick-link">
                        <i class="bi bi-clipboard-data"></i>
                        Riwayat Stok
                    </a>
                </div>

                <div class="col-md-3">
                    <a href="{{ route('admin.reports.index') }}" class="sz-quick-link">
                        <i class="bi bi-bar-chart-line"></i>
                        Laporan Penjualan
                    </a>
                </div>

                <div class="col-md-3">
                    <a href="{{ route('admin.vouchers.index') }}" class="sz-quick-link">
                        <i class="bi bi-ticket-perforated"></i>
                        Kelola Voucher
                    </a>
                </div>

                <div class="col-md-3">
                    <a href="{{ route('admin.settings.edit') }}" class="sz-quick-link">
                        <i class="bi bi-gear"></i>
                        Pengaturan Toko
                    </a>
                </div>

                <div class="col-md-3">
                    <a href="{{ route('home') }}" class="sz-quick-link">
                        <i class="bi bi-shop"></i>
                        Lihat Halaman Toko
                    </a>
                </div>

            </div>

        </div>

    </div>

    <!-- PRODUK TERBARU -->
    <div class="card">

        <div class="card-header bg-white p-4">

            <div class="d-flex justify-content-between align-items-center">

                <div>
                    <h5 class="sz-dashboard-section-title">Produk Terbaru</h5>
                    <p class="sz-dashboard-section-description">
                        Daftar produk yang terakhir ditambahkan ke toko.
                    </p>
                </div>

                <a href="{{ route('admin.products.index') }}"
                   class="btn btn-outline-primary btn-sm">
                    Lihat Semua Produk
                    <i class="bi bi-arrow-right ms-1"></i>
                </a>

            </div>

        </div>

        <div class="card-body p-0">

            <div class="table-responsive">

                <table class="table table-hover mb-0">

                    <thead>
                        <tr>
                            <th class="ps-4">No</th>
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
                                <td class="ps-4 text-secondary">
                                    {{ $loop->iteration }}
                                </td>

                                <td>
                                    <span class="fw-semibold">
                                        {{ $produk->nama }}
                                    </span>
                                </td>

                                <td>{{ $produk->merek ?? '-' }}</td>

                                <td>{{ $produk->nama_kategori ?? '-' }}</td>

                                <td class="fw-semibold text-nowrap">
                                    Rp{{ number_format($produk->harga_dasar, 0, ',', '.') }}
                                </td>

                                <td>
                                    @if($produk->status == 'aktif')
                                        <span class="badge bg-success-subtle text-success px-3 py-2">
                                            Aktif
                                        </span>
                                    @else
                                        <span class="badge bg-secondary-subtle text-secondary px-3 py-2">
                                            Nonaktif
                                        </span>
                                    @endif
                                </td>
                            </tr>

                        @empty

                            <tr>
                                <td colspan="6" class="text-center py-5 text-secondary">
                                    <i class="bi bi-inbox fs-3 d-block mb-2"></i>
                                    Belum ada produk yang tersedia.
                                </td>
                            </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>

        </div>

    </div>

@endsection
