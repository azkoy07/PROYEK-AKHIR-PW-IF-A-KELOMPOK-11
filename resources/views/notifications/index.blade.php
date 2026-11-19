
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
            font-size: 12px;
            font-weight: 600;
            transition: .2s;
            margin-right: -45px;
        }

        .back-link:hover {
            color: #2563eb;
        }

        /* PAGE */

        .page-container {
            max-width: 1100px;
            margin: 34px auto 55px;
            padding: 0 24px;
        }

        .page-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 22px;
        }

        .page-title {
            font-size: 23px;
            font-weight: 800;
            letter-spacing: -.7px;
            color: #172033;
            margin-bottom: 6px;
        }

        .page-subtitle {
            color: #8791a1;
            font-size: 12px;
            margin: 0;
        }

        /* SUMMARY */

        .notification-summary {
            background: #fff;
            border: 1px solid #e9edf3;
            border-radius: 11px;
            padding: 16px 19px;
            margin-bottom: 17px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .summary-text {
            color: #64748b;
            font-size: 12px;
            font-weight: 500;
        }

        .summary-number {
            color: #2563eb;
            font-weight: 800;
            font-size: 15px;
        }

        .btn-read-all {
            background: #eff6ff;
            border: 1px solid #dbeafe;
            color: #2563eb;
            border-radius: 8px;
            padding: 9px 14px;
            font-size: 11px;
            font-weight: 700;
            transition: .2s;
        }

        .btn-read-all:hover {
            background: #dbeafe;
            color: #1d4ed8;
        }

        /* NOTIFICATION LIST */

        .notification-list {
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        .notification-link {
            display: block;
            text-decoration: none;
            color: inherit;
        }

        .notification-card {
            width: 100%;
            background: #fff;
            border: 1px solid #e9edf3;
            border-radius: 11px;
            padding: 17px 19px;
            transition: all .2s ease;
        }

        .notification-card:hover {
            border-color: #bfdbfe;
            box-shadow: 0 5px 16px rgba(15, 23, 42, .045);
            transform: translateY(-1px);
        }

        .notification-card.unread {
            background: #f8fbff;
            border-left: 4px solid #2563eb;
            padding-left: 16px;
        }

        /* NOTIFICATION CONTENT */

        .notification-content {
            display: flex;
            align-items: flex-start;
            gap: 14px;
            width: 100%;
            text-align: left;
        }

        .notification-icon {
            width: 42px;
            height: 42px;
            min-width: 42px;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: #f1f5f9;
            font-size: 18px;
        }

        .notification-card.unread .notification-icon {
            background: #e8f1ff;
        }

        .notification-body {
            flex: 1;
            min-width: 0;
            text-align: left;
        }

        .notification-heading {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            gap: 15px;
        }

        .notification-title {
            font-size: 13px;
            font-weight: 700;
            color: #263246;
            line-height: 1.5;
            text-align: left;
        }

        .notification-message {
            font-size: 12px;
            color: #64748b;
            line-height: 1.7;
            margin-top: 5px;
            text-align: left;
            overflow-wrap: anywhere;
        }

        .notification-footer {
            display: flex;
            align-items: center;
            margin-top: 11px;
        }

        .notification-time {
            font-size: 10px;
            color: #94a3b8;
            display: flex;
            align-items: center;
            gap: 5px;
        }

        .notification-status {
            font-size: 9px;
            font-weight: 700;
            padding: 6px 9px;
            border-radius: 20px;
            white-space: nowrap;
            flex-shrink: 0;
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
            width: 66px;
            height: 66px;
            margin: 0 auto 17px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 18px;
            background: #f1f5f9;
            color: #94a3b8;
            font-size: 28px;
        }

        .empty-title {
            font-size: 15px;
            font-weight: 800;
            color: #263246;
            margin-bottom: 7px;
        }

        .empty-description {
            color: #94a3b8;
            font-size: 12px;
            margin: 0;
        }

        
        /* PAGINATION */

        .notification-pagination {
            width: 100%;
            margin-top: 24px;
            display: flex;
            justify-content: flex-end;
            align-items: center;
        }

        .notification-pagination nav {
            width: 100%;
        }

        .notification-pagination nav > div {
            width: 100%;
            display: flex;
            justify-content: flex-end !important;
        }

        .notification-pagination nav > div > div:last-child {
            margin-left: auto;
        }

        .notification-pagination .pagination {
            display: flex;
            justify-content: flex-end;
            gap: 4px;
            margin: 0 0 0 auto;
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

        /* RESPONSIVE */

        @media (max-width: 768px) {

            .page-container {
                padding: 0 16px;
                margin-top: 25px;
            }

            .notification-card {
                padding: 15px;
            }

            .notification-card.unread {
                padding-left: 12px;
            }

            .notification-heading {
                flex-wrap: wrap;
            }

            .notification-status {
                margin-top: 3px;
            }

        }
    </style>
</head>

<body>

<!-- NAVBAR -->
<nav class="navbar">
    <div class="container d-flex justify-content-between align-items-center">

        <a href="{{ route('home') }}" class="brand">
            SPORT<span>ZONE</span>
        </a>

        <a href="{{ route('home') }}" class="back-link">
            <i class="bi bi-arrow-left me-1"></i>
            Kembali ke Toko
        </a>

    </div>
</nav>


<!-- MAIN CONTENT -->
<div class="page-container">

    <!-- HEADER -->
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


    <!-- FLASH MESSAGE -->
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


    <!-- NOTIFICATION SUMMARY -->
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


    <!-- NOTIFICATION LIST -->
    <div class="notification-list">

        @forelse($notifications as $item)

            <a href="{{ route('notifications.read', $item->id) }}"
               class="notification-link">

                <div class="notification-card {{ $item->read_at === null ? 'unread' : '' }}">

                    <div class="notification-content">

                        <!-- ICON -->
                        <div class="notification-icon text-{{ $item->warna }}">
                            <i class="bi {{ $item->ikon }}"></i>
                        </div>


                        <!-- CONTENT -->
                        <div class="notification-body">

                            <div class="notification-heading">

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


                            <div class="notification-message">
                                {{ $item->pesan }}
                            </div>


                            <div class="notification-footer">

                                <div class="notification-time">

                                    <i class="bi bi-clock"></i>

                                    {{ \Carbon\Carbon::parse($item->created_at)->diffForHumans() }}

                                </div>

                            </div>

                        </div>

                    </div>

                </div>

            </a>

        @empty

            <!-- EMPTY STATE -->
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

    </div>


    <!-- PAGINATION -->
    @if($notifications->hasPages())

        <div class="notification-pagination">

            {{ $notifications->links('pagination::bootstrap-5') }}

        </div>

    @endif

</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
