<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola Voucher - SportZone</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css"
          rel="stylesheet">
</head>

<body class="bg-light">

<div class="container py-5">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h2>Kelola Voucher</h2>
            <p class="text-muted">Daftar voucher diskon SportZone</p>
        </div>

        <div class="d-flex gap-2">
            <a href="{{ route('admin.vouchers.create') }}"
               class="btn btn-primary">
                + Tambah Voucher
            </a>

            <a href="{{ route('admin.dashboard') }}"
               class="btn btn-secondary">
                Kembali
            </a>
        </div>
    </div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show">
            {{ session('success') }}
            <button type="button" class="btn-close"
                    data-bs-dismiss="alert"></button>
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger alert-dismissible fade show">
            {{ session('error') }}
            <button type="button" class="btn-close"
                    data-bs-dismiss="alert"></button>
        </div>
    @endif

    <div class="card shadow-sm">
        <div class="card-body">

            <div class="table-responsive">
                <table class="table table-bordered table-striped align-middle">

                    <thead class="table-dark">
                        <tr>
                            <th>No</th>
                            <th>Kode Voucher</th>
                            <th>Potongan</th>
                            <th>Minimal Belanja</th>
                            <th>Kuota</th>
                            <th>Kedaluwarsa</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse($vouchers as $voucher)
                            <tr>
                                <td>{{ $loop->iteration }}</td>

                                <td>
                                    <strong>{{ $voucher->kode }}</strong>
                                </td>

                                <td>
                                    Rp {{ number_format($voucher->potongan, 0, ',', '.') }}
                                </td>

                                <td>
                                    Rp {{ number_format($voucher->min_belanja, 0, ',', '.') }}
                                </td>

                                <td>{{ $voucher->kuota }}</td>

                                <td>
                                    {{ \Carbon\Carbon::parse($voucher->expired)->format('d-m-Y') }}
                                </td>

                                <td>
                                    <div class="d-flex gap-2">

                                        <a href="{{ route('admin.vouchers.edit', $voucher->id) }}"
                                           class="btn btn-warning btn-sm">
                                            Edit
                                        </a>

                                        <form action="{{ route('admin.vouchers.destroy', $voucher->id) }}"
                                              method="POST"
                                              onsubmit="return confirm('Yakin ingin menghapus voucher ini?')">

                                            @csrf
                                            @method('DELETE')

                                            <button type="submit"
                                                    class="btn btn-danger btn-sm">
                                                Hapus
                                            </button>

                                        </form>

                                    </div>
                                </td>
                            </tr>

                        @empty
                            <tr>
                                <td colspan="7" class="text-center">
                                    Belum ada voucher.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>

                </table>
            </div>

        </div>
    </div>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
