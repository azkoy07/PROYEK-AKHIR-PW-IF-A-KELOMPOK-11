
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Wishlist - SportZone</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css"
          rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css"
          rel="stylesheet">

    <style>
        * {
            box-sizing: border-box;
            font-family: 'Inter', sans-serif;
        }

        body {
            background: #f5f7fb;
            color: #172033;
            font-size: 14px;
            margin: 0;
        }

        /* NAVBAR */

        .navbar {
            background: #fff;
            border-bottom: 1px solid #e8edf3;
            padding: 17px 0;
        }

        .brand {
            color: #172033;
            font-size: 22px;
            font-weight: 800;
            text-decoration: none;
            letter-spacing: -.8px;
            margin-left: -45px;
        }

        .brand span {
            color: #2563eb;
        }

        .back-link {
            color: #64748b;
            text-decoration: none;
            font-size: 13px;
            font-weight: 600;
            margin-right: -45px;
        }

        .back-link:hover {
            color: #2563eb;
        }

        /* KONTEN UTAMA */

        .page-container {
            max-width: 1180px;
            margin: 0 auto;
            padding: 22px 20px 65px;
        }

        /* HEADER */

        .page-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 23px;
        }

        .page-title {
            font-size: 24px;
            font-weight: 800;
            letter-spacing: -.7px;
            color: #172033;
        }

        .page-subtitle {
            color: #7b8495;
            font-size: 12px;
            margin: 0;
        }

        .wishlist-icon {
            width: 43px;
            height: 43px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: #eff6ff;
            color: #2563eb;
            border-radius: 10px;
            font-size: 19px;
            flex-shrink: 0;
        }

        /* TOMBOL */

        .btn {
            border-radius: 8px;
            font-size: 11px;
            font-weight: 600;
            padding: 9px 13px;
        }

        .btn-primary {
            background: #2563eb;
            border-color: #2563eb;
        }

        .btn-primary:hover {
            background: #1d4ed8;
            border-color: #1d4ed8;
        }

        /* WISHLIST WRAPPER */

        .wishlist-wrapper {
            background: #fff;
            border: 1px solid #e8edf3;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 4px 18px rgba(15, 23, 42, .03);
        }

        .wishlist-header {
            padding: 19px 23px;
            border-bottom: 1px solid #edf0f5;
        }

        .wishlist-header h5 {
            font-size: 14px;
            font-weight: 700;
            color: #172033;
        }

        .wishlist-header span {
            font-size: 11px;
        }

        .wishlist-content {
            padding: 23px;
        }

        /* KARTU PRODUK */

        .product-card {
            height: 100%;
            background: #fff;
            border: 1px solid #e8edf3;
            border-radius: 11px;
            overflow: hidden;
            transition: .2s ease;
            display: flex;
            flex-direction: column;
        }

        .product-card:hover {
            border-color: #cbdafc;
            box-shadow: 0 6px 18px rgba(20, 35, 65, .06);
            transform: translateY(-2px);
        }

        .product-image {
            height: 195px;
            background: #f7f9fc;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 15px;
            border-bottom: 1px solid #edf0f5;
        }

        .product-image img {
            width: 100%;
            height: 100%;
            object-fit: contain;
        }

        .image-placeholder {
            color: #cbd5e1;
            font-size: 43px;
        }

        .product-info {
            padding: 17px 18px;
            flex-grow: 1;
        }

        .category-badge {
            display: inline-block;
            background: #eff6ff;
            color: #2563eb;
            font-size: 10px;
            font-weight: 700;
            padding: 6px 9px;
            border-radius: 5px;
            margin-bottom: 11px;
        }

        .product-name {
            font-size: 14px;
            font-weight: 700;
            line-height: 1.5;
            min-height: 42px;
            margin-bottom: 7px;
            color: #172033;
        }

        .product-brand {
            color: #8490a2;
            font-size: 11px;
            margin-bottom: 13px;
        }

        .product-price {
            color: #2563eb;
            font-size: 16px;
            font-weight: 800;
            margin-bottom: 13px;
        }

        /* STATUS PRODUK */

        .status-active {
            display: inline-block;
            background: #e8f7ef;
            color: #16834b;
            font-size: 10px;
            font-weight: 700;
            padding: 6px 9px;
            border-radius: 5px;
        }

        .status-inactive {
            display: inline-block;
            background: #f1f5f9;
            color: #64748b;
            font-size: 10px;
            font-weight: 700;
            padding: 6px 9px;
            border-radius: 5px;
        }

        /* FOOTER KARTU */

        .product-footer {
            padding: 13px 18px 16px;
            border-top: 1px solid #edf0f5;
        }

        .product-footer form {
            flex-shrink: 0;
        }

        .product-footer .btn {
            height: 36px;
        }

        /* WISHLIST KOSONG */

        .empty-state {
            text-align: center;
            padding: 65px 20px;
        }

        .empty-icon {
            width: 85px;
            height: 85px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: #eff6ff;
            color: #2563eb;
            font-size: 36px;
            border-radius: 20px;
            margin: 0 auto 20px;
        }

        .empty-state h5 {
            font-size: 17px;
            font-weight: 800;
            color: #172033;
        }

        .empty-state p {
            color: #8490a2;
            font-size: 12px;
        }

        /* NOTIFIKASI */

        .alert {
            border-radius: 9px;
            font-size: 12px;
        }
    </style>
