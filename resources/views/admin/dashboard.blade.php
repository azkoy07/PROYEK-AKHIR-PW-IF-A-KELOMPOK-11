
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

        <!-- Sidebar -->
        <div class="col-md-2 bg-dark text-white min-vh-100 p-3">

            <h4 class="fw-bold mb-4">SportZone</h4>

            <p class="text-secondary small">MENU ADMIN</p>

            <a href="{{ route('admin.dashboard') }}"
                class="d-block text-white text-decoration-none mb-3">
                <i class="bi bi-grid me-2"></i>
                Dashboard
            </a>

            <a href="#" class="d-block text-white text-decoration-none mb-3">
                <i class="bi bi-box-seam me-2"></i>
                Produk
            </a>

            <a href="#" class="d-block text-white text-decoration-none mb-3">
                <i class="bi bi-tags me-2"></i>
                Kategori
            </a>

            <a href="#" class="d-block text-white text-decoration-none mb-3">
                <i class="bi bi-cart me-2"></i>
                Pesanan
            </a>

            <hr class="border-secondary">

            <form action="{{ route('logout') }}" method="POST">
                @csrf

                <button type="submit" class="btn btn-outline-light w-100">
                    <i class="bi bi-box-arrow-right me-2"></i>
                    Logout
                </button>
            </form>

        </div>

        <!-- Konten utama -->
        <div class="col-md-10 p-4">

            <!-- Navbar -->
            <div class="d-flex justify-content-between align-items-center mb-4">

                <div>
                    <h3 class="fw-bold mb-1">Dashboard</h3>
                    <p class="text-secondary mb-0">
                        Ringkasan aktivitas toko SportZone
                    </p>
                </div>

                <div class="text-end">
                    <strong>{{ Auth::user()->nama }}</strong>
                    <div class="text-secondary small">Administrator</div>
                </div>

            </div>

            <!-- Statistik -->
            <div class="row g-3 mb-4">

                <div class="col-md-3">
                    <div class="card border-0 shadow-sm p-3">
                        <i class="bi bi-box-seam fs-3"></i>
                        <h3 class="fw-bold mt-2">
                            {{ $totalProduk }}
                        </h3>
                        <p class="text-secondary mb-0">Total Produk</p>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="card border-0 shadow-sm p-3">
                        <i class="bi bi-tags fs-3"></i>
                        <h3 class="fw-bold mt-2">
                            {{ $totalKategori }}
                        </h3>
                        <p class="text-secondary mb-0">Total Kategori</p>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="card border-0 shadow-sm p-3">
                        <i class="bi bi-people fs-3"></i>
                        <h3 class="fw-bold mt-2">
                            {{ $totalCustomer }}
                        </h3>
                        <p class="text-secondary mb-0">Total Customer</p>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="card border-0 shadow-sm p-3">
                        <i class="bi bi-cart-check fs-3"></i>
                        <h3 class="fw-bold mt-2">
                            {{ $totalPesanan }}
                        </h3>
                        <p class="text-secondary mb-0">Total Pesanan</p>
                    </div>
                </div>

            </div>

            <!-- Produk terbaru -->
            <div class="card border-0 shadow-sm">

                <div class="card-header bg-white py-3">
                    <h5 class="fw-bold mb-0">Produk Terbaru</h5>
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

                                @forelse ($produkTerbaru as $produk)

                                    <tr>
                                        <td>{{ $loop->iteration }}</td>

                                        <td>{{ $produk->nama }}</td>

                                        <td>{{ $produk->merek }}</td>

                                        <td>
                                            {{ $produk->nama_kategori ?? '-' }}
                                        </td>

                                        <td>
                                            Rp {{ number_format($produk->harga_dasar, 0, ',', '.') }}
                                        </td>

                                        <td>
                                            <span class="badge bg-success">
                                                {{ ucfirst($produk->status) }}
                                            </span>
                                        </td>
                                    </tr>

                                @empty

                                    <tr>
                                        <td colspan="6" class="text-center">
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

</body>
</html>
