
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Checkout - SportZone</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap"
          rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css"
          rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css"
          rel="stylesheet">

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', sans-serif;
            background: #f5f7fb;
            color: #202938;
            font-size: 14px;
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
            letter-spacing: -0.8px;
        }

        .brand span {
            color: #2563eb;
        }

        .back-link {
            color: #64748b;
            text-decoration: none;
            font-weight: 600;
            font-size: 13px;
        }

        .back-link:hover {
            color: #2563eb;
        }

        .page-container {
            max-width: 1180px;
            margin: 0 auto;
            padding: 38px 20px 65px;
        }

        .page-heading {
            margin-bottom: 28px;
        }

        .page-heading h1 {
            font-size: 27px;
            font-weight: 800;
            letter-spacing: -0.8px;
            margin-bottom: 7px;
            color: #172033;
        }

        .page-heading p {
            color: #8792a2;
            margin: 0;
            font-size: 13px;
        }

        .checkout-card {
            background: #fff;
            border: 1px solid #e8edf3;
            border-radius: 13px;
            margin-bottom: 20px;
            overflow: hidden;
        }

        .card-heading {
            padding: 21px 24px;
            border-bottom: 1px solid #edf0f5;
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .heading-icon {
            width: 36px;
            height: 36px;
            border-radius: 9px;
            background: #eff6ff;
            color: #2563eb;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 17px;
        }

        .card-heading h5 {
            font-size: 15px;
            font-weight: 700;
            margin: 0;
            color: #202938;
        }

        .card-content {
            padding: 23px 24px;
        }

        .address-option {
            border: 1px solid #e5eaf1;
            border-radius: 10px;
            padding: 17px;
            margin-bottom: 12px;
            transition: 0.2s;
        }

        .address-option:hover {
            border-color: #93b4f8;
            background: #fafcff;
        }

        .address-option:has(input:checked) {
            border-color: #2563eb;
            background: #f8fbff;
        }

        .address-option .form-check {
            margin: 0;
            padding-left: 25px;
        }

        .address-option .form-check-input {
            margin-left: -25px;
            margin-top: 4px;
            cursor: pointer;
        }

        .address-option .form-check-input:checked {
            background-color: #2563eb;
            border-color: #2563eb;
        }

        .address-name {
            font-size: 14px;
            font-weight: 700;
            color: #202938;
        }

        .address-detail {
            color: #7b8797;
            font-size: 12px;
            line-height: 1.8;
            margin: 8px 0 0;
        }

        .main-badge {
            background: #eff6ff;
            color: #2563eb;
            font-size: 10px;
            font-weight: 700;
            padding: 5px 9px;
            border-radius: 5px;
            margin-left: 7px;
        }

        .btn-primary {
            background: #2563eb;
            border-color: #2563eb;
            font-weight: 600;
        }

        .btn-primary:hover {
            background: #1d4ed8;
            border-color: #1d4ed8;
        }

        .btn-outline-primary {
            color: #2563eb;
            border-color: #c9d9f8;
            font-weight: 600;
        }

        .btn-outline-primary:hover {
            background: #eff6ff;
            border-color: #2563eb;
            color: #2563eb;
        }

        .payment-option {
            display: flex;
            align-items: center;
            gap: 13px;
            padding: 15px;
            border: 1px solid #e5eaf1;
            border-radius: 9px;
            margin-bottom: 11px;
            cursor: pointer;
            transition: 0.2s;
        }

        .payment-option:hover {
            border-color: #93b4f8;
            background: #fafcff;
        }

        .payment-option:has(input:checked) {
            border-color: #2563eb;
            background: #f8fbff;
        }

        .payment-option input {
            margin: 0;
            flex-shrink: 0;
        }

        .payment-option input:checked {
            background-color: #2563eb;
            border-color: #2563eb;
        }

        .payment-icon {
            width: 38px;
            height: 38px;
            border-radius: 9px;
            background: #f1f5f9;
            color: #475569;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 18px;
        }

        .payment-name {
            font-size: 13px;
            font-weight: 700;
            color: #293548;
            display: block;
        }

        .payment-description {
            font-size: 11px;
            color: #94a0af;
            display: block;
            margin-top: 3px;
        }

        .voucher-box {
            border: 1px solid #e5eaf1;
            border-radius: 10px;
            padding: 17px;
            background: #fbfcfe;
            margin-bottom: 22px;
        }

        .voucher-title {
            font-size: 13px;
            font-weight: 700;
            margin-bottom: 13px;
        }

        .voucher-success {
            background: #f0fdf4;
            border: 1px solid #bbf7d0;
            border-radius: 8px;
            padding: 12px;
            color: #15803d;
            font-size: 12px;
        }

        .voucher-success strong {
            font-size: 13px;
        }

        .product-item {
            display: flex;
            gap: 13px;
            padding: 13px 0;
            border-bottom: 1px solid #edf0f5;
        }

        .product-item:first-of-type {
            padding-top: 0;
        }

        .product-item:last-child {
            border-bottom: none;
        }

        .product-image {
            width: 76px;
            height: 76px;
            flex-shrink: 0;
            border-radius: 9px;
            background: #f4f6f9;
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
        }

        .product-image img {
            width: 100%;
            height: 100%;
            object-fit: contain;
            padding: 5px;
        }

        .product-name {
            font-size: 12px;
            font-weight: 700;
            color: #293548;
            margin-bottom: 5px;
            line-height: 1.5;
        }

        .product-variant {
            font-size: 11px;
            color: #8994a4;
            margin-bottom: 5px;
        }

        .product-quantity {
            font-size: 11px;
            color: #7b8797;
        }

        .product-subtotal {
            font-size: 12px;
            font-weight: 700;
            color: #202938;
            margin-top: 5px;
        }

        .summary-card {
            position: sticky;
            top: 25px;
        }

        .summary-row {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 12px;
            margin-bottom: 14px;
            font-size: 12px;
            color: #7b8797;
        }

        .summary-row strong {
            color: #293548;
            font-size: 12px;
            font-weight: 700;
        }

        .summary-row.discount strong {
            color: #16a34a;
        }

        .summary-total {
            border-top: 1px dashed #dce2eb;
            padding-top: 17px;
            margin-top: 18px;
        }

        .summary-total span {
            font-size: 13px;
            font-weight: 700;
            color: #202938;
        }

        .summary-total h4 {
            font-size: 19px;
            color: #2563eb;
            font-weight: 800;
            margin: 8px 0 0;
            letter-spacing: -0.5px;
        }

        .checkout-button {
            width: 100%;
            padding: 13px;
            border-radius: 8px;
            font-size: 13px;
            margin-top: 18px;
        }

        .secure-note {
            text-align: center;
            font-size: 11px;
            color: #94a0af;
            margin-top: 13px;
        }

        .empty-state {
            background: #fff;
            border: 1px solid #e8edf3;
            border-radius: 13px;
            padding: 65px 20px;
            text-align: center;
        }

        .empty-icon {
            width: 70px;
            height: 70px;
            border-radius: 50%;
            background: #eff6ff;
            color: #2563eb;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 28px;
            margin: 0 auto 18px;
        }

        .empty-state h5 {
            font-weight: 700;
            font-size: 17px;
        }

        .empty-state p {
            color: #8792a2;
            font-size: 13px;
            margin: 8px 0 20px;
        }

        .footer {
            border-top: 1px solid #e8edf3;
            padding: 20px;
            text-align: center;
            color: #9aa4b2;
            font-size: 11px;
            background: #fff;
        }

        /* =====================================
           POP-UP CHECKOUT BERHASIL
        ===================================== */

        /* Background popup */
    .success-overlay {
        position: fixed;
        inset: 0;
        z-index: 9999;
        background: rgba(15, 23, 42, 0.55);

        display: flex;
        align-items: center;
        justify-content: center;

        padding: 20px;
    }

    /* Kotak popup */
    .success-modal {
        width: 100%;
        max-width: 420px;
        background: #fff;
        border-radius: 14px;
        padding: 28px 30px;

        box-shadow: 0 15px 45px rgba(0, 0, 0, 0.15);

        animation: successAppear 0.3s ease;
    }

    /* Ikon berhasil */
    .success-icon {
        width: 62px;
        height: 62px;
        background: #ecfdf3;
        color: #16a34a;
        border-radius: 50%;

        display: flex;
        align-items: center;
        justify-content: center;

        font-size: 30px;
        margin: 0 auto 17px;
    }

    /* Judul */
    .success-title {
        font-size: 20px;
        font-weight: 800;
        color: #172033;
        margin-bottom: 8px;
    }

    /* Deskripsi */
    .success-description {
        color: #8792a2;
        font-size: 12px;
        line-height: 1.7;
        margin-bottom: 0;
    }

    /* Informasi pesanan */
    .success-order-info {
        background: #f8fafc;
        border: 1px solid #e8edf3;
        border-radius: 9px;
        padding: 15px;
        margin-top: 20px;
    }

    .success-info-row {
        display: flex;
        justify-content: space-between;
        align-items: center;
        gap: 12px;
        margin-bottom: 12px;
        font-size: 11px;
    }

    .success-info-row:last-child {
        margin-bottom: 0;
    }

    .success-info-row span {
        color: #8792a2;
    }

    .success-info-row strong {
        color: #293548;
        text-align: right;
        font-size: 11px;
    }

    .success-total {
        border-top: 1px dashed #dce2eb;
        padding-top: 13px;
        margin-top: 13px;
    }

    .success-total strong {
        color: #2563eb;
        font-size: 16px;
    }

    /* Tombol */
    .success-actions {
        display: flex;
        flex-direction: column;
        gap: 9px;
        margin-top: 20px;
    }

    .success-actions .btn {
        padding: 11px;
        border-radius: 7px;
        font-size: 12px;
        font-weight: 600;
    }

    /* Animasi */
    @keyframes successAppear {
        from {
            opacity: 0;
            transform: translateY(12px) scale(0.97);
        }

        to {
            opacity: 1;
            transform: translateY(0) scale(1);
        }
    }
    </style>
</head>

<body>

<nav class="navbar">
    <div class="container" style="max-width: 1180px;">
        <div class="d-flex align-items-center justify-content-between w-100">

            <a href="{{ route('home') }}" class="brand">
                <i class="bi bi-lightning-charge-fill text-primary"></i>
                Sport<span>Zone</span>
            </a>

            <a href="{{ $direct ? route('home') : route('cart.index') }}"
               class="back-link">
                <i class="bi bi-arrow-left me-1"></i>
                {{ $direct ? 'Kembali ke Toko' : 'Kembali ke Keranjang' }}
            </a>

        </div>
    </div>
</nav>

{{-- =====================================
     TAMPILAN POP-UP SETELAH CHECKOUT
===================================== --}}

@if(isset($checkoutSuccess) && $checkoutSuccess)

    <div class="success-overlay">

        <div class="success-modal">

            <div class="text-center">

                <div class="success-icon">
                    <i class="bi bi-check-lg"></i>
                </div>

                <h3 class="success-title">
                    Pesanan Berhasil Dibuat!
                </h3>

                <p class="success-description">
                    Terima kasih telah berbelanja di SportZone.
                    Pesanan kamu berhasil dibuat dan sedang menunggu pembayaran.
                </p>

            </div>

            <div class="success-order-info">

                <div class="success-info-row">

                    <span>Kode Pesanan</span>

                    <strong>
                        {{ $order->kode_order }}
                    </strong>

                </div>

                <div class="success-info-row">

                    <span>Status Pesanan</span>

                    <strong class="text-warning">
                        {{ ucwords(str_replace('_', ' ', $order->status)) }}
                    </strong>

                </div>

                <div class="success-info-row">

                    <span>Metode Pembayaran</span>

                    <strong>
                        {{ strtoupper($order->metode_bayar) }}
                    </strong>

                </div>

                <div class="success-info-row success-total">

                    <span>Total Pembayaran</span>

                    <strong>
                        Rp{{ number_format($order->total, 0, ',', '.') }}
                    </strong>

                </div>

            </div>

            <div class="success-actions">

                <a href="{{ route('customer.orders.show', $order->id) }}"
                   class="btn btn-primary">

                    <i class="bi bi-receipt me-2"></i>
                    Lihat Detail Pesanan

                </a>

                <a href="{{ route('home') }}"
                   class="btn btn-outline-primary">

                    <i class="bi bi-shop me-2"></i>
                    Kembali ke Toko

                </a>

            </div>

            <p class="text-center text-secondary mt-3 mb-0"
               style="font-size: 11px;">

                Terima kasih telah memilih SportZone.

            </p>

        </div>

    </div>

@else

{{-- =====================================
     HALAMAN CHECKOUT NORMAL
===================================== --}}

<div class="page-container">

    <div class="page-heading">
        <h1>Checkout</h1>
        <p>Periksa pesanan dan lengkapi informasi pengiriman sebelum membuat pesanan.</p>
    </div>

    @if(session('error'))
        <div class="alert alert-danger border-0 shadow-sm">
            <i class="bi bi-exclamation-circle me-2"></i>
            {{ session('error') }}
        </div>
    @endif

    @if(session('success'))
        <div class="alert alert-success border-0 shadow-sm">
            <i class="bi bi-check-circle me-2"></i>
            {{ session('success') }}
        </div>
    @endif

    @if($errors->any())
        <div class="alert alert-danger border-0 shadow-sm">
            <strong>Periksa kembali data yang dimasukkan.</strong>
            <ul class="mb-0 mt-2">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @if($addresses->isEmpty())

        <div class="empty-state">

            <div class="empty-icon">
                <i class="bi bi-geo-alt"></i>
            </div>

            <h5>Alamat Pengiriman Belum Tersedia</h5>

            <p>
                Silakan tambahkan alamat pengiriman terlebih dahulu
                sebelum melanjutkan proses checkout.
            </p>

            <a href="{{ route('customer.addresses.index') }}"
               class="btn btn-primary px-4">
                <i class="bi bi-plus-lg me-1"></i>
                Tambah Alamat
            </a>

        </div>

    @else

        {{-- FORM CHECKOUT UTAMA --}}
        <form id="checkoutForm"
              action="{{ route('checkout.store') }}"
              method="POST">
            @csrf
        </form>

        <div class="row g-4">

            {{-- BAGIAN KIRI --}}
            <div class="col-lg-7">

                {{-- ALAMAT PENGIRIMAN --}}
                <div class="checkout-card">

                    <div class="card-heading">

                        <div class="heading-icon">
                            <i class="bi bi-geo-alt"></i>
                        </div>

                        <h5>Alamat Pengiriman</h5>

                    </div>

                    <div class="card-content">

                        <p class="text-secondary small mb-3">
                            Pilih alamat yang akan digunakan untuk pengiriman pesanan.
                        </p>

                        @foreach($addresses as $address)

                            <div class="address-option">

                                <div class="form-check">

                                    <input
                                        class="form-check-input"
                                        type="radio"
                                        name="address_id"
                                        id="address{{ $address->id }}"
                                        value="{{ $address->id }}"
                                        form="checkoutForm"
                                        {{ old('address_id', $addresses->firstWhere('is_utama', 1)->id ?? $addresses->first()->id) == $address->id ? 'checked' : '' }}
                                        required
                                    >

                                    <label
                                        class="form-check-label w-100"
                                        for="address{{ $address->id }}"
                                    >

                                        <div class="d-flex align-items-center flex-wrap">

                                            <span class="address-name">
                                                {{ $address->penerima }}
                                            </span>

                                            @if($address->is_utama)
                                                <span class="main-badge">
                                                    <i class="bi bi-star-fill me-1"></i>
                                                    Alamat Utama
                                                </span>
                                            @endif

                                        </div>

                                        <p class="address-detail">
                                            <i class="bi bi-telephone me-1"></i>
                                            {{ $address->no_hp }}

                                            <br>

                                            <i class="bi bi-geo-alt me-1"></i>
                                            {{ $address->alamat_lengkap }}
                                            <br>

                                            {{ $address->kota }},
                                            {{ $address->kode_pos }}
                                        </p>

                                    </label>

                                </div>

                            </div>

                        @endforeach

                        <a href="{{ route('customer.addresses.index') }}"
                           class="btn btn-outline-primary btn-sm mt-2">
                            <i class="bi bi-pencil-square me-1"></i>
                            Kelola Alamat
                        </a>

                    </div>

                </div>

                {{-- METODE PEMBAYARAN --}}
                <div class="checkout-card">

                    <div class="card-heading">

                        <div class="heading-icon">
                            <i class="bi bi-credit-card"></i>
                        </div>

                        <h5>Metode Pembayaran</h5>

                    </div>

                    <div class="card-content">

                        <p class="text-secondary small mb-3">
                            Pilih metode pembayaran yang ingin digunakan.
                        </p>

                        <label class="payment-option" for="transfer">

                            <input
                                class="form-check-input"
                                type="radio"
                                name="metode_bayar"
                                id="transfer"
                                value="transfer"
                                form="checkoutForm"
                                {{ old('metode_bayar', 'transfer') == 'transfer' ? 'checked' : '' }}
                                required
                            >

                            <div class="payment-icon">
                                <i class="bi bi-bank"></i>
                            </div>

                            <div>
                                <span class="payment-name">Transfer Bank</span>
                                <span class="payment-description">
                                    Pembayaran melalui transfer rekening bank.
                                </span>
                            </div>

                        </label>

                        <label class="payment-option mb-0" for="ewallet">

                            <input
                                class="form-check-input"
                                type="radio"
                                name="metode_bayar"
                                id="ewallet"
                                value="ewallet"
                                form="checkoutForm"
                                {{ old('metode_bayar') == 'ewallet' ? 'checked' : '' }}
                            >

                            <div class="payment-icon">
                                <i class="bi bi-wallet2"></i>
                            </div>

                            <div>
                                <span class="payment-name">E-Wallet</span>
                                <span class="payment-description">
                                    Pembayaran menggunakan dompet digital.
                                </span>
                            </div>

                        </label>

                    </div>

                </div>

            </div>

            {{-- BAGIAN KANAN --}}
            <div class="col-lg-5">

                <div class="checkout-card summary-card">

                    <div class="card-heading">

                        <div class="heading-icon">
                            <i class="bi bi-receipt"></i>
                        </div>

                        <h5>Ringkasan Pesanan</h5>

                    </div>

                    <div class="card-content">

                        {{-- VOUCHER --}}
                        <div class="voucher-box">

                            <div class="voucher-title">
                                <i class="bi bi-ticket-perforated text-primary me-1"></i>
                                Gunakan Voucher
                            </div>

                            @if($voucher)

                                <div class="voucher-success mb-3">

                                    <strong>
                                        <i class="bi bi-check-circle-fill me-1"></i>
                                        {{ $voucher->kode }}
                                    </strong>

                                    <div class="mt-1">
                                        Voucher berhasil digunakan.
                                    </div>

                                    <div class="mt-2">
                                        Potongan:
                                        <strong>
                                            Rp{{ number_format($diskon, 0, ',', '.') }}
                                        </strong>
                                    </div>

                                </div>

                                <form action="{{ route('checkout.voucher.remove') }}"
                                      method="POST">

                                    @csrf
                                    @method('DELETE')

                                    <button type="submit"
                                            class="btn btn-outline-danger btn-sm w-100">
                                        <i class="bi bi-x-circle me-1"></i>
                                        Lepaskan Voucher
                                    </button>

                                </form>

                            @else

                                <form action="{{ route('checkout.voucher.apply') }}"
                                      method="POST">

                                    @csrf

                                    <div class="input-group">

                                        <input
                                            type="text"
                                            name="kode"
                                            class="form-control"
                                            placeholder="Masukkan kode voucher"
                                            maxlength="30"
                                            required
                                            style="font-size: 12px;"
                                        >

                                        <button type="submit"
                                                class="btn btn-primary btn-sm px-3">
                                            Gunakan
                                        </button>

                                    </div>

                                </form>

                            @endif

                        </div>

                        {{-- DAFTAR PRODUK --}}
                        <div class="mb-3">

                            <h6 class="fw-bold mb-3" style="font-size: 13px;">
                                Produk Dipesan
                                <span class="text-secondary fw-normal">
                                    ({{ $items->count() }} produk)
                                </span>
                            </h6>

                            @foreach($items as $item)

                                <div class="product-item">

                                    <div class="product-image">

                                        @if($item->file_name)

                                            <img
                                                src="{{ asset('storage/' . $item->file_name) }}"
                                                alt="{{ $item->nama }}"
                                            >

                                        @else

                                            <i class="bi bi-image fs-3 text-secondary"></i>

                                        @endif

                                    </div>

                                    <div class="flex-grow-1">

                                        <div class="product-name">
                                            {{ $item->nama }}
                                        </div>

                                        @if($item->ukuran || $item->warna)

                                            <div class="product-variant">
                                                {{ $item->ukuran }}
                                                {{ $item->warna }}
                                            </div>

                                        @endif

                                        <div class="product-quantity">
                                            {{ $item->qty }} x
                                            Rp{{ number_format($item->harga_satuan, 0, ',', '.') }}
                                        </div>

                                        <div class="product-subtotal">
                                            Rp{{ number_format($item->harga_satuan * $item->qty, 0, ',', '.') }}
                                        </div>

                                    </div>

                                </div>

                            @endforeach

                        </div>

                        {{-- PERHITUNGAN --}}
                        <div class="border-top pt-3">

                            <div class="summary-row">

                                <span>Subtotal Produk</span>

                                <strong>
                                    Rp{{ number_format($total, 0, ',', '.') }}
                                </strong>

                            </div>

                            <div class="summary-row discount">

                                <span>Diskon Voucher</span>

                                <strong>
                                    - Rp{{ number_format($diskon, 0, ',', '.') }}
                                </strong>

                            </div>

                            <div class="summary-row">

                                <span>Ongkos Kirim</span>

                                <strong>Rp0</strong>

                            </div>

                        </div>

                        {{-- TOTAL --}}
                        <div class="summary-total">

                            <span>Total Pembayaran</span>

                            <h4>
                                Rp{{ number_format($totalBayar, 0, ',', '.') }}
                            </h4>

                        </div>

                        {{-- TOMBOL CHECKOUT --}}
                        <button
                            type="submit"
                            form="checkoutForm"
                            class="btn btn-primary checkout-button"
                        >
                            <i class="bi bi-bag-check me-2"></i>
                            Buat Pesanan
                        </button>

                        <div class="secure-note">
                            <i class="bi bi-shield-check me-1"></i>
                            Pastikan alamat dan pesanan sudah benar.
                        </div>

                    </div>

                </div>

            </div>

        </div>

    @endif

</div>

@endif

<footer class="footer">
    © {{ date('Y') }} SportZone. Semua Hak Dilindungi.
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