</head>

<body>

<!-- NAVBAR -->
<nav class="navbar">
    <div class="container">

        <a href="{{ route('home') }}" class="brand">
            SPORT<span>ZONE</span>
        </a>

        <a href="{{ route('home') }}" class="back-link">
            <i class="bi bi-arrow-left me-1"></i>
            Kembali ke Toko
        </a>

    </div>
</nav>


<!-- KONTEN -->
<div class="page-container">

    <!-- HEADER -->
    <div class="page-header">

        <div class="d-flex align-items-center gap-3">

            <div class="wishlist-icon">
                <i class="bi bi-heart"></i>
            </div>

            <div>
                <h3 class="page-title mb-1">
                    Wishlist Saya
                </h3>

                <p class="page-subtitle">
                    Daftar produk favorit yang kamu simpan.
                </p>
            </div>

        </div>

        <a href="{{ route('home') }}" class="btn btn-outline-primary">
            <i class="bi bi-shop me-1"></i>
            Jelajahi Produk
        </a>

    </div>


    <!-- NOTIFIKASI -->
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show">
            <i class="bi bi-check-circle me-2"></i>
            {{ session('success') }}

            <button type="button"
                    class="btn-close"
                    data-bs-dismiss="alert"></button>
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger alert-dismissible fade show">
            <i class="bi bi-exclamation-circle me-2"></i>
            {{ session('error') }}

            <button type="button"
                    class="btn-close"
                    data-bs-dismiss="alert"></button>
        </div>
    @endif


    <!-- DAFTAR WISHLIST -->
    <div class="wishlist-wrapper">

        <div class="wishlist-header d-flex justify-content-between align-items-center">

            <h5 class="mb-0">
                Produk Favorit
            </h5>

            <span class="text-secondary">
                {{ $products->count() }} produk tersimpan
            </span>

        </div>

        <div class="wishlist-content">

            @if($products->count() > 0)

                <div class="row g-4">

                    @foreach($products as $product)

                        <div class="col-md-6 col-lg-4">

                            <div class="product-card">

                                <!-- GAMBAR -->
                                <div class="product-image">

                                    @if($product->file_name)

                                        <img
                                            src="{{ asset('storage/' . $product->file_name) }}"
                                            alt="{{ $product->nama }}"
                                        >

                                    @else

                                        <i class="bi bi-image image-placeholder"></i>

                                    @endif

                                </div>


                                <!-- INFORMASI -->
                                <div class="product-info">

                                    <span class="category-badge">
                                        {{ $product->nama_kategori ?? 'Tanpa Kategori' }}
                                    </span>

                                    <h5 class="product-name">
                                        {{ $product->nama }}
                                    </h5>

                                    <p class="product-brand">
                                        <i class="bi bi-tag me-1"></i>
                                        Merek: {{ $product->merek ?? '-' }}
                                    </p>

                                    <div class="product-price">
                                        Rp{{ number_format($product->harga_dasar, 0, ',', '.') }}
                                    </div>

                                    @if($product->status == 'aktif')

                                        <span class="status-active">
                                            <i class="bi bi-check-circle me-1"></i>
                                            Produk Aktif
                                        </span>

                                    @else

                                        <span class="status-inactive">
                                            <i class="bi bi-dash-circle me-1"></i>
                                            Produk Nonaktif
                                        </span>

                                    @endif

                                </div>


                                <!-- TOMBOL -->
                                <div class="product-footer">

                                    <div class="d-flex gap-2">

                                        <a href="{{ route('products.show', $product->id) }}"
                                           class="btn btn-primary flex-grow-1">
                                            <i class="bi bi-eye me-1"></i>
                                            Detail Produk
                                        </a>

                                        <form
                                            action="{{ route('customer.wishlist.destroy', $product->id) }}"
                                            method="POST"
                                            onsubmit="return confirm('Hapus produk ini dari wishlist?')"
                                        >

                                            @csrf
                                            @method('DELETE')

                                            <button type="submit"
                                                    class="btn btn-outline-danger"
                                                    title="Hapus dari Wishlist">
                                                <i class="bi bi-trash"></i>
                                            </button>

                                        </form>

                                    </div>

                                </div>

                            </div>

                        </div>

                    @endforeach

                </div>

            @else

                <!-- WISHLIST KOSONG -->
                <div class="empty-state">

                    <div class="empty-icon">
                        <i class="bi bi-heart"></i>
                    </div>

                    <h5>Wishlist Masih Kosong</h5>

                    <p class="mb-4">
                        Kamu belum menyimpan produk favorit.
                        Temukan produk olahraga yang kamu sukai.
                    </p>

                    <a href="{{ route('home') }}" class="btn btn-primary">
                        <i class="bi bi-shop me-1"></i>
                        Jelajahi Produk
                    </a>

                </div>

            @endif

        </div>

    </div>

</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
