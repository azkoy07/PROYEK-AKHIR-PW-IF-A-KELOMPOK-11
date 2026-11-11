
@extends('layouts.admin')

@section('title', 'Riwayat Stok - SportZone')
@section('page_title', 'Riwayat Stok')
@section('page_subtitle', 'Pantau aktivitas perubahan persediaan produk SportZone.')

@section('content')

    <!-- HEADER HALAMAN -->
    <div class="mb-4">

        <h3 class="sz-dashboard-title">
            Riwayat Perubahan Stok
        </h3>

        <p class="sz-dashboard-description">
            Pantau seluruh aktivitas penambahan dan pengurangan stok produk.
        </p>

    </div>

    <!-- PENCARIAN -->
    <div class="card mb-4">

        <div class="card-body p-4">

            <form action="{{ route('admin.stock-logs.index') }}" method="GET">

                <div class="row g-3 align-items-center">

                    <div class="col-10">

                        <div class="input-group">

                            <span class="input-group-text bg-white">
                                <i class="bi bi-search text-secondary"></i>
                            </span>

                            <input type="text"
                                   name="search"
                                   class="form-control"
                                   placeholder="Cari nama produk, ukuran, atau warna..."
                                   value="{{ request('search') }}">

                        </div>

                    </div>

                    <div class="col-2 d-grid">

                        <button type="submit" class="btn btn-primary py-2">
                            <i class="bi bi-search me-1"></i>
                            Cari
                        </button>

                    </div>

                </div>

                @if(request('search'))

                    <div class="mt-3">

                        <a href="{{ route('admin.stock-logs.index') }}"
                           class="text-decoration-none small">
                            <i class="bi bi-x-circle me-1"></i>
                            Hapus pencarian
                        </a>

                    </div>

                @endif

            </form>

        </div>

    </div>

    <!-- DAFTAR RIWAYAT STOK -->
    <div class="card">

        <div class="card-header bg-white p-4">

            <div class="d-flex justify-content-between align-items-center">

                <div>

                    <h5 class="sz-dashboard-section-title">
                        <i class="bi bi-clock-history text-primary me-2"></i>
                        Daftar Riwayat Stok
                    </h5>

                    <p class="sz-dashboard-section-description mb-0">
                        Catatan perubahan persediaan produk dan variasi.
                    </p>

                </div>

                <span class="badge bg-primary-subtle text-primary px-3 py-2">
                    {{ $logs->total() }} Data
                </span>

            </div>

        </div>

        <div class="card-body p-0">

            <div class="table-responsive">

                <table class="table table-hover mb-0">

                    <thead>

                        <tr>
                            <th class="ps-4" width="65">No.</th>
                            <th>Nama Produk</th>
                            <th>Variasi</th>
                            <th>Perubahan Stok</th>
                            <th>Stok Akhir</th>
                            <th>Tanggal Perubahan</th>
                        </tr>

                    </thead>

                    <tbody>

                        @forelse($logs as $index => $log)

                            <tr>

                                <td class="ps-4 text-secondary">
                                    {{ $logs->firstItem() + $index }}
                                </td>

                                <td>
                                    <span class="fw-semibold text-dark">
                                        {{ $log->nama_produk ?? 'Produk tidak ditemukan' }}
                                    </span>
                                </td>

                                <td>

                                    @if($log->variant_id)

                                        <span class="badge bg-light text-dark border">
                                            {{ $log->ukuran ?? '-' }}
                                            /
                                            {{ $log->warna ?? '-' }}
                                        </span>

                                    @else

                                        <span class="text-secondary small">
                                            Produk biasa
                                        </span>

                                    @endif

                                </td>

                                <td>

                                    @if($log->selisih > 0)

                                        <span class="badge bg-success-subtle text-success px-3 py-2">
                                            <i class="bi bi-arrow-up-circle-fill me-1"></i>
                                            +{{ $log->selisih }} Bertambah
                                        </span>

                                    @elseif($log->selisih < 0)

                                        <span class="badge bg-danger-subtle text-danger px-3 py-2">
                                            <i class="bi bi-arrow-down-circle-fill me-1"></i>
                                            {{ $log->selisih }} Berkurang
                                        </span>

                                    @else

                                        <span class="badge bg-secondary-subtle text-secondary px-3 py-2">
                                            <i class="bi bi-dash-circle me-1"></i>
                                            Tidak berubah
                                        </span>

                                    @endif

                                </td>

                                <td>
                                    <span class="fw-semibold">
                                        {{ $log->stok_akhir }}
                                    </span>
                                </td>

                                <td class="text-nowrap">

                                    <span class="text-secondary small">
                                        <i class="bi bi-calendar3 me-1"></i>

                                        {{ $log->created_at
                                            ? \Carbon\Carbon::parse($log->created_at)->format('d-m-Y H:i:s')
                                            : '-' }}
                                    </span>

                                </td>

                            </tr>

                        @empty

                            <tr>

                                <td colspan="6" class="text-center py-5">

                                    <i class="bi bi-inbox fs-2 text-secondary d-block mb-2"></i>

                                    <span class="fw-semibold">
                                        Belum Ada Riwayat Stok
                                    </span>

                                    <p class="text-secondary small mb-0 mt-1">
                                        Data perubahan stok akan ditampilkan di halaman ini.
                                    </p>

                                </td>

                            </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>

        </div>

        <!-- PAGINATION -->
        
<!-- PAGINATION -->
<div class="card-footer bg-white p-0">

    <div class="sz-pagination">

        <!-- INFORMASI JUMLAH DATA -->
        <small class="text-secondary">

            Menampilkan
            <strong>{{ $logs->firstItem() ?? 0 }}</strong>
            sampai
            <strong>{{ $logs->lastItem() ?? 0 }}</strong>
            dari
            <strong>{{ $logs->total() }}</strong>
            data.

        </small>

        <!-- TOMBOL PAGINATION -->
        <div class="pagination-navigation">

            {{ $logs->appends(request()->query())->links('pagination::bootstrap-5') }}

        </div>

    </div>

</div>


    </div>

@endsection
