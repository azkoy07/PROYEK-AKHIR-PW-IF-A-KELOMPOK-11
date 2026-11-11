
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
            background: #f7f9fc;
            color: #172033;
        }

        .navbar-detail {
            background: #ffffff;
            border-bottom: 1px solid #e9edf3;
            padding: 17px 0;
        }

        .brand {
            display: flex;
            align-items: center;
            gap: 11px;
            text-decoration: none;
            color: #172033;
        }

        .brand-icon {
            width: 42px;
            height: 42px;
            background: #2563eb;
            color: #ffffff;
            border-radius: 11px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 21px;
        }

        .brand-name {
            font-size: 20px;
            font-weight: 800;
            letter-spacing: -0.7px;
        }

        .brand-caption {
            display: block;
            color: #8993a4;
            font-size: 10px;
            font-weight: 600;
            letter-spacing: 1.5px;
            margin-top: -3px;
        }

        .back-link {
            color: #596579;
            text-decoration: none;
            font-size: 13px;
            font-weight: 600;
            transition: .2s;
        }

        .back-link:hover {
            color: #2563eb;
        }

        .main-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 35px 24px 65px;
        }

        .breadcrumb-detail {
            font-size: 12px;
            color: #8993a4;
            margin-bottom: 23px;
        }

        .breadcrumb-detail a {
            color: #64748b;
            text-decoration: none;
        }

        .breadcrumb-detail a:hover {
            color: #2563eb;
        }

        .product-card {
            background: #ffffff;
            border: 1px solid #edf0f5;
            border-radius: 16px;
            padding: 30px;
            box-shadow: 0 5px 25px rgba(15, 23, 42, .035);
        }

        .product-image-wrapper {
            background: #f7f9fc;
            border: 1px solid #edf0f5;
            border-radius: 13px;
            min-height: 440px;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 25px;
        }

        .product-image {
            width: 100%;
            max-height: 390px;
            object-fit: contain;
        }

        .image-placeholder {
            color: #c3cad5;
            font-size: 100px;
        }

        .category-badge {
            display: inline-flex;
            align-items: center;
            background: #edf4ff;
            color: #2563eb;
            padding: 7px 12px;
            border-radius: 6px;
            font-size: 11px;
            font-weight: 700;
            margin-bottom: 15px;
        }

        .product-name {
            font-size: 27px;
            font-weight: 800;
            line-height: 1.4;
            letter-spacing: -.8px;
            margin-bottom: 10px;
            color: #172033;
        }

        .product-brand {
            font-size: 13px;
            color: #7b8798;
            margin: 17px 0 12px;
        }

        .product-price {
            font-size: 29px;
            font-weight: 800;
            color: #2563eb;
            letter-spacing: -.7px;
            margin-bottom: 20px;
        }

        .product-meta {
            display: flex;
            gap: 25px;
            flex-wrap: wrap;
            margin: 20px 0;
        }

        .meta-item {
            color: #64748b;
            font-size: 12px;
        }

        .meta-item strong {
            display: block;
            color: #172033;
            font-size: 14px;
            margin-top: 5px;
        }

        .section-divider {
            border-color: #edf0f5;
            margin: 23px 0;
        }

        .section-title {
            font-size: 14px;
            font-weight: 700;
            margin-bottom: 12px;
            color: #172033;
        }

        .description {
            color: #718096;
            font-size: 13px;
            line-height: 1.9;
            white-space: pre-line;
            margin-bottom: 0;
        }

        .wishlist-button {
            border: 1px solid #e4e8ef;
            color: #64748b;
            background: #ffffff;
            font-size: 12px;
            font-weight: 600;
            padding: 9px 13px;
            border-radius: 7px;
        }

        .wishlist-button:hover {
            border-color: #ef4444;
            color: #ef4444;
            background: #fff7f7;
        }

        .form-label {
            color: #344054;
            font-size: 12px;
            font-weight: 700;
            margin-bottom: 8px;
        }

        .form-select,
        .form-control {
            border: 1px solid #e2e8f0;
            border-radius: 8px;
            min-height: 43px;
            font-size: 12px;
            box-shadow: none !important;
        }

        .form-select:focus,
        .form-control:focus {
            border-color: #8bb5ff;
        }

        .stock-info {
            display: flex;
            align-items: center;
            gap: 8px;
            font-size: 12px;
            color: #16a34a;
            margin-top: 9px;
        }

        .quantity-input {
            max-width: 130px;
        }

        .btn-primary-custom {
            background: #2563eb;
            border: 1px solid #2563eb;
            color: #ffffff;
            border-radius: 8px;
            padding: 12px 19px;
            font-size: 12px;
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
            border-radius: 8px;
            padding: 12px 19px;
            font-size: 12px;
            font-weight: 700;
            transition: .2s;
        }

        .btn-outline-custom:hover {
            background: #edf4ff;
            border-color: #2563eb;
            color: #2563eb;
        }

        .notice-box {
            border-radius: 9px;
            padding: 15px;
            font-size: 12px;
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
            font-size: 13px;
            border-radius: 9px;
        }

        .footer-detail {
            border-top: 1px solid #e9edf3;
            padding: 22px 0;
            color: #8993a4;
            font-size: 11px;
            text-align: center;
            background: #ffffff;
        }
    </style>
</head>

