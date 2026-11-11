
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Detail Pesanan - SportZone</title>

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

        .page-container {
            max-width: 1180px;
            margin: auto;
            padding: 38px 20px 65px;
        }

        .page-heading {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 27px;
        }

        .page-heading h1 {
            font-size: 26px;
            font-weight: 800;
            letter-spacing: -0.7px;
            color: #172033;
            margin-bottom: 7px;
        }

        .page-heading p {
            color: #8792a2;
            font-size: 13px;
            margin: 0;
        }

        .section-card {
            background: #fff;
            border: 1px solid #e8edf3;
            border-radius: 12px;
            margin-bottom: 20px;
            overflow: hidden;
        }

        .section-heading {
            padding: 19px 23px;
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
            flex-shrink: 0;
        }

        .section-heading h5 {
            font-size: 14px;
            font-weight: 700;
            margin: 0;
            color: #202938;
        }

        .section-content {
            padding: 23px;
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

        .btn-outline-secondary {
            border-color: #dce2eb;
            color: #64748b;
            font-weight: 600;
        }

        .info-grid {
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 20px;
        }

        .info-item label {
            display: block;
            font-size: 11px;
            color: #94a0af;
            margin-bottom: 7px;
            font-weight: 600;
        }

        .info-item strong {
            display: block;
            font-size: 13px;
            color: #293548;
            font-weight: 700;
        }

        .order-code {
            color: #2563eb !important;
        }

        .status-badge {
            display: inline-block;
            padding: 6px 10px;
            border-radius: 6px;
            font-size: 10px;
            font-weight: 700;
        }

        .status-warning {
            background: #fff7ed;
            color: #c2410c;
        }

        .status-info {
            background: #eff6ff;
            color: #2563eb;
        }

        .status-primary {
            background: #eef2ff;
            color: #4338ca;
        }

        .status-success {
            background: #f0fdf4;
            color: #15803d;
        }

        .status-danger {
            background: #fef2f2;
            color: #dc2626;
        }

        .status-secondary {
            background: #f1f5f9;
            color: #64748b;
        }

        /* TIMELINE */

        .timeline {
            position: relative;
            padding-left: 12px;
        }

        .timeline-item {
            position: relative;
            padding: 0 0 26px 30px;
            border-left: 2px solid #e2e8f0;
            margin-left: 7px;
        }

        .timeline-item:last-child {
            border-left-color: transparent;
            padding-bottom: 0;
        }

        .timeline-dot {
            position: absolute;
            left: -9px;
            top: 0;
            width: 16px;
            height: 16px;
            border-radius: 50%;
            background: #2563eb;
            border: 3px solid #dbeafe;
        }

        .timeline-item:last-child .timeline-dot {
            background: #16a34a;
            border-color: #dcfce7;
        }

        .timeline-item h6 {
            font-size: 13px;
            font-weight: 700;
            color: #293548;
            margin-bottom: 6px;
        }

        .timeline-item small {
            color: #94a0af;
            font-size: 11px;
        }

        /* PRODUCT TABLE */

        .table {
            margin: 0;
        }

        .table thead th {
            background: #f8fafc;
            color: #64748b;
            font-size: 11px;
            font-weight: 700;
            padding: 14px 16px;
            border-bottom: 1px solid #e8edf3;
            white-space: nowrap;
        }

        .table tbody td {
            padding: 15px 16px;
            font-size: 12px;
            color: #475569;
            border-color: #edf0f5;
            vertical-align: middle;
        }

        .product-name {
            font-weight: 700;
            color: #293548;
        }

        .price-text {
            font-weight: 600;
            color: #293548;
        }

        .total-box {
            max-width: 350px;
            margin-left: auto;
            padding-top: 20px;
        }

        .total-row {
            display: flex;
            justify-content: space-between;
            gap: 15px;
            margin-bottom: 13px;
            font-size: 12px;
            color: #7b8797;
        }

        .total-row strong {
            color: #293548;
            font-weight: 700;
        }

        .grand-total {
            border-top: 1px dashed #dce2eb;
            padding-top: 16px;
            margin-top: 16px;
        }

        .grand-total span {
            font-size: 13px;
            font-weight: 700;
            color: #202938;
        }

        .grand-total h4 {
            font-size: 20px;
            font-weight: 800;
            color: #2563eb;
            margin: 8px 0 0;
        }

        /* PAYMENT */

        .payment-image {
            display: block;
            max-width: 420px;
            max-height: 420px;
            object-fit: contain;
            border: 1px solid #e8edf3;
            border-radius: 10px;
            padding: 8px;
            background: #f8fafc;
        }

        .upload-box {
            border: 1px dashed #b9c9e2;
            border-radius: 10px;
            padding: 23px;
            background: #f8fbff;
        }

        .upload-icon {
            width: 48px;
            height: 48px;
            border-radius: 12px;
            background: #eff6ff;
            color: #2563eb;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 21px;
            margin-bottom: 13px;
        }

        .form-label {
            font-size: 12px;
            font-weight: 600;
            color: #475569;
        }

        .form-control,
        .form-select {
            font-size: 12px;
            border-color: #dce2eb;
            padding: 10px 12px;
        }

        .form-control:focus,
        .form-select:focus {
            border-color: #93b4f8;
            box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.09);
        }

        /* INFORMATION */

        .notice {
            border: 1px solid #dbeafe;
            background: #eff6ff;
            color: #1e40af;
            border-radius: 10px;
            padding: 17px 19px;
            font-size: 12px;
            line-height: 1.7;
            margin-bottom: 20px;
        }

        .notice-success {
            border-color: #bbf7d0;
            background: #f0fdf4;
            color: #166534;
        }

        .notice-danger {
            border-color: #fecaca;
            background: #fef2f2;
            color: #b91c1c;
        }

        .shipping-info {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
        }

        .shipping-item label {
            display: block;
            font-size: 11px;
            color: #94a0af;
            margin-bottom: 7px;
        }

        .shipping-item strong {
            font-size: 13px;
            color: #293548;
        }

        /* REVIEW */

        .review-box {
            border: 1px solid #e8edf3;
            border-radius: 10px;
            padding: 18px;
            margin-bottom: 14px;
        }

        .review-box:last-child {
            margin-bottom: 0;
        }

        .review-box h6 {
            font-size: 13px;
            font-weight: 700;
            margin-bottom: 15px;
        }

        .review-link {
            font-size: 11px;
            color: #2563eb;
            text-decoration: none;
            font-weight: 600;
        }

        .review-link:hover {
            text-decoration: underline;
        }

        .review-box .form-control,
        .review-box .form-select {
            max-width: 100%;
        }

        .footer {
            background: #fff;
            border-top: 1px solid #e8edf3;
            padding: 20px;
            text-align: center;
            color: #9aa4b2;
            font-size: 11px;
        }
    </style>
