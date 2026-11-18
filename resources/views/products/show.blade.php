
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>{{ $product->nama }} - SportZone</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css" rel="stylesheet">

    <style>
        * {
            font-family: 'Inter', sans-serif;
        }

        body {
            background: #f3f6fb;
            color: #172033;
        }

        /* NAVBAR */
        .navbar {
            background: #fff;
            border-bottom: 1px solid #e8edf3;
            padding: 17px 0;
        }

        .brand {
            display: inline-block;
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
        .main-container {
            max-width: 1160px;
            margin: 0 auto;
            padding: 20px 24px 45px;
        }

        .breadcrumb-detail {
            font-size: 11px;
            color: #8993a4;
            margin-bottom: 14px;
        }

        .breadcrumb-detail a {
            color: #64748b;
            text-decoration: none;
        }

        .breadcrumb-detail a:hover {
            color: #2563eb;
        }

        /* CARD UTAMA */
        .product-card {
            background: #ffffff;
            border: 1px solid #e5eaf1;
            border-radius: 13px;
            padding: 22px;
            box-shadow: 0 5px 20px rgba(15, 23, 42, .045);
        }

        .product-layout {
            align-items: flex-start;
        }

        /* GAMBAR */
        .product-image-wrapper {
            background: #f8fafc;
            border: 1px solid #e9eef5;
            border-radius: 11px;
            height: 310px;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 22px;
        }

        .product-image {
            width: 100%;
            height: 100%;
            max-height: 255px;
            object-fit: contain;
        }

        .image-placeholder {
            color: #c3cad5;
            font-size: 75px;
        }

        /* INFORMASI PRODUK */
        .product-information {
            padding-left: 8px;
        }

        .category-badge {
            display: inline-flex;
            align-items: center;
            background: #edf4ff;
            color: #2563eb;
            padding: 6px 10px;
            border-radius: 6px;
            font-size: 10px;
            font-weight: 700;
            margin-bottom: 9px;
        }

        .product-name {
            font-size: 21px;
            font-weight: 800;
            line-height: 1.4;
            letter-spacing: -.5px;
            margin-bottom: 5px;
            color: #172033;
        }

        .rating-wrapper {
            margin: 5px 0 8px;
            font-size: 11px;
        }

        .product-brand {
            font-size: 11px;
            color: #718096;
            margin: 7px 0 11px;
        }

        /* CARD HARGA */
        .price-card {
            background: #f8faff;
            border: 1px solid #e4edfc;
            border-radius: 9px;
            padding: 11px 14px;
            margin-bottom: 11px;
        }

        .price-label {
            display: block;
            color: #64748b;
            font-size: 10px;
            font-weight: 600;
            margin-bottom: 3px;
        }

        .product-price {
            font-size: 23px;
            font-weight: 800;
            color: #2563eb;
            letter-spacing: -.5px;
            margin: 0;
        }

        /* WISHLIST */
        .wishlist-button {
            border: 1px solid #dce5f1;
            color: #64748b;
            background: #ffffff;
            font-size: 10px;
            font-weight: 600;
            padding: 8px 11px;
            border-radius: 7px;
            transition: .2s;
        }

        .wishlist-button:hover {
            border-color: #2563eb;
            color: #2563eb;
            background: #eff6ff;
        }

        /* CARD INFORMASI STOK */
        .product-meta {
            display: flex;
            gap: 9px;
            margin: 12px 0;
        }

        .meta-item {
            flex: 1;
            background: #ffffff;
            border: 1px solid #e8edf4;
            border-radius: 8px;
            padding: 9px 11px;
            color: #64748b;
            font-size: 10px;
        }

        .meta-item i {
            color: #2563eb;
            margin-right: 3px;
        }

        .meta-item strong {
            display: block;
            color: #172033;
            font-size: 13px;
            margin-top: 4px;
        }

        /* PEMBATAS */
        .section-divider {
            border-color: #e9edf3;
            margin: 13px 0;
            opacity: 1;
        }

        /* DESKRIPSI */
        .section-title {
            font-size: 12px;
            font-weight: 800;
            margin-bottom: 8px;
            color: #172033;
        }

        .description-box {
            background: #f8fafc;
            border: 1px solid #edf0f5;
            border-radius: 8px;
            padding: 11px 13px;
        }

        .description {
            color: #64748b;
            font-size: 11px;
            line-height: 1.75;
            white-space: pre-line;
            margin-bottom: 0;
        }

        /* AREA PEMBELIAN */
        .purchase-card {
            background: #fbfcfe;
            border: 1px solid #e8edf4;
            border-radius: 9px;
            padding: 13px;
        }

        .purchase-title {
            font-size: 12px;
            font-weight: 800;
            color: #172033;
            margin-bottom: 11px;
        }

        .form-label {
            color: #344054;
            font-size: 11px;
            font-weight: 700;
            margin-bottom: 6px;
        }

        .form-select,
        .form-control {
            border: 1px solid #e2e8f0;
            border-radius: 7px;
            min-height: 39px;
            font-size: 11px;
            box-shadow: none !important;
        }

        .form-select:focus,
        .form-control:focus {
            border-color: #8bb5ff;
        }

        .stock-info {
            display: flex;
            align-items: center;
            gap: 6px;
            font-size: 10px;
            color: #16a34a;
            margin-top: 7px;
        }

        .quantity-input {
            max-width: 110px;
        }

        .btn-primary-custom {
            background: #2563eb;
            border: 1px solid #2563eb;
            color: #ffffff;
            border-radius: 7px;
            padding: 10px 14px;
            font-size: 11px;
            font-weight: 700;
            transition: .2s;
        }

        .btn-primary-custom:hover {
            background: #1d4ed8;
            border-color: #1d4ed8;
            color: #ffffff;
        }

        .btn-outline-custom {
            background: #ffffff;
            border: 1px solid #d8e1ef;
            color: #2563eb;
            border-radius: 7px;
            padding: 10px 14px;
            font-size: 11px;
            font-weight: 700;
            transition: .2s;
        }

        .btn-outline-custom:hover {
            background: #edf4ff;
            border-color: #2563eb;
            color: #2563eb;
        }

        /* NOTIFIKASI */
        .notice-box {
            border-radius: 8px;
            padding: 12px;
            font-size: 11px;
            line-height: 1.7;
        }

        .notice-box p {
            margin-bottom: 0;
        }

        .notice-warning {
            background: #fff9e9;
            border: 1px solid #f7e7b6;
            color: #946b13;
        }

        .notice-info {
            background: #eff6ff;
            border: 1px solid #dbeafe;
            color: #1e40af;
        }

        .notice-danger {
            background: #fff1f2;
            border: 1px solid #ffe0e3;
            color: #be123c;
        }

        .alert {
            font-size: 12px;
            border-radius: 8px;
        }

        /* CARD INFORMASI GUEST DAN ADMIN */
        .access-card {
            display: flex;
            align-items: flex-start;
            gap: 13px;
            background: #ffffff;
            border: 1px solid #e5eaf1;
            border-radius: 10px;
            padding: 15px;
            margin-top: 3px;
        }

        .access-icon {
            width: 38px;
            height: 38px;
            min-width: 38px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: #eff6ff;
            color: #2563eb;
            border-radius: 9px;
            font-size: 17px;
        }

        .access-content {
            flex: 1;
        }

        .access-title {
            color: #172033;
            font-size: 12px;
            font-weight: 800;
            margin-bottom: 5px;
        }

        .access-description {
            color: #64748b;
            font-size: 11px;
            line-height: 1.7;
            margin-bottom: 12px;
        }

        .access-actions {
            display: flex;
            align-items: center;
            gap: 8px;
            flex-wrap: wrap;
        }

        .access-button-primary {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            background: #2563eb;
            border: 1px solid #2563eb;
            color: #ffffff;
            text-decoration: none;
            border-radius: 7px;
            padding: 8px 13px;
            font-size: 10px;
            font-weight: 700;
            transition: .2s;
        }

        .access-button-primary:hover {
            background: #1d4ed8;
            border-color: #1d4ed8;
            color: #ffffff;
        }

        .access-button-outline {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            background: #ffffff;
            border: 1px solid #d8e1ef;
            color: #2563eb;
            text-decoration: none;
            border-radius: 7px;
            padding: 8px 13px;
            font-size: 10px;
            font-weight: 700;
            transition: .2s;
        }

        .access-button-outline:hover {
            background: #eff6ff;
            border-color: #2563eb;
            color: #2563eb;
        }

        .access-label {
            display: inline-flex;
            align-items: center;
            gap: 5px;
            background: #eff6ff;
            color: #2563eb;
            border-radius: 5px;
            padding: 4px 8px;
            font-size: 9px;
            font-weight: 700;
            margin-bottom: 7px;
        }

        /* FOOTER */
        .footer-detail {
            border-top: 1px solid #e9edf3;
            padding: 20px 0;
            color: #8993a4;
            font-size: 11px;
            text-align: center;
            background: #ffffff;
        }
    </style>
</head>

<body>

    <!-- NAVBAR -->
    <nav class="navbar">
        <div class="container">
            <a href="{{ route('home') }}" class="brand">SPORT<span>ZONE</span></a>

            <a href="{{ route('home') }}" class="back-link">
                <i class="bi bi-arrow-left me-1"></i>
                Kembali ke Toko
            </a>
        </div>
    </nav>


    <!-- KONTEN UTAMA -->
    <main class="main-container">

        <!-- BREADCRUMB -->
        <div class="breadcrumb-detail">
            <a href="{{ route('home') }}">Beranda</a>
            <i class="bi bi-chevron-right mx-2"></i>
            <span>{{ $product->nama_kategori ?? 'Produk' }}</span>
            <i class="bi bi-chevron-right mx-2"></i>
            <span class="text-dark">{{ $product->nama }}</span>
        </div>


        <!-- NOTIFIKASI -->
        @if(session('error'))
            <div class="alert alert-danger">
                <i class="bi bi-exclamation-circle me-2"></i>
                {{ session('error') }}
            </div>
        @endif

        @if(session('success'))
            <div class="alert alert-success">
                <i class="bi bi-check-circle me-2"></i>
                {{ session('success') }}
            </div>
        @endif

        @if($errors->any())
            <div class="alert alert-danger">
                @foreach($errors->all() as $error)
                    <div>{{ $error }}</div>
                @endforeach
            </div>
        @endif


        <!-- DETAIL PRODUK -->
        <div class="product-card">

            <div class="row g-3 product-layout">

                <!-- GAMBAR PRODUK -->
                <div class="col-md-5">

                    <div class="product-image-wrapper">

                        @if($image && $image->file_name)

                            <img
                                src="{{ asset('storage/' . $image->file_name) }}"
                                alt="{{ $product->nama }}"
                                class="product-image"
                            >

                        @else

                            <i class="bi bi-image image-placeholder"></i>

                        @endif

                    </div>

                </div>


                <!-- INFORMASI PRODUK -->
                <div class="col-md-7 product-information">

                    <span class="category-badge">
                        <i class="bi bi-tag-fill me-2"></i>
                        {{ $product->nama_kategori ?? 'Tanpa Kategori' }}
                    </span>

                    <h1 class="product-name">
                        {{ $product->nama }}
                    </h1>


                    <!-- RATING -->
                    <div class="rating-wrapper">
                        @include('products.reviews.summary', [
                            'product' => $product
                        ])
                    </div>


                    <p class="product-brand">
                        <i class="bi bi-patch-check me-1"></i>
                        Merek: {{ $product->merek ?? '-' }}
                    </p>


                    <!-- HARGA -->
                    <div class="price-card">
                        <span class="price-label">Harga Produk</span>

                        <div class="product-price" id="productPrice">
                            Rp{{ number_format($product->harga_dasar, 0, ',', '.') }}
                        </div>
                    </div>


                    <!-- WISHLIST -->
                    @if(auth()->check() && auth()->user()->role === 'customer')

                        <form
                            action="{{ route('customer.wishlist.store', $product->id) }}"
                            method="POST"
                            class="mb-2"
                        >
                            @csrf

                            <button type="submit" class="wishlist-button">
                                <i class="bi bi-heart me-1"></i>
                                Tambahkan ke Wishlist
                            </button>
                        </form>

                    @elseif(!auth()->check())

                        <a href="{{ route('login') }}" class="wishlist-button text-decoration-none d-inline-block mb-2">
                            <i class="bi bi-heart me-1"></i>
                            Login untuk Menambahkan Wishlist
                        </a>

                    @endif


                    <!-- INFORMASI PENJUALAN DAN STOK -->
                    <div class="product-meta">

                        <div class="meta-item">
                            <i class="bi bi-bag-check"></i>
                            Terjual
                            <strong>{{ $product->terjual ?? 0 }} produk</strong>
                        </div>

                        <div class="meta-item">
                            <i class="bi bi-box-seam"></i>
                            Total Stok
                            <strong id="totalStock">{{ $totalStok }} produk</strong>
                        </div>

                    </div>


                    <hr class="section-divider">


                    <!-- DESKRIPSI -->
                    <h5 class="section-title">
                        <i class="bi bi-card-text me-1"></i>
                        Deskripsi Produk
                    </h5>

                    <div class="description-box">
                        <p class="description">
                            {{ $product->deskripsi ?: 'Belum ada deskripsi produk.' }}
                        </p>
                    </div>


                    <hr class="section-divider">


                    <!-- PEMERIKSAAN STOK -->
                    @if($totalStok > 0)

                        <!-- CUSTOMER LOGIN -->
                        @if(auth()->check() && auth()->user()->role === 'customer')

                            <div class="purchase-card">

                                <div class="purchase-title">
                                    <i class="bi bi-cart3 me-1"></i>
                                    Pembelian Produk
                                </div>

                                <form
                                    action="{{ route('cart.store') }}"
                                    method="POST"
                                    id="purchaseForm"
                                >

                                    @csrf

                                    <input
                                        type="hidden"
                                        name="product_id"
                                        value="{{ $product->id }}"
                                    >


                                    <!-- PILIH VARIASI -->
                                    @if($product->jenis_produk == 'variasi')

                                        <div class="mb-3">

                                            <label for="variant_id" class="form-label">
                                                Pilih Ukuran / Warna
                                            </label>

                                            <select
                                                name="variant_id"
                                                id="variant_id"
                                                class="form-select"
                                                required
                                            >

                                                <option value="">
                                                    Pilih variasi produk
                                                </option>

                                                @foreach($variants as $variant)

                                                    @if($variant->stok > 0)

                                                        <option
                                                            value="{{ $variant->id }}"
                                                            data-stock="{{ $variant->stok }}"
                                                            data-price="{{ $variant->harga }}"
                                                            {{ old('variant_id') == $variant->id ? 'selected' : '' }}
                                                        >
                                                            {{ $variant->ukuran ?: '-' }}
                                                            /
                                                            {{ $variant->warna ?: '-' }}
                                                            - Rp{{ number_format($variant->harga, 0, ',', '.') }}
                                                            (Stok: {{ $variant->stok }})
                                                        </option>

                                                    @endif

                                                @endforeach

                                            </select>

                                            <div class="stock-info" id="variantStockInfo">
                                                <i class="bi bi-info-circle"></i>
                                                Pilih variasi untuk melihat stok.
                                            </div>

                                        </div>

                                    @else

                                        <input
                                            type="hidden"
                                            name="variant_id"
                                            value=""
                                        >

                                        <div class="stock-info mb-3">
                                            <i class="bi bi-check-circle-fill"></i>
                                            Produk tersedia: {{ $product->stok }} stok
                                        </div>

                                    @endif


                                    <!-- JUMLAH PEMBELIAN -->
                                    <div class="mb-3">

                                        <label for="qty" class="form-label">
                                            Jumlah Pembelian
                                        </label>

                                        <input
                                            type="number"
                                            name="qty"
                                            id="qty"
                                            class="form-control quantity-input"
                                            value="{{ old('qty', 1) }}"
                                            min="1"
                                            @if($product->jenis_produk != 'variasi')
                                                max="{{ $product->stok }}"
                                            @endif
                                            required
                                        >

                                    </div>


                                    <!-- TOMBOL -->
                                    <div class="d-flex gap-2 flex-wrap">

                                        <button
                                            type="submit"
                                            class="btn-outline-custom"
                                            id="cartButton"
                                        >
                                            <i class="bi bi-cart-plus me-1"></i>
                                            Tambah Keranjang
                                        </button>

                                        <button
                                            type="submit"
                                            formaction="{{ route('checkout.buyNow') }}"
                                            class="btn-primary-custom"
                                            id="buyButton"
                                        >
                                            <i class="bi bi-bag-check me-1"></i>
                                            Beli Sekarang
                                        </button>

                                    </div>

                                </form>

                            </div>


                        <!-- PENGUNJUNG BELUM LOGIN -->
                        @elseif(!auth()->check())

                            <div class="access-card">

                                <div class="access-icon">
                                    <i class="bi bi-person-lock"></i>
                                </div>

                                <div class="access-content">

                                    <div class="access-label">
                                        <i class="bi bi-info-circle"></i>
                                        AKSES PENGUNJUNG
                                    </div>

                                    <h6 class="access-title">
                                        Masuk untuk Mulai Berbelanja
                                    </h6>

                                    <p class="access-description">
                                        Silakan login atau buat akun terlebih dahulu untuk
                                        menggunakan fitur keranjang dan melakukan pembelian produk.
                                    </p>

                                    <div class="access-actions">

                                        <a href="{{ route('login') }}" class="access-button-primary">
                                            <i class="bi bi-box-arrow-in-right me-1"></i>
                                            Login Sekarang
                                        </a>

                                        <a href="{{ route('register') }}" class="access-button-outline">
                                            <i class="bi bi-person-plus me-1"></i>
                                            Buat Akun
                                        </a>

                                    </div>

                                </div>

                            </div>


                        <!-- ADMIN LOGIN -->
                        @else

                            <div class="access-card">

                                <div class="access-icon">
                                    <i class="bi bi-shield-check"></i>
                                </div>

                                <div class="access-content">

                                    <div class="access-label">
                                        <i class="bi bi-person-badge"></i>
                                        AKUN ADMIN
                                    </div>

                                    <h6 class="access-title">
                                        Anda Sedang Login sebagai Admin
                                    </h6>

                                    <p class="access-description">
                                        Halaman ini merupakan tampilan detail produk untuk customer.
                                        Untuk mengelola produk dan aktivitas toko, silakan menuju
                                        dashboard admin.
                                    </p>

                                    <div class="access-actions">

                                        <a href="{{ route('admin.dashboard') }}" class="access-button-primary">
                                            <i class="bi bi-speedometer2 me-1"></i>
                                            Buka Dashboard Admin
                                        </a>

                                    </div>

                                </div>

                            </div>

                        @endif


                    <!-- PRODUK HABIS -->
                    @else

                        <div class="notice-box notice-danger">
                            <i class="bi bi-exclamation-circle me-2"></i>
                            <strong>Produk sedang habis.</strong>
                            <p class="mt-1">
                                Stok produk belum tersedia untuk saat ini.
                            </p>
                        </div>

                    @endif

                </div>

            </div>

        </div>

    </main>


    <!-- FOOTER -->
    <footer class="footer-detail">
        <div class="container">
            &copy; {{ date('Y') }} SportZone. Toko Perlengkapan Olahraga.
        </div>
    </footer>


    <!-- JAVASCRIPT -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function () {

            const variantSelect = document.getElementById('variant_id');
            const quantityInput = document.getElementById('qty');
            const priceElement = document.getElementById('productPrice');
            const stockElement = document.getElementById('totalStock');
            const stockInfo = document.getElementById('variantStockInfo');

            function formatRupiah(number) {
                return 'Rp' + Number(number).toLocaleString('id-ID');
            }

            if (variantSelect) {

                function updateVariant() {

                    const selectedOption = variantSelect.options[variantSelect.selectedIndex];

                    if (!selectedOption || !selectedOption.value) {
                        stockInfo.innerHTML = '<i class="bi bi-info-circle"></i> Pilih variasi untuk melihat stok.';
                        quantityInput.removeAttribute('max');
                        return;
                    }

                    const stock = Number(selectedOption.dataset.stock);
                    const price = Number(selectedOption.dataset.price);

                    priceElement.textContent = formatRupiah(price);
                    stockElement.textContent = stock + ' produk';

                    stockInfo.innerHTML =
                        '<i class="bi bi-check-circle-fill"></i> Stok tersedia: ' + stock;

                    quantityInput.max = stock;

                    if (Number(quantityInput.value) > stock) {
                        quantityInput.value = stock;
                    }
                }

                variantSelect.addEventListener('change', updateVariant);

                if (variantSelect.value) {
                    updateVariant();
                }
            }

        });
    </script>

</body>
</html>
