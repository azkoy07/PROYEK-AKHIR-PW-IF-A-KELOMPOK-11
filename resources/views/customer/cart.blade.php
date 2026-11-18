
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Keranjang Belanja - SportZone</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css" rel="stylesheet">

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
            max-width: 1200px;
            margin: 0 auto;
            padding: 22px 24px 65px;
        }

        .page-title {
            font-size: 25px;
            font-weight: 800;
            letter-spacing: -.7px;
            margin-bottom: 7px;
            color: #172033;
        }

        .page-subtitle {
            font-size: 12px;
            color: #8993a4;
            margin-bottom: 23px;
        }

        /* KARTU */

        .cart-card,
        .summary-card {
            background: #fff;
            border: 1px solid #e8edf3;
            border-radius: 12px;
            box-shadow: 0 4px 18px rgba(15, 23, 42, .035);
        }

        .cart-card {
            padding: 23px 25px;
        }

        .summary-card {
            padding: 23px;
            position: sticky;
            top: 25px;
        }

        .card-heading {
            font-size: 15px;
            font-weight: 800;
            margin-bottom: 19px;
            color: #172033;
        }

        .item-count {
            color: #2563eb;
            font-weight: 700;
        }

        /* ITEM KERANJANG */

        .cart-item {
            display: grid;
            grid-template-columns: 100px minmax(180px, 1fr) 145px 140px;
            gap: 18px;
            align-items: center;
            padding: 21px 0;
            border-bottom: 1px solid #edf0f5;
        }

        .cart-item:first-of-type {
            padding-top: 5px;
        }

        .cart-item:last-child {
            border-bottom: none;
            padding-bottom: 5px;
        }

        .product-image-box {
            width: 100px;
            height: 100px;
            background: #f7f9fc;
            border: 1px solid #edf0f5;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 9px;
        }

        .product-image {
            width: 100%;
            height: 100%;
            object-fit: contain;
        }

        .product-placeholder {
            font-size: 34px;
            color: #cbd5e1;
        }

        .product-name {
            font-size: 13px;
            font-weight: 700;
            line-height: 1.6;
            color: #172033;
            text-decoration: none;
        }

        .product-name:hover {
            color: #2563eb;
        }

        .product-variant {
            font-size: 11px;
            color: #8993a4;
            margin-top: 7px;
        }

        .product-price {
            font-size: 13px;
            font-weight: 700;
            color: #2563eb;
            margin-top: 9px;
        }

        /* JUMLAH PRODUK */

        .quantity-label {
            display: block;
            font-size: 10px;
            font-weight: 700;
            color: #64748b;
            margin-bottom: 7px;
        }

        .quantity-input {
            width: 105px;
            border: 1px solid #e2e8f0;
            border-radius: 7px 0 0 7px;
            font-size: 12px;
            min-height: 36px;
            box-shadow: none !important;
        }

        .quantity-input:focus {
            border-color: #93b4f8;
        }

        .update-button {
            border: 1px solid #dbeafe;
            background: #eff6ff;
            color: #2563eb;
            border-radius: 0 7px 7px 0;
            padding: 0 11px;
            font-size: 13px;
        }

        .update-button:hover {
            background: #2563eb;
            color: #fff;
        }

        .stock-label {
            display: block;
            color: #94a3b8;
            font-size: 10px;
            margin-top: 7px;
        }

        /* SUBTOTAL DAN HAPUS */

        .subtotal-label {
            font-size: 10px;
            color: #94a3b8;
            margin-bottom: 5px;
        }

        .subtotal-price {
            font-size: 13px;
            font-weight: 800;
            color: #172033;
            margin-bottom: 12px;
        }

        .delete-button {
            background: #fff;
            border: 1px solid #fee2e2;
            color: #dc2626;
            border-radius: 7px;
            padding: 7px 10px;
            font-size: 10px;
            font-weight: 600;
            transition: .2s;
        }

        .delete-button:hover {
            background: #fff1f2;
        }

        .continue-button {
            display: inline-flex;
            align-items: center;
            gap: 7px;
            color: #64748b;
            text-decoration: none;
            font-size: 11px;
            font-weight: 600;
            margin-top: 17px;
        }

        .continue-button:hover {
            color: #2563eb;
        }

        /* RINGKASAN BELANJA */

        .summary-title {
            font-size: 15px;
            font-weight: 800;
            margin-bottom: 22px;
            color: #172033;
        }

        .summary-row {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 10px;
            margin-bottom: 17px;
            font-size: 11px;
        }

        .summary-label {
            color: #8993a4;
        }

        .summary-value {
            color: #344054;
            font-weight: 600;
            text-align: right;
        }

        .summary-total {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 18px 0;
            border-top: 1px solid #edf0f5;
            margin-top: 5px;
            font-size: 13px;
            font-weight: 800;
        }

        .summary-total-price {
            color: #2563eb;
            font-size: 18px;
        }

        .checkout-button {
            display: block;
            width: 100%;
            padding: 13px;
            text-align: center;
            text-decoration: none;
            background: #2563eb;
            color: #fff;
            border: 1px solid #2563eb;
            border-radius: 8px;
            font-size: 11px;
            font-weight: 700;
            transition: .2s;
        }

        .checkout-button:hover {
            background: #1d4ed8;
            color: #fff;
        }

        .summary-note {
            font-size: 10px;
            line-height: 1.7;
            color: #94a3b8;
            margin-top: 13px;
            text-align: center;
        }

        /* KERANJANG KOSONG */

        .empty-card {
            background: #fff;
            border: 1px solid #e8edf3;
            border-radius: 12px;
            padding: 65px 20px;
            text-align: center;
            box-shadow: 0 4px 18px rgba(15, 23, 42, .035);
        }

        .empty-icon {
            width: 85px;
            height: 85px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 22px;
            border-radius: 50%;
            background: #eff6ff;
            color: #2563eb;
            font-size: 37px;
        }

        .empty-title {
            font-size: 17px;
            font-weight: 800;
            margin-bottom: 9px;
        }

        .empty-description {
            font-size: 12px;
            color: #8993a4;
            margin-bottom: 22px;
        }

        .shop-button {
            display: inline-block;
            padding: 11px 20px;
            background: #2563eb;
            color: #fff;
            text-decoration: none;
            border-radius: 8px;
            font-size: 11px;
            font-weight: 700;
        }

        .shop-button:hover {
            background: #1d4ed8;
            color: #fff;
        }

        /* NOTIFIKASI */

        .alert {
            border-radius: 9px;
            font-size: 12px;
        }

        /* FOOTER */

        .footer-store {
            background: #fff;
            border-top: 1px solid #e8edf3;
            padding: 22px;
            color: #94a3b8;
            text-align: center;
            font-size: 10px;
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


    <!-- KONTEN -->
    <main class="main-container">

        <h1 class="page-title">Keranjang Belanja</h1>

        <p class="page-subtitle">
            Periksa kembali produk pilihanmu sebelum melanjutkan checkout.
        </p>


        <!-- NOTIFIKASI -->
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show">
                <i class="bi bi-check-circle me-2"></i>
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger alert-dismissible fade show">
                <i class="bi bi-exclamation-circle me-2"></i>
                {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        @if($errors->any())
            <div class="alert alert-danger">
                @foreach($errors->all() as $error)
                    <div>{{ $error }}</div>
                @endforeach
            </div>
        @endif


        @if($items->isEmpty())

            <!-- KERANJANG KOSONG -->
            <div class="empty-card">

                <div class="empty-icon">
                    <i class="bi bi-cart-x"></i>
                </div>

                <h5 class="empty-title">
                    Keranjang Masih Kosong
                </h5>

                <p class="empty-description">
                    Kamu belum menambahkan produk ke keranjang.
                    Yuk, temukan perlengkapan olahraga favoritmu.
                </p>

                <a href="{{ route('home') }}" class="shop-button">
                    <i class="bi bi-shop me-2"></i>
                    Mulai Belanja
                </a>

            </div>

        @else

            <div class="row g-4">

                <!-- DAFTAR PRODUK -->
                <div class="col-lg-8">

                    <div class="cart-card">

                        <h5 class="card-heading">
                            Produk dalam Keranjang
                            <span class="item-count">
                                ({{ $items->count() }})
                            </span>
                        </h5>


                        @foreach($items as $item)

                            <div class="cart-item">

                                <!-- GAMBAR -->
                                <div class="product-image-box">

                                    @if($item->file_name)

                                        <img
                                            src="{{ asset('storage/' . $item->file_name) }}"
                                            alt="{{ $item->nama }}"
                                            class="product-image"
                                        >

                                    @else

                                        <i class="bi bi-image product-placeholder"></i>

                                    @endif

                                </div>


                                <!-- INFORMASI PRODUK -->
                                <div>

                                    <a
                                        href="{{ route('products.show', $item->product_id) }}"
                                        class="product-name"
                                    >
                                        {{ $item->nama }}
                                    </a>

                                    @if($item->variant_id)

                                        <div class="product-variant">

                                            @if($item->ukuran)
                                                Ukuran: {{ $item->ukuran }}
                                            @endif

                                            @if($item->warna)
                                                @if($item->ukuran) | @endif
                                                Warna: {{ $item->warna }}
                                            @endif

                                        </div>

                                    @else

                                        <div class="product-variant">
                                            Produk tanpa variasi
                                        </div>

                                    @endif

                                    <div class="product-price">
                                        Rp{{ number_format($item->harga_satuan, 0, ',', '.') }}
                                    </div>

                                </div>


                                <!-- UBAH JUMLAH -->
                                <div>

                                    <form
                                        action="{{ route('cart.update', $item->id) }}"
                                        method="POST"
                                    >
                                        @csrf
                                        @method('PATCH')

                                        <label class="quantity-label">
                                            Jumlah
                                        </label>

                                        <div class="input-group input-group-sm">

                                            <input
                                                type="number"
                                                name="qty"
                                                class="form-control quantity-input"
                                                value="{{ $item->qty }}"
                                                min="1"
                                                max="{{ $item->variant_id ? $item->stok_varian : $item->stok_produk }}"
                                                required
                                            >

                                            <button
                                                type="submit"
                                                class="update-button"
                                                title="Perbarui jumlah"
                                            >
                                                <i class="bi bi-arrow-repeat"></i>
                                            </button>

                                        </div>

                                        <small class="stock-label">
                                            Stok tersedia:
                                            {{ $item->variant_id ? $item->stok_varian : $item->stok_produk }}
                                        </small>

                                    </form>

                                </div>


                                <!-- SUBTOTAL DAN HAPUS -->
                                <div class="text-end">

                                    <div class="subtotal-label">
                                        Subtotal
                                    </div>

                                    <div class="subtotal-price">
                                        Rp{{ number_format($item->harga_satuan * $item->qty, 0, ',', '.') }}
                                    </div>

                                    <form
                                        action="{{ route('cart.destroy', $item->id) }}"
                                        method="POST"
                                        onsubmit="return confirm('Yakin ingin menghapus produk ini dari keranjang?')"
                                    >
                                        @csrf
                                        @method('DELETE')

                                        <button type="submit" class="delete-button">
                                            <i class="bi bi-trash me-1"></i>
                                            Hapus
                                        </button>

                                    </form>

                                </div>

                            </div>

                        @endforeach

                    </div>

                </div>


                <!-- RINGKASAN BELANJA -->
                <div class="col-lg-4">

                    <div class="summary-card">

                        <h5 class="summary-title">
                            Ringkasan Belanja
                        </h5>


                        <div class="summary-row">

                            <span class="summary-label">
                                Total Produk
                            </span>

                            <span class="summary-value">
                                {{ $items->sum('qty') }} item
                            </span>

                        </div>


                        <div class="summary-row">

                            <span class="summary-label">
                                Subtotal
                            </span>

                            <span class="summary-value">
                                Rp{{ number_format($total, 0, ',', '.') }}
                            </span>

                        </div>


                        <div class="summary-row">

                            <span class="summary-label">
                                Pengiriman
                            </span>

                            <span class="summary-value">
                                Dihitung saat checkout
                            </span>

                        </div>


                        <div class="summary-total">

                            <span>Total</span>

                            <span class="summary-total-price">
                                Rp{{ number_format($total, 0, ',', '.') }}
                            </span>

                        </div>


                        <a
                            href="{{ route('checkout.index') }}"
                            class="checkout-button"
                        >
                            <i class="bi bi-credit-card me-2"></i>
                            Lanjut ke Checkout
                        </a>


                        <p class="summary-note">
                            Biaya pengiriman dan diskon akan dihitung
                            pada halaman checkout.
                        </p>

                    </div>

                </div>

            </div>

        @endif

    </main>


    <!-- FOOTER -->
    <footer class="footer-store">
        &copy; {{ date('Y') }} SportZone. Toko Perlengkapan Olahraga.
    </footer>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
