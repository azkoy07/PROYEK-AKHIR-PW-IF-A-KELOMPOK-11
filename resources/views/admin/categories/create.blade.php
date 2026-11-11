
@extends('layouts.admin')

@section('title', 'Tambah Kategori - SportZone')
@section('page_title', 'Tambah Kategori')
@section('page_subtitle', 'Tambahkan kategori baru untuk katalog produk SportZone.')

@section('content')

    <div class="mb-4">
        <a href="{{ route('admin.categories.index') }}"
           class="btn btn-light border">
            <i class="bi bi-arrow-left me-1"></i>
            Kembali ke Kategori
        </a>
    </div>

    <div class="card border-0 shadow-sm">

        <div class="card-header bg-white p-4">

            <div class="d-flex align-items-center gap-3">

                <div class="admin-stat-icon">
                    <i class="bi bi-tag"></i>
                </div>

                <div>
                    <h5 class="sz-dashboard-section-title mb-1">
                        Form Tambah Kategori
                    </h5>

                    <p class="sz-dashboard-section-description mb-0">
                        Isi informasi kategori yang akan ditambahkan.
                    </p>
                </div>

            </div>

        </div>

        <div class="card-body p-4">

            @if($errors->any())
                <div class="alert alert-danger">
                    <div class="fw-semibold mb-1">
                        <i class="bi bi-exclamation-circle me-1"></i>
                        Periksa kembali data berikut:
                    </div>

                    @foreach($errors->all() as $error)
                        <div>{{ $error }}</div>
                    @endforeach
                </div>
            @endif

            <form action="{{ route('admin.categories.store') }}"
                  method="POST">

                @csrf

                <div class="mb-4">

                    <label for="nama_kategori" class="form-label fw-semibold">
                        Nama Kategori
                        <span class="text-danger">*</span>
                    </label>

                    <input type="text"
                           name="nama_kategori"
                           id="nama_kategori"
                           class="form-control @error('nama_kategori') is-invalid @enderror"
                           value="{{ old('nama_kategori') }}"
                           placeholder="Contoh: Sepatu"
                           maxlength="100"
                           required>

                    @error('nama_kategori')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror

                    <div class="form-text">
                        Masukkan nama kategori yang mudah dikenali, maksimal 100 karakter.
                    </div>

                </div>

                <div class="d-flex gap-2 pt-3 border-top">

                    <button type="submit" class="btn btn-primary px-4">
                        <i class="bi bi-check-lg me-1"></i>
                        Simpan Kategori
                    </button>

                    <a href="{{ route('admin.categories.index') }}"
                       class="btn btn-light border px-4">
                        Batal
                    </a>

                </div>

            </form>

        </div>

    </div>

@endsection
