<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Riwayat Notifikasi - SportZone</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css"
          rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css"
          rel="stylesheet">

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            background: #f5f7fb;
            color: #202938;
            font-family: 'Inter', sans-serif;
            font-size: 13px;
        }

        /* NAVBAR */

        .navbar {
            height: 72px;
            background: #fff;
            border-bottom: 1px solid #e9edf3;
        }

        .navbar-brand {
            font-size: 21px;
            font-weight: 800;
            letter-spacing: -0.7px;
            color: #172033;
        }

        .brand-icon {
            width: 36px;
            height: 36px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            background: #eaf2ff;
            color: #2563eb;
            border-radius: 10px;
            margin-right: 9px;
        }

        /* PAGE */

        .page-container {
            max-width: 1050px;
            margin: 38px auto;
            padding: 0 20px;
        }

        .page-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 25px;
        }

        .page-title {
            font-size: 23px;
            font-weight: 800;
            letter-spacing: -0.7px;
            margin-bottom: 6px;
        }

        .page-subtitle {
            color: #8791a1;
            font-size: 12px;
            margin: 0;
        }

        .btn-back {
            border: 1px solid #dce2ea;
            background: #fff;
            color: #475569;
            padding: 9px 15px;
            border-radius: 8px;
            font-size: 12px;
            font-weight: 600;
            text-decoration: none;
            transition: .2s;
        }

        .btn-back:hover {
            background: #f1f5f9;
            color: #1e293b;
        }

        /* SUMMARY */

        .notification-summary {
            background: #fff;
            border: 1px solid #e9edf3;
            border-radius: 11px;
            padding: 15px 18px;
            margin-bottom: 14px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .summary-text {
            color: #64748b;
            font-size: 12px;
        }

        .summary-number {
            color: #2563eb;
            font-weight: 800;
            font-size: 14px;
        }

        .btn-read-all {
            background: #eff6ff;
            border: 1px solid #dbeafe;
            color: #2563eb;
            border-radius: 8px;
            padding: 8px 13px;
            font-size: 11px;
            font-weight: 700;
            transition: .2s;
        }

        .btn-read-all:hover {
            background: #dbeafe;
            color: #1d4ed8;
        }

        /* NOTIFICATION CARD */

        .notification-card {
            background: #fff;
            border: 1px solid #e9edf3;
            border-radius: 11px;
            padding: 18px;
            margin-bottom: 11px;
            transition: .2s;
        }

        .notification-card:hover {
            border-color: #cbd5e1;
            box-shadow: 0 4px 14px rgba(15, 23, 42, .04);
        }

        .notification-card.unread {
            background: #f7faff;
            border-left: 4px solid #2563eb;
        }

        .notification-icon {
            width: 43px;
            height: 43px;
            min-width: 43px;
            border-radius: 11px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: #f1f5f9;
            font-size: 19px;
        }

        .notification-card.unread .notification-icon {
            background: #e8f1ff;
        }

        .notification-title {
            font-size: 13px;
            font-weight: 700;
            color: #263246;
        }

        .notification-message {
            font-size: 12px;
            color: #64748b;
            line-height: 1.7;
        }

        .notification-time {
            font-size: 10px;
            color: #94a3b8;
        }

        .notification-status {
            font-size: 9px;
            font-weight: 700;
            padding: 6px 9px;
            border-radius: 20px;
            white-space: nowrap;
        }

        /* EMPTY STATE */

        .empty-state {
            background: #fff;
            border: 1px solid #e9edf3;
            border-radius: 12px;
            padding: 65px 25px;
            text-align: center;
        }

        .empty-icon {
            width: 70px;
            height: 70px;
            margin: 0 auto 17px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 20px;
            background: #f1f5f9;
            color: #94a3b8;
            font-size: 30px;
        }

        .empty-title {
            font-size: 15px;
            font-weight: 800;
            margin-bottom: 7px;
        }

        .empty-description {
            color: #94a3b8;
            font-size: 12px;
            margin: 0;
        }

        /* PAGINATION BOOTSTRAP 5 */

        .notification-pagination {
            margin-top: 25px;
            display: flex;
            justify-content: right;
        }

        .notification-pagination nav {
            display: flex;
            justify-content: right;
        }

        .notification-pagination .pagination {
            justify-content: center;
            gap: 4px;
            margin: 0;
        }

        .notification-pagination .page-item {
            margin: 0;
        }

        .notification-pagination .page-link {
            border: 1px solid #e2e8f0;
            border-radius: 7px !important;
            color: #475569;
            font-size: 12px;
            padding: 8px 13px;
            box-shadow: none;
        }

        .notification-pagination .page-link:hover {
            background: #eff6ff;
            border-color: #bfdbfe;
            color: #2563eb;
        }

        .notification-pagination .page-item.active .page-link {
            background: #2563eb;
            border-color: #2563eb;
            color: #fff;
        }

        .notification-pagination .page-item.disabled .page-link {
            color: #94a3b8;
            background: #f8fafc;
        }

        /* Mencegah SVG pagination membesar */

        .notification-pagination svg {
            width: 16px !important;
            height: 16px !important;
            max-width: 16px;
            max-height: 16px;
            display: inline-block;
            vertical-align: middle;
        }

        .notification-pagination p {
            font-size: 11px;
            color: #94a3b8;
            margin-top: 12px;
        }

        /* ALERT */

        .alert {
            font-size: 12px;
            border-radius: 9px;
        }
    </style>
</head>

<body>

{{-- NAVBAR --}}

<nav class="navbar">
    <div class="container">

        <a href="{{ route('home') }}"
           class="navbar-brand text-decoration-none">

            <span class="brand-icon">
                <i class="bi bi-basket2-fill"></i>
            </span>

            SportZone

        </a>

        <a href="{{ route('home') }}" class="btn-back">
            <i class="bi bi-arrow-left me-1"></i>
            Kembali ke Toko
        </a>

    </div>
</nav>


{{-- MAIN CONTENT --}}

<div class="page-container">

    {{-- HEADER --}}

    <div class="page-header">

        <div>
            <h4 class="page-title">
                Riwayat Notifikasi
            </h4>

            <p class="page-subtitle">
                Informasi terbaru dan pemberitahuan dari SportZone.
            </p>
        </div>

    </div>


    {{-- FLASH MESSAGE --}}

    @if(session('success'))
        <div class="alert alert-success py-2">
            <i class="bi bi-check-circle me-1"></i>
            {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger py-2">
            <i class="bi bi-exclamation-circle me-1"></i>
            {{ session('error') }}
        </div>
    @endif


    {{-- NOTIFICATION SUMMARY --}}

    <div class="notification-summary">

        <div>

            <div class="summary-text mb-1">
                Jumlah notifikasi belum dibaca
            </div>

            <div class="summary-number">
                {{ $jumlahBelumDibaca }} Notifikasi
            </div>

        </div>

        @if($jumlahBelumDibaca > 0)

            <form action="{{ route('notifications.read-all') }}"
                  method="POST">

                @csrf

                <button type="submit" class="btn-read-all">

                    <i class="bi bi-check2-all me-1"></i>
                    Tandai Semua Dibaca

                </button>

            </form>

        @endif

    </div>


    {{-- NOTIFICATION LIST --}}

    @forelse($notifications as $item)

        <a href="{{ route('notifications.read', $item->id) }}"
           class="text-decoration-none text-dark">

            <div class="notification-card {{ $item->read_at === null ? 'unread' : '' }}">

                <div class="d-flex gap-3 align-items-start">

                    {{-- ICON --}}

                    <div class="notification-icon text-{{ $item->warna }}">
                        <i class="bi {{ $item->ikon }}"></i>
                    </div>


                    {{-- CONTENT --}}

                    <div class="flex-grow-1">

                        <div class="d-flex justify-content-between align-items-center gap-3">

                            <div class="notification-title">
                                {{ $item->judul }}
                            </div>

                            @if($item->read_at === null)

                                <span class="badge bg-primary notification-status">
                                    Belum dibaca
                                </span>

                            @else

                                <span class="badge bg-light text-secondary border notification-status">
                                    Sudah dibaca
                                </span>

                            @endif

                        </div>


                        <div class="notification-message mt-2">
                            {{ $item->pesan }}
                        </div>


                        <div class="notification-time mt-3">

                            <i class="bi bi-clock me-1"></i>

                            {{ \Carbon\Carbon::parse($item->created_at)->diffForHumans() }}

                        </div>

                    </div>

                </div>

            </div>

        </a>

    @empty

        {{-- EMPTY NOTIFICATION --}}

        <div class="empty-state">

            <div class="empty-icon">
                <i class="bi bi-bell-slash"></i>
            </div>

            <h6 class="empty-title">
                Belum Ada Notifikasi
            </h6>

            <p class="empty-description">
                Notifikasi terbaru dari SportZone akan muncul di halaman ini.
            </p>

        </div>

    @endforelse


    {{-- PAGINATION --}}

    @if($notifications->hasPages())

        <div class="notification-pagination">

            {{ $notifications->links('pagination::bootstrap-5') }}

        </div>

    @endif

</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