<body>

    <!-- NAVBAR -->
    <nav class="navbar-detail">
        <div class="container d-flex justify-content-between align-items-center">

            <a href="{{ route('home') }}" class="brand">
                <div class="brand-icon">
                    <i class="bi bi-bag-check-fill"></i>
                </div>

                <div>
                    <div class="brand-name">SportZone</div>
                    <span class="brand-caption">SPORTS STORE</span>
                </div>
            </a>

            <a href="{{ route('home') }}" class="back-link">
                <i class="bi bi-arrow-left me-2"></i>
                Kembali ke Katalog
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

            <div class="row g-5">

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
                <div class="col-md-7">

                    <span class="category-badge">
                        <i class="bi bi-tag-fill me-2"></i>
                        {{ $product->nama_kategori ?? 'Tanpa Kategori' }}
                    </span>

                    <h1 class="product-name">
                        {{ $product->nama }}
                    </h1>


                    <!-- RATING -->
                    @include('products.reviews.summary', [
                        'product' => $product
                    ])


                    <p class="product-brand">
                        <i class="bi bi-patch-check me-1"></i>
                        Merek: {{ $product->merek ?? '-' }}
                    </p>


                    <!-- HARGA -->
                    <div class="product-price" id="productPrice">
                        Rp{{ number_format($product->harga_dasar, 0, ',', '.') }}
                    </div>


                    <!-- WISHLIST -->
                    @if(auth()->check() && auth()->user()->role === 'customer')

                        <form
                            action="{{ route('customer.wishlist.store', $product->id) }}"
                            method="POST"
                            class="mb-3"
                        >
                            @csrf

                            <button type="submit" class="wishlist-button">
                                <i class="bi bi-heart me-1"></i>
                                Tambahkan ke Wishlist
                            </button>
                        </form>

                    @elseif(!auth()->check())

                        <a href="{{ route('login') }}" class="wishlist-button text-decoration-none d-inline-block mb-3">
                            <i class="bi bi-heart me-1"></i>
                            Login untuk Menambahkan Wishlist
                        </a>

                    @endif


                    <!-- INFORMASI PENJUALAN DAN STOK -->
                    <div class="product-meta">

                        <div class="meta-item">
                            <i class="bi bi-bag-check me-1"></i>
                            Terjual
                            <strong>{{ $product->terjual ?? 0 }} produk</strong>
                        </div>

                        <div class="meta-item">
                            <i class="bi bi-box-seam me-1"></i>
                            Total Stok
                            <strong id="totalStock">{{ $totalStok }} produk</strong>
                        </div>

                    </div>


                    <hr class="section-divider">


                    <!-- DESKRIPSI -->
                    <h5 class="section-title">
                        Deskripsi Produk
                    </h5>

                    <p class="description">
                        {{ $product->deskripsi ?: 'Belum ada deskripsi produk.' }}
                    </p>


                    <hr class="section-divider">


                    <!-- PEMERIKSAAN STOK -->
                    @if($totalStok > 0)

                        <!-- CUSTOMER LOGIN -->
                        @if(auth()->check() && auth()->user()->role === 'customer')

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
                                <div class="mb-4">

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
                                        <i class="bi bi-cart-plus me-2"></i>
                                        Tambah Keranjang
                                    </button>

                                    <button
                                        type="submit"
                                        formaction="{{ route('checkout.buyNow') }}"
                                        class="btn-primary-custom"
                                        id="buyButton"
                                    >
                                        <i class="bi bi-bag-check me-2"></i>
                                        Beli Sekarang
                                    </button>

                                </div>

                            </form>


                        <!-- PENGUNJUNG BELUM LOGIN -->
                        @elseif(!auth()->check())

                            <div class="notice-box notice-warning mb-3">

                                <div class="d-flex align-items-start gap-2">

                                    <i class="bi bi-info-circle fs-5"></i>

                                    <div>
                                        <strong>
                                            Login diperlukan untuk berbelanja
                                        </strong>

                                        <p class="mt-1">
                                            Kamu dapat melihat informasi produk,
                                            tetapi harus login atau membuat akun
                                            terlebih dahulu untuk menggunakan fitur
                                            Tambah ke Keranjang dan Beli Sekarang.
                                        </p>
                                    </div>

                                </div>

                            </div>


                            <div class="d-flex gap-2">

                                <a href="{{ route('login') }}" class="btn-primary-custom text-decoration-none">
                                    <i class="bi bi-box-arrow-in-right me-1"></i>
                                    Login Sekarang
                                </a>

                                <a href="{{ route('register') }}" class="btn-outline-custom text-decoration-none">
                                    <i class="bi bi-person-plus me-1"></i>
                                    Buat Akun
                                </a>

                            </div>


                        <!-- ADMIN LOGIN -->
                        @else

                            <div class="notice-box notice-info">

                                <div class="d-flex align-items-start gap-2">

                                    <i class="bi bi-info-circle fs-5"></i>

                                    <div>
                                        <strong>
                                            Kamu sedang login sebagai Admin
                                        </strong>

                                        <p class="mt-1 mb-3">
                                            Fitur Tambah ke Keranjang dan Beli Sekarang
                                            hanya tersedia untuk customer.
                                        </p>

                                        <a
                                            href="{{ route('admin.dashboard') }}"
                                            class="btn btn-sm btn-outline-primary"
                                        >
                                            <i class="bi bi-speedometer2 me-1"></i>
                                            Panel Admin
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
