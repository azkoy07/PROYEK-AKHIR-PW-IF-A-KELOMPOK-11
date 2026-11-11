
@extends('layouts.admin')

@section('title', 'Kelola Kategori - SportZone')
@section('page_title', 'Kelola Kategori')
@section('page_subtitle', 'Kelola pengelompokan produk SportZone.')

@section('content')

    <!-- HEADER HALAMAN -->
    <div class="d-flex justify-content-between align-items-center gap-3 mb-4">

        <div>
            <h3 class="sz-dashboard-title">Daftar Kategori</h3>
            <p class="sz-dashboard-description">
                Kelola kategori untuk mengelompokkan produk SportZone.
            </p>
        </div>

        <a href="{{ route('admin.categories.create') }}"
           class="btn btn-primary px-3 py-2">
            <i class="bi bi-plus-lg me-1"></i>
            Tambah Kategori
        </a>

    </div>

    <!-- DAFTAR KATEGORI -->
    <div class="card">

        <div class="card-header bg-white p-4">

            <div class="d-flex justify-content-between align-items-center">

                <div>
                    <h5 class="sz-dashboard-section-title">Informasi Kategori</h5>
                    <p class="sz-dashboard-section-description">
                        Daftar kategori yang digunakan pada katalog produk.
                    </p>
                </div>

                <span class="badge bg-primary-subtle text-primary px-3 py-2">
                    {{ $categories->count() }} kategori
                </span>

            </div>

        </div>

        <div class="card-body p-0">

            <div class="table-responsive">

                <table class="table table-hover mb-0">

                    <thead>
                        <tr>
                            <th class="ps-4" width="90">No</th>
                            <th>Nama Kategori</th>
                            <th>Slug</th>
                            <th width="150">Aksi</th>
                        </tr>
                    </thead>

                    <tbody>

                        @forelse($categories as $category)

                            <tr>

                                <td class="ps-4 text-secondary">
                                    {{ $loop->iteration }}
                                </td>

                                <td>
                                    <span class="fw-semibold text-dark">
                                        {{ $category->nama_kategori }}
                                    </span>
                                </td>

                                <td>
                                    <span class="text-secondary">
                                        {{ $category->slug }}
                                    </span>
                                </td>

                                <td>
                                    <div class="d-flex gap-1">

                                        <a href="{{ route('admin.categories.edit', $category->id) }}"
                                           class="btn btn-sm btn-outline-primary"
                                           title="Edit kategori">
                                            <i class="bi bi-pencil-square"></i>
                                        </a>

                                        <form action="{{ route('admin.categories.destroy', $category->id) }}"
                                              method="POST"
                                              onsubmit="return confirm('Yakin ingin menghapus kategori ini?')">

                                            @csrf
                                            @method('DELETE')

                                            <button type="submit"
                                                    class="btn btn-sm btn-outline-danger"
                                                    title="Hapus kategori">
                                                <i class="bi bi-trash"></i>
                                            </button>

                                        </form>

                                    </div>
                                </td>

                            </tr>

                        @empty

                            <tr>
                                <td colspan="4" class="text-center py-5">

                                    <i class="bi bi-tags fs-2 text-secondary d-block mb-2"></i>

                                    <span class="fw-semibold">
                                        Belum ada kategori.
                                    </span>

                                    <p class="text-secondary small mb-0 mt-1">
                                        Silakan tambahkan kategori terlebih dahulu.
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
