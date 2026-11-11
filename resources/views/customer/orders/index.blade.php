
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Pesanan Saya - SportZone</title>

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
            background: #E8EEF8;
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
            font-weight: 600;
            border-color: #dce2eb;
            color: #64748b;
        }

        .orders-card {
            background: #fff;
            border: 1px solid #e8edf3;
            border-radius: 12px;
            overflow: hidden;
        }

        .orders-card-header {
            padding: 21px 24px;
            border-bottom: 1px solid #edf0f5;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .orders-card-header h5 {
            font-size: 15px;
            font-weight: 700;
            margin: 0;
        }

        .order-count {
            background: #eff6ff;
            color: #2563eb;
            font-size: 11px;
            font-weight: 700;
            padding: 6px 11px;
            border-radius: 20px;
        }

        .table {
            margin: 0;
            white-space: nowrap;
        }

        .table thead th {
            background: #f8fafc;
            color: #64748b;
            font-size: 11px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.4px;
            padding: 16px 18px;
            border-bottom: 1px solid #e8edf3;
        }

        .table tbody td {
            padding: 17px 18px;
            font-size: 12px;
            color: #475569;
            border-color: #edf0f5;
            vertical-align: middle;
        }

        .table tbody tr:hover {
            background: #fafcff;
        }

        .order-code {
            font-weight: 700;
            color: #2563eb;
            font-size: 12px;
        }

        .order-date {
            color: #64748b;
            font-size: 12px;
        }

        .order-total {
            font-weight: 700;
            color: #202938;
        }

        .payment-method {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            font-weight: 600;
            color: #475569;
            font-size: 11px;
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

        .detail-button {
            font-size: 11px;
            font-weight: 600;
            padding: 7px 13px;
            border-radius: 6px;
        }

        .empty-state {
            background: #fff;
            border: 1px solid #e8edf3;
            border-radius: 12px;
            padding: 75px 20px;
            text-align: center;
        }

        .empty-icon {
            width: 75px;
            height: 75px;
            background: #eff6ff;
            color: #2563eb;
            border-radius: 50%;
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 30px;
            margin: 0 auto 20px;
        }

        .empty-state h5 {
            font-size: 17px;
            font-weight: 700;
            color: #202938;
        }

        .empty-state p {
            color: #8792a2;
            font-size: 13px;
            margin: 9px 0 20px;
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

<nav class="navbar">
    <div class="container" style="max-width: 1180px;">
        <div class="d-flex justify-content-between align-items-center w-100">

            <a href="{{ route('home') }}" class="brand">
                SPORT<span>ZONE</span>
            </a>

            <a href="{{ route('home') }}"
               class="btn btn-outline-secondary btn-sm px-3">
                <i class="bi bi-arrow-left me-1"></i>
                Kembali Belanja
            </a>

        </div>
    </div>
</nav>

<div class="page-container">

    <div class="page-heading">

        <div>
            <h1>Pesanan Saya</h1>
            <p>Pantau status dan riwayat pesanan belanja Anda.</p>
        </div>

    </div>

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

    @if($orders->count() > 0)

        <div class="orders-card">

            <div class="orders-card-header">

                <h5>
                    <i class="bi bi-receipt text-primary me-2"></i>
                    Riwayat Pesanan
                </h5>

                <span class="order-count">
                    {{ $orders->count() }} Pesanan
                </span>

            </div>

            <div class="table-responsive">

                <table class="table align-middle">

                    <thead>
                        <tr>
                            <th>Kode Pesanan</th>
                            <th>Tanggal</th>
                            <th>Total Pembayaran</th>
                            <th>Metode Pembayaran</th>
                            <th>Status</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>

                    <tbody>

                        @foreach($orders as $order)

                            <tr>

                                <td>
                                    <span class="order-code">
                                        {{ $order->kode_order }}
                                    </span>
                                </td>

                                <td>
                                    <span class="order-date">
                                        {{ \Carbon\Carbon::parse($order->created_at)->format('d M Y, H:i') }}
                                    </span>
                                </td>

                                <td>
                                    <span class="order-total">
                                        Rp{{ number_format($order->total, 0, ',', '.') }}
                                    </span>
                                </td>

                                <td>
                                    <span class="payment-method">

                                        @if($order->metode_bayar == 'transfer')
                                            <i class="bi bi-bank"></i>
                                            Transfer Bank

                                        @elseif($order->metode_bayar == 'cod')
                                            <i class="bi bi-truck"></i>
                                            COD

                                        @elseif($order->metode_bayar == 'ewallet')
                                            <i class="bi bi-wallet2"></i>
                                            E-Wallet

                                        @else
                                            {{ strtoupper($order->metode_bayar) }}
                                        @endif

                                    </span>
                                </td>

                                <td>

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

                                </td>

                                <td class="text-center">

                                    <a
                                        href="{{ route('customer.orders.show', $order->id) }}"
                                        class="btn btn-primary detail-button"
                                    >
                                        <i class="bi bi-eye me-1"></i>
                                        Detail
                                    </a>

                                </td>

                            </tr>

                        @endforeach

                    </tbody>

                </table>

            </div>

        </div>

    @else

        <div class="empty-state">

            <div class="empty-icon">
                <i class="bi bi-receipt"></i>
            </div>

            <h5>Belum Ada Pesanan</h5>

            <p>
                Anda belum memiliki riwayat pesanan.
                Silakan mulai berbelanja untuk membuat pesanan pertama.
            </p>

            <a href="{{ route('home') }}" class="btn btn-primary px-4">
                <i class="bi bi-bag me-2"></i>
                Mulai Belanja
            </a>

        </div>

    @endif

</div>

<footer class="footer">
    © {{ date('Y') }} SportZone. Semua Hak Dilindungi.
</footer>

</body>
</html>
