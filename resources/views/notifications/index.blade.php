
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Riwayat Notifikasi - SportZone</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css"
          rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css"
          rel="stylesheet">

    <style>
        body {
            background: #f5f7fa;
            color: #222;
            font-family: Arial, sans-serif;
        }

        .notification-container {
            max-width: 850px;
            margin: 45px auto;
            padding: 0 15px;
        }

        .notification-card {
            background: white;
            border: 1px solid #e9ecef;
            border-radius: 12px;
            padding: 17px;
            margin-bottom: 12px;
            transition: .2s;
        }

        .notification-card:hover {
            border-color: #cbd5e1;
        }

        .notification-card.unread {
            background: #f0f6ff;
            border-left: 4px solid #0d6efd;
        }

        .notification-icon {
            width: 38px;
            height: 38px;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: #f1f3f5;
            font-size: 18px;
            flex-shrink: 0;
        }

        .notification-title {
            font-size: 14px;
            font-weight: 600;
        }

        .notification-message {
            font-size: 13px;
            color: #6c757d;
            line-height: 1.5;
        }

        .notification-time {
            font-size: 11px;
            color: #8a8f98;
        }

        .notification-status {
            font-size: 10px;
            font-weight: 600;
        }
    </style>
</head>

<body>

<div class="notification-container">

    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>
            <h4 class="fw-bold mb-1">Riwayat Notifikasi</h4>

            <p class="text-muted small mb-0">
                Informasi terbaru dari SportZone
            </p>
        </div>

        <a href="{{ route('home') }}"
           class="btn btn-outline-secondary btn-sm">
            <i class="bi bi-arrow-left"></i>
            Kembali
        </a>

    </div>

    @if(session('success'))
        <div class="alert alert-success py-2 small">
            {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger py-2 small">
            {{ session('error') }}
        </div>
    @endif

    <div class="d-flex justify-content-between align-items-center mb-3">

        <small class="text-muted">
            {{ $jumlahBelumDibaca }} notifikasi belum dibaca
        </small>

        @if($jumlahBelumDibaca > 0)
            <form action="{{ route('notifications.read-all') }}"
                  method="POST">
                @csrf

                <button type="submit"
                        class="btn btn-sm btn-outline-primary">
                    <i class="bi bi-check2-all"></i>
                    Tandai Semua Dibaca
                </button>
            </form>
        @endif

    </div>

    @forelse($notifications as $item)

        <a href="{{ route('notifications.read', $item->id) }}"
           class="text-decoration-none text-dark">

            <div class="notification-card {{ $item->read_at === null ? 'unread' : '' }}">

                <div class="d-flex gap-3">

                    <div class="notification-icon text-{{ $item->warna }}">
                        <i class="bi {{ $item->ikon }}"></i>
                    </div>

                    <div class="flex-grow-1">

                        <div class="d-flex justify-content-between gap-2">

                            <div class="notification-title">
                                {{ $item->judul }}
                            </div>

                            @if($item->read_at === null)
                                <span class="badge bg-primary notification-status">
                                    Belum dibaca
                                </span>
                            @else
                                <span class="badge bg-secondary notification-status">
                                    Sudah dibaca
                                </span>
                            @endif

                        </div>

                        <div class="notification-message mt-1">
                            {{ $item->pesan }}
                        </div>

                        <div class="notification-time mt-2">
                            <i class="bi bi-clock"></i>
                            {{ \Carbon\Carbon::parse($item->created_at)->diffForHumans() }}
                        </div>

                    </div>

                </div>

            </div>

        </a>

    @empty

        <div class="bg-white rounded-3 text-center p-5 border">

            <i class="bi bi-bell-slash fs-1 text-secondary"></i>

            <h6 class="fw-bold mt-3">
                Belum Ada Notifikasi
            </h6>

            <p class="text-muted small mb-0">
                Notifikasi terbaru akan muncul di halaman ini.
            </p>

        </div>

    @endforelse

    <div class="mt-4">
        {{ $notifications->links() }}
    </div>

</div>

</body>
</html>
