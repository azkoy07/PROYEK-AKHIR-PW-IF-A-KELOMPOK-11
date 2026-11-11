
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
            font-family: 'Inter', sans-serif;
        }

        body {
            background: #f5f7fb;
            color: #172033;
        }

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
        }

        .brand span {
            color: #2563eb;
        }

        .back-link {
            color: #64748b;
            text-decoration: none;
            font-size: 13px;
            font-weight: 600;
        }

        .back-link:hover {
            color: #2563eb;
        }

        .page-container {
            max-width: 1180px;
            margin: 0 auto;
            padding: 40px 20px 70px;
        }

        .page-title {
            font-size: 25px;
            font-weight: 800;
            letter-spacing: -.7px;
        }

        .page-subtitle {
            color: #7b8495;
            font-size: 13px;
        }

        .wishlist-icon {
            width: 43px;
            height: 43px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: #fff0f1;
            color: #e34c61;
            border-radius: 11px;
            font-size: 20px;
        }

        .btn {
            border-radius: 8px;
            font-size: 12px;
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

        .wishlist-wrapper {
            background: #fff;
            border: 1px solid #e9edf3;
            border-radius: 13px;
            overflow: hidden;
        }

        .wishlist-header {
            padding: 21px 25px;
            border-bottom: 1px solid #edf0f5;
        }

        .wishlist-header h5 {
            font-size: 15px;
            font-weight: 700;
        }

        .product-card {
            height: 100%;
            background: #fff;
            border: 1px solid #e9edf3;
            border-radius: 12px;
            overflow: hidden;
            transition: .2s ease;
        }

        .product-card:hover {
            border-color: #cbdafc;
            box-shadow: 0 7px 22px rgba(20, 35, 65, .07);
            transform: translateY(-3px);
        }

        .product-image {
            height: 215px;
            background: #f7f8fa;
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
            color: #aab2c0;
            font-size: 48px;
        }

        .product-info {
            padding: 19px;
        }

        .category-badge {
            display: inline-block;
            background: #eff4ff;
            color: #2563eb;
            font-size: 10px;
            font-weight: 700;
            padding: 6px 9px;
            border-radius: 5px;
            margin-bottom: 12px;
        }

        .product-name {
            font-size: 15px;
            font-weight: 700;
            line-height: 1.5;
            min-height: 45px;
            margin-bottom: 7px;
        }

        .product-brand {
            color: #8490a2;
            font-size: 12px;
            margin-bottom: 15px;
        }

        .product-price {
            color: #2563eb;
            font-size: 17px;
            font-weight: 800;
            margin-bottom: 12px;
        }

        .status-active {
            background: #e8f7ef;
            color: #16834b;
            font-size: 10px;
            font-weight: 700;
            padding: 6px 9px;
            border-radius: 5px;
        }

        .status-inactive {
            background: #f0f1f3;
            color: #697386;
            font-size: 10px;
            font-weight: 700;
            padding: 6px 9px;
            border-radius: 5px;
        }

        .product-footer {
            padding: 14px 19px 18px;
            border-top: 1px solid #edf0f5;
        }

        .product-footer form {
            flex-shrink: 0;
        }

        .product-footer .btn {
            height: 37px;
        }

        .empty-state {
            text-align: center;
            padding: 75px 20px;
        }

        .empty-icon {
            width: 90px;
            height: 90px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: #fff0f1;
            color: #e34c61;
            font-size: 38px;
            border-radius: 24px;
            margin: 0 auto 22px;
        }

        .empty-state h5 {
            font-size: 18px;
            font-weight: 800;
        }

        .empty-state p {
            color: #8490a2;
            font-size: 13px;
        }

        .alert {
            border-radius: 9px;
            font-size: 13px;
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
    <div class="d-flex justify-content-between align-items-center mb-4">

        <div class="d-flex align-items-center gap-3">
            <div class="wishlist-icon">
                <i class="bi bi-heart-fill"></i>
            </div>

            <div>
                <h3 class="page-title mb-1">
                    Wishlist Saya
                </h3>

                <p class="page-subtitle mb-0">
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

            <span class="text-secondary small">
                {{ $products->count() }} produk tersimpan
            </span>

        </div>

        <div class="p-4">

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
