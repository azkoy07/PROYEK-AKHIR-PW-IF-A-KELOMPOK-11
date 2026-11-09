
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Riwayat Stok - SportZone</title>

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >

    <style>
        body {
            background: #f5f6fa;
        }

        .main-card {
            border: none;
            border-radius: 12px;
        }

        .table th {
            white-space: nowrap;
        }

        .table td {
            vertical-align: middle;
        }

        .page-title {
            font-weight: 700;
        }
    </style>
</head>

<body>

<div class="container py-5">

    {{-- Header --}}
    <div class="d-flex justify-content-between align-items-center mb-4 flex-wrap gap-3">

        <div>
            <h3 class="page-title mb-1">Riwayat Perubahan Stok</h3>

            <p class="text-muted mb-0">
                Catatan perubahan stok seluruh produk SportZone.
            </p>
        </div>

        <a href="{{ route('admin.dashboard') }}"
           class="btn btn-outline-secondary">
            Kembali ke Dashboard
        </a>

    </div>

    {{-- Notifikasi --}}
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    {{-- Pencarian --}}
    <div class="card main-card shadow-sm mb-4">

        <div class="card-body">

            <form
                action="{{ route('admin.stock-logs.index') }}"
                method="GET"
            >

                <div class="row g-2">

                    <div class="col-md-10">

                        <input
                            type="text"
                            name="search"
                            class="form-control"
                            placeholder="Cari nama produk, ukuran, atau warna..."
                            value="{{ request('search') }}"
                        >

                    </div>

                    <div class="col-md-2 d-grid">

                        <button type="submit" class="btn btn-primary">
                            Cari
                        </button>

                    </div>

                </div>

                @if(request('search'))
                    <a
                        href="{{ route('admin.stock-logs.index') }}"
                        class="btn btn-sm btn-link px-0 mt-2"
                    >
                        Hapus pencarian
                    </a>
                @endif

            </form>

        </div>

    </div>

    {{-- Tabel Riwayat Stok --}}
    <div class="card main-card shadow-sm">

        <div class="card-header bg-white py-3">

            <h5 class="mb-0">
                Daftar Riwayat Stok
            </h5>

        </div>

        <div class="card-body">

            <div class="table-responsive">

                <table class="table table-bordered table-hover">

                    <thead class="table-light">

                        <tr>
                            <th>No.</th>
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

                                <td>
                                    {{ $logs->firstItem() + $index }}
                                </td>

                                <td>
                                    <strong>
                                        {{ $log->nama_produk ?? 'Produk tidak ditemukan' }}
                                    </strong>
                                </td>

                                <td>

                                    @if($log->variant_id)
                                        {{ $log->ukuran ?? '-' }}
                                        /
                                        {{ $log->warna ?? '-' }}
                                    @else
                                        <span class="text-muted">
                                            Produk biasa
                                        </span>
                                    @endif

                                </td>

                                <td>

                                    @if($log->selisih > 0)

                                        <span class="badge bg-success">
                                            +{{ $log->selisih }}
                                            Bertambah
                                        </span>

                                    @elseif($log->selisih < 0)

                                        <span class="badge bg-danger">
                                            {{ $log->selisih }}
                                            Berkurang
                                        </span>

                                    @else

                                        <span class="badge bg-secondary">
                                            Tidak berubah
                                        </span>

                                    @endif

                                </td>

                                <td>
                                    <strong>
                                        {{ $log->stok_akhir }}
                                    </strong>
                                </td>

                                <td>
                                    {{ $log->created_at
                                        ? \Carbon\Carbon::parse($log->created_at)->format('d-m-Y H:i:s')
                                        : '-' }}
                                </td>

                            </tr>

                        @empty

                            <tr>
                                <td colspan="6" class="text-center py-4">

                                    <p class="text-muted mb-0">
                                        Belum ada riwayat perubahan stok.
                                    </p>

                                </td>
                            </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>

            {{-- Pagination --}}
            <div class="d-flex justify-content-between align-items-center flex-wrap gap-2 mt-3">

                <small class="text-muted">
                    Menampilkan {{ $logs->firstItem() ?? 0 }}
                    sampai {{ $logs->lastItem() ?? 0 }}
                    dari {{ $logs->total() }} data.
                </small>

                {{ $logs->links('pagination::bootstrap-5') }}

            </div>

        </div>

    </div>

</div>

</body>
</html>