</head>

<body>

<nav class="navbar bg-white border-bottom">
    <div class="container" style="max-width: 1180px;">

        <div class="d-flex justify-content-between align-items-center w-100">

            <a href="{{ route('home') }}" class="brand">
                <i class="bi bi-lightning-charge-fill text-primary"></i>
                Sport<span>Zone</span>
            </a>

            <a href="{{ route('customer.orders.index') }}"
               class="btn btn-outline-secondary btn-sm px-3">
                <i class="bi bi-arrow-left me-1"></i>
                Kembali ke Pesanan
            </a>

        </div>

    </div>
</nav>

<div class="page-container">

    {{-- HEADER --}}

    <div class="page-heading">

        <div>
            <h1>Detail Pesanan</h1>
            <p>Informasi lengkap dan perkembangan pesanan Anda.</p>
        </div>

    </div>

    {{-- NOTIFIKASI --}}

    @if(session('success'))
        <div class="alert alert-success border-0 shadow-sm">
            <i class="bi bi-check-circle me-2"></i>
            {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger border-0 shadow-sm">
            <i class="bi bi-exclamation-circle me-2"></i>
            {{ session('error') }}
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

    {{-- INFORMASI PESANAN --}}

    <div class="section-card">

        <div class="section-heading">

            <div class="heading-icon">
                <i class="bi bi-receipt"></i>
            </div>

            <h5>Informasi Pesanan</h5>

        </div>

        <div class="section-content">

            <div class="info-grid">

                <div class="info-item">
                    <label>Kode Pesanan</label>
                    <strong class="order-code">
                        {{ $order->kode_order }}
                    </strong>
                </div>

                <div class="info-item">
                    <label>Tanggal Pesanan</label>
                    <strong>
                        {{ \Carbon\Carbon::parse($order->created_at)->format('d M Y, H:i') }}
                    </strong>
                </div>

                <div class="info-item">
                    
                    <label>Metode Pembayaran</label>

                    <strong>
                        @if($order->metode_bayar == 'transfer')

                            <i class="bi bi-bank me-1 text-primary"></i>
                            Transfer Bank

                        @elseif($order->metode_bayar == 'ewallet')

                            <i class="bi bi-wallet2 me-1 text-primary"></i>
                            E-Wallet

                        @elseif($order->metode_bayar == 'cod')

                            <i class="bi bi-clock-history me-1 text-secondary"></i>
                            COD (Pesanan Lama)

                        @else

                            {{ strtoupper($order->metode_bayar) }}

                        @endif
                    </strong>

                </div>

                <div class="info-item">
                    <label>Status Pesanan</label>

                    <strong>

                        @if($order->status == 'menunggu_bayar')
                            <span class="status-badge status-warning">
                                <i class="bi bi-clock me-1"></i>
                                Menunggu Pembayaran
                            </span>

                        @elseif($order->status == 'dikemas')
                            <span class="status-badge status-info">
                                <i class="bi bi-box-seam me-1"></i>
                                Dikemas
                            </span>

                        @elseif($order->status == 'dikirim')
                            <span class="status-badge status-primary">
                                <i class="bi bi-truck me-1"></i>
                                Dikirim
                            </span>

                        @elseif($order->status == 'selesai')
                            <span class="status-badge status-success">
                                <i class="bi bi-check-circle me-1"></i>
                                Selesai
                            </span>

                        @elseif($order->status == 'ditolak')
                            <span class="status-badge status-danger">
                                <i class="bi bi-x-circle me-1"></i>
                                Ditolak
                            </span>

                        @else
                            <span class="status-badge status-secondary">
                                {{ $order->status }}
                            </span>
                        @endif

                    </strong>
                </div>

            </div>

        </div>

    </div>

    {{-- RIWAYAT STATUS --}}

    <div class="section-card">

        <div class="section-heading">

            <div class="heading-icon">
                <i class="bi bi-clock-history"></i>
            </div>

            <h5>Riwayat Status Pesanan</h5>

        </div>

        <div class="section-content">

            @if($riwayatStatus->count() > 0)

                <div class="timeline">

                    @foreach($riwayatStatus as $riwayat)

                        <div class="timeline-item">

                            <div class="timeline-dot"></div>

                            <h6>

                                @if($riwayat->status == 'menunggu_bayar')
                                    Menunggu Pembayaran

                                @elseif($riwayat->status == 'dikemas')
                                    Pesanan Dikemas

                                @elseif($riwayat->status == 'dikirim')
                                    Pesanan Dikirim

                                @elseif($riwayat->status == 'selesai')
                                    Pesanan Selesai

                                @elseif($riwayat->status == 'ditolak')
                                    Pesanan Ditolak

                                @else
                                    {{ ucfirst(str_replace('_', ' ', $riwayat->status)) }}
                                @endif

                            </h6>

                            <small>
                                <i class="bi bi-calendar3 me-1"></i>
                                {{ \Carbon\Carbon::parse($riwayat->created_at)->format('d M Y, H:i') }}
                            </small>

                        </div>

                    @endforeach

                </div>

            @else

                <p class="text-secondary small mb-0">
                    Belum ada riwayat perubahan status pesanan.
                </p>

            @endif

        </div>

    </div>

    {{-- DAFTAR PRODUK --}}

    <div class="section-card">

        <div class="section-heading">

            <div class="heading-icon">
                <i class="bi bi-bag"></i>
            </div>

            <h5>Produk yang Dipesan</h5>

        </div>

        <div class="section-content">

            <div class="table-responsive">

                <table class="table align-middle">

                    <thead>
                        <tr>
                            <th>Nama Produk</th>
                            <th>Variasi</th>
                            <th>Harga Satuan</th>
                            <th>Jumlah</th>
                            <th>Subtotal</th>
                        </tr>
                    </thead>

                    <tbody>

                        @foreach($items as $item)

                            <tr>

                                <td>
                                    <span class="product-name">
                                        {{ $item->nama_produk }}
                                    </span>
                                </td>

                                <td>
                                    {{ $item->varian ?? '-' }}
                                </td>

                                <td>
                                    <span class="price-text">
                                        Rp{{ number_format($item->harga_satuan, 0, ',', '.') }}
                                    </span>
                                </td>

                                <td>
                                    {{ $item->qty }}
                                </td>

                                <td>
                                    <span class="price-text">
                                        Rp{{ number_format($item->harga_satuan * $item->qty, 0, ',', '.') }}
                                    </span>
                                </td>

                            </tr>

                        @endforeach

                    </tbody>

                </table>

            </div>

            <div class="total-box">

                <div class="total-row">
                    <span>Subtotal Produk</span>
                    <strong>
                        Rp{{ number_format($order->subtotal, 0, ',', '.') }}
                    </strong>
                </div>

                <div class="total-row">
                    <span>Diskon</span>
                    <strong>
                        - Rp{{ number_format($order->diskon ?? 0, 0, ',', '.') }}
                    </strong>
                </div>

                <div class="total-row">
                    <span>Ongkos Kirim</span>
                    <strong>
                        Rp{{ number_format($order->ongkir ?? 0, 0, ',', '.') }}
                    </strong>
                </div>

                <div class="grand-total">

                    <span>Total Pembayaran</span>

                    <h4>
                        Rp{{ number_format($order->total, 0, ',', '.') }}
                    </h4>

                </div>

            </div>

        </div>

    </div>

    {{-- BUKTI PEMBAYARAN --}}

    @if($order->bukti_bayar)

        <div class="section-card">

            <div class="section-heading">

                <div class="heading-icon">
                    <i class="bi bi-image"></i>
                </div>

                <h5>Bukti Pembayaran</h5>

            </div>

            <div class="section-content">

                <p class="text-secondary small mb-3">
                    Bukti pembayaran yang telah diunggah untuk pesanan ini.
                </p>

                <img
                    src="{{ asset('storage/' . $order->bukti_bayar) }}"
                    alt="Bukti Pembayaran"
                    class="payment-image"
                >

            </div>

        </div>

    @endif

    {{-- UPLOAD BUKTI PEMBAYARAN --}}

    @if(
        $order->status == 'menunggu_bayar'
        && in_array($order->metode_bayar, ['transfer', 'ewallet'])
    )

        <div class="section-card">

            <div class="section-heading">

                <div class="heading-icon">
                    <i class="bi bi-cloud-arrow-up"></i>
                </div>

                <h5>Upload Bukti Pembayaran</h5>

            </div>

            <div class="section-content">

                <div class="upload-box">

                    <div class="upload-icon">
                        <i class="bi bi-image"></i>
                    </div>

                    <h6 class="fw-bold mb-2" style="font-size: 14px;">
                        Unggah Bukti Pembayaran
                    </h6>

                    <p class="text-secondary small mb-4">
                        Format JPG, JPEG, atau PNG dengan ukuran maksimal 2 MB.
                    </p>

                    <form
                        action="{{ route('customer.orders.payment.upload', $order->id) }}"
                        method="POST"
                        enctype="multipart/form-data"
                    >

                        @csrf

                        <div class="mb-3">

                            <label for="bukti_bayar" class="form-label">
                                Pilih File Bukti Pembayaran
                            </label>

                            <input
                                type="file"
                                name="bukti_bayar"
                                id="bukti_bayar"
                                class="form-control"
                                accept=".jpg,.jpeg,.png"
                                required
                            >

                        </div>

                        <button type="submit" class="btn btn-primary">
                            <i class="bi bi-upload me-2"></i>
                            Upload Bukti Pembayaran
                        </button>

                    </form>

                </div>

            </div>

        </div>

    @endif

    {{-- INFORMASI PENGEMASAN --}}

    @if($order->status == 'dikemas')

        <div class="notice">

            <strong>
                <i class="bi bi-box-seam me-2"></i>
                Pesanan Sedang Dikemas
            </strong>

            <div class="mt-2">
                Pembayaran telah diverifikasi.
                Pesanan sedang disiapkan oleh admin sebelum dikirim.
            </div>

        </div>

    @endif

    {{-- INFORMASI PENGIRIMAN --}}

    @if(in_array($order->status, ['dikirim', 'selesai']))

        <div class="section-card">

            <div class="section-heading">

                <div class="heading-icon">
                    <i class="bi bi-truck"></i>
                </div>

                <h5>Informasi Pengiriman</h5>

            </div>

            <div class="section-content">

                <div class="shipping-info">

                    <div class="shipping-item">

                        <label>Status Pengiriman</label>

                        <strong>
                            {{ ucfirst($order->status) }}
                        </strong>

                    </div>

                    <div class="shipping-item">

                        <label>Nomor Resi</label>

                        <strong>
                            {{ $order->resi ?? 'Belum tersedia' }}
                        </strong>

                    </div>

                </div>

                @if($order->status == 'dikirim')

                    <div class="notice mt-4 mb-0">
                        <i class="bi bi-truck me-2"></i>
                        Pesanan sedang dalam proses pengiriman.
                    </div>

                @else

                    <div class="notice notice-success mt-4 mb-0">
                        <i class="bi bi-check-circle me-2"></i>
                        Pesanan telah dikonfirmasi diterima.
                    </div>

                @endif

            </div>

        </div>

    @endif

    {{-- KONFIRMASI PESANAN DITERIMA --}}

    @if($order->status == 'dikirim')

        <div class="section-card">

            <div class="section-heading">

                <div class="heading-icon">
                    <i class="bi bi-check-circle"></i>
                </div>

                <h5>Konfirmasi Penerimaan Pesanan</h5>

            </div>

            <div class="section-content">

                <p class="text-secondary small mb-3">
                    Pastikan barang sudah benar-benar diterima sebelum melakukan konfirmasi.
                </p>

                <form
                    action="{{ route('customer.orders.received', $order->id) }}"
                    method="POST"
                    onsubmit="return confirm('Apakah kamu yakin pesanan sudah diterima?')"
                >

                    @csrf
                    @method('PATCH')

                    <button type="submit" class="btn btn-success">
                        <i class="bi bi-check-circle me-2"></i>
                        Pesanan Diterima
                    </button>

                </form>

            </div>

        </div>

    @endif

    {{-- RATING DAN ULASAN --}}

    @if($order->status == 'selesai')

        <div class="section-card">

            <div class="section-heading">

                <div class="heading-icon">
                    <i class="bi bi-star"></i>
                </div>

                <h5>Ulasan dan Rating Produk</h5>

            </div>

            <div class="section-content">

                <p class="text-secondary small mb-4">
                    Berikan penilaian terhadap produk yang sudah Anda terima.
                </p>

                @foreach($items->unique('product_id') as $item)

                    <div class="review-box">

                        <h6>{{ $item->nama_produk }}</h6>

                        <div class="mb-3">

                            <a
                                href="{{ route('products.reviews.index', $item->product_id) }}"
                                class="review-link"
                            >
                                <i class="bi bi-chat-left-text me-1"></i>
                                Lihat ulasan produk
                            </a>

                        </div>

                        @if(in_array($item->product_id, $reviewedProductIds))

                            <span class="status-badge status-success">
                                <i class="bi bi-check-circle me-1"></i>
                                Sudah Diulas
                            </span>

                            <p class="text-secondary small mt-2 mb-0">
                                Terima kasih sudah memberikan ulasan.
                            </p>

                        @else

                            <form
                                action="{{ route('customer.orders.reviews.store', [
                                    'orderId' => $order->id,
                                    'productId' => $item->product_id
                                ]) }}"
                                method="POST"
                            >

                                @csrf

                                <div class="mb-3">

                                    <label class="form-label">
                                        Rating Produk
                                    </label>

                                    <select
                                        name="rating"
                                        class="form-select"
                                        required
                                    >

                                        <option value="">
                                            Pilih Rating
                                        </option>

                                        <option value="5">5 - Sangat Baik</option>
                                        <option value="4">4 - Baik</option>
                                        <option value="3">3 - Cukup</option>
                                        <option value="2">2 - Kurang</option>
                                        <option value="1">1 - Sangat Kurang</option>

                                    </select>

                                </div>

                                <div class="mb-3">

                                    <label class="form-label">
                                        Komentar
                                    </label>

                                    <textarea
                                        name="komentar"
                                        class="form-control"
                                        rows="3"
                                        maxlength="1000"
                                        placeholder="Tuliskan pendapat Anda tentang produk ini..."
                                    >{{ old('komentar') }}</textarea>

                                </div>

                                <button type="submit" class="btn btn-primary btn-sm px-3">
                                    <i class="bi bi-send me-1"></i>
                                    Kirim Ulasan
                                </button>

                            </form>

                        @endif

                    </div>

                @endforeach

            </div>

        </div>

    @endif

    {{-- INFORMASI PESANAN DITOLAK --}}

    @if($order->status == 'ditolak')

        <div class="notice notice-danger">

            <strong>
                <i class="bi bi-exclamation-circle me-2"></i>
                Pesanan Ditolak
            </strong>

            <div class="mt-2">
                Pesanan ini telah ditolak oleh admin.
                Silakan kembali ke halaman belanja apabila ingin membuat pesanan baru.
            </div>

            <a href="{{ route('home') }}"
               class="btn btn-primary btn-sm mt-3">
                <i class="bi bi-bag me-1"></i>
                Belanja Kembali
            </a>

        </div>

    @endif

</div>

<footer class="footer">
    © {{ date('Y') }} SportZone. Semua Hak Dilindungi.
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
