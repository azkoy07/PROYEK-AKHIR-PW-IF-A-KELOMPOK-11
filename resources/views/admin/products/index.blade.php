
@extends('layouts.admin')

@section('title', 'Kelola Produk - SportZone')
@section('page_title', 'Kelola Produk')
@section('page_subtitle', 'Kelola katalog dan persediaan produk SportZone.')

@section('content')

    <!-- HEADER HALAMAN -->
    <div class="d-flex justify-content-between align-items-center gap-3 mb-4">

        <div>
            <h3 class="sz-dashboard-title">Daftar Produk</h3>
            <p class="sz-dashboard-description">
                Kelola informasi, variasi, harga, dan stok produk toko.
            </p>
        </div>

        <a href="{{ route('admin.products.create') }}"
           class="btn btn-primary px-3 py-2">
            <i class="bi bi-plus-lg me-1"></i>
            Tambah Produk
        </a>

    </div>

    <!-- DAFTAR PRODUK -->
    <div class="card">

        <div class="card-header bg-white p-4">

            <div class="d-flex justify-content-between align-items-center">

                <div>
                    <h5 class="sz-dashboard-section-title">Informasi Produk</h5>
                    <p class="sz-dashboard-section-description">
                        Daftar produk yang terdaftar di SportZone.
                    </p>
                </div>

                <span class="badge bg-primary-subtle text-primary px-3 py-2">
                    {{ $products->count() }} produk ditampilkan
                </span>

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
                            <th>Jenis</th>
                            <th>Harga</th>
                            <th>Stok</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>

                    <tbody>

                        @forelse($products as $product)

                            <tr>

                                <td class="ps-4 text-secondary">
                                    {{ $loop->iteration }}
                                </td>

                                <td>
                                    <span class="fw-semibold text-dark">
                                        {{ $product->nama }}
                                    </span>
                                </td>

                                <td>{{ $product->merek ?? '-' }}</td>

                                <td>{{ $product->nama_kategori ?? '-' }}</td>

                                <td>
                                    @if($product->jenis_produk == 'biasa')
                                        <span class="badge bg-light text-dark border">
                                            Tanpa Variasi
                                        </span>
                                    @else
                                        <span class="badge bg-primary-subtle text-primary">
                                            Dengan Variasi
                                        </span>
                                    @endif
                                </td>

                                <td class="fw-semibold text-nowrap">
                                    Rp{{ number_format($product->harga_dasar, 0, ',', '.') }}
                                </td>

                                <td>
                                    <span class="fw-semibold">
                                        {{ $product->total_stok }}
                                    </span>
                                </td>

                                <td>
                                    @if($product->status == 'aktif')
                                        <span class="badge bg-success-subtle text-success px-3 py-2">
                                            Aktif
                                        </span>
                                    @else
                                        <span class="badge bg-secondary-subtle text-secondary px-3 py-2">
                                            Nonaktif
                                        </span>
                                    @endif
                                </td>

                                <td>
                                    <div class="d-flex gap-1">

                                        <a href="{{ route('admin.products.edit', $product->id) }}"
                                           class="btn btn-sm btn-outline-primary"
                                           title="Edit produk">
                                            <i class="bi bi-pencil-square"></i>
                                        </a>

                                        <form action="{{ route('admin.products.destroy', $product->id) }}"
                                              method="POST"
                                              onsubmit="return confirm('Apakah Anda yakin ingin menghapus produk ini?')">

                                            @csrf
                                            @method('DELETE')

                                            <button type="submit"
                                                    class="btn btn-sm btn-outline-danger"
                                                    title="Hapus produk">
                                                <i class="bi bi-trash"></i>
                                            </button>

                                        </form>

                                    </div>
                                </td>

                            </tr>

                        @empty

                            <tr>
                                <td colspan="9" class="text-center py-5">

                                    <i class="bi bi-box-seam fs-2 text-secondary d-block mb-2"></i>

                                    <span class="fw-semibold">
                                        Belum ada produk.
                                    </span>

                                    <p class="text-secondary small mb-0 mt-1">
                                        Silakan tambahkan produk terlebih dahulu.
                                    </p>

                                </td>
                            </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>

        </div>

    </div>

@endsection
