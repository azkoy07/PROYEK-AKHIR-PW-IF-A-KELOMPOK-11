
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola Produk - SportZone</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container py-5">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h2>Kelola Produk</h2>
            <p class="text-muted">Daftar produk SportZone</p>
        </div>

        <div class="d-flex gap-2">
            <a href="{{ route('admin.products.create') }}"
               class="btn btn-primary">
                + Tambah Produk
            </a>

            <a href="{{ route('admin.dashboard') }}"
               class="btn btn-secondary">
                Kembali ke Dashboard
            </a>
        </div>
    </div>

    {{-- Notifikasi berhasil --}}
    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show">
            {{ session('success') }}

            <button type="button"
                    class="btn-close"
                    data-bs-dismiss="alert">
            </button>
        </div>
    @endif

    {{-- Notifikasi gagal --}}
    @if (session('error'))
        <div class="alert alert-danger alert-dismissible fade show">
            {{ session('error') }}

            <button type="button"
                    class="btn-close"
                    data-bs-dismiss="alert">
            </button>
        </div>
    @endif

    <div class="card shadow-sm">
        <div class="card-body">

            <div class="table-responsive">
                <table class="table table-bordered table-striped">

                    <thead class="table-dark">
                        <tr>
                            <th>No</th>
                            <th>Nama Produk</th>
                            <th>Merek</th>
                            <th>Kategori</th>
                            <th>Jenis Produk</th>
                            <th>Harga</th>
                            <th>Total Stok</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse ($products as $product)
                            <tr>
                                <td>{{ $loop->iteration }}</td>

                                <td>{{ $product->nama }}</td>

                                <td>{{ $product->merek }}</td>

                                <td>{{ $product->nama_kategori ?? '-' }}</td>

                                <td>
                                    {{ $product->jenis_produk == 'biasa'
                                        ? 'Tanpa Variasi'
                                        : 'Dengan Variasi' }}
                                </td>

                                <td>
                                    Rp {{ number_format($product->harga_dasar, 0, ',', '.') }}
                                </td>

                                <td>{{ $product->total_stok }}</td>

                                <td>{{ $product->status }}</td>

                                <td>
                                    <div class="d-flex gap-2">

                                        {{-- Tombol Edit --}}
                                        <a href="{{ route('admin.products.edit', $product->id) }}"
                                           class="btn btn-warning btn-sm">
                                            Edit
                                        </a>

                                        {{-- Tombol Delete --}}
                                        <form action="{{ route('admin.products.destroy', $product->id) }}"
                                              method="POST"
                                              onsubmit="return confirm('Apakah Anda yakin ingin menghapus produk ini?')">

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
                                <td colspan="9" class="text-center">
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

</body>
</html>
