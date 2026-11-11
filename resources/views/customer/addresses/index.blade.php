
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alamat Pengiriman - SportZone</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css" rel="stylesheet">

    <style>
        * {
            font-family: 'Inter', sans-serif;
        }

        body {
            background: #f5f7fb;
            color: #172033;
        }

        .navbar {
            height: 72px;
            background: #fff;
            border-bottom: 1px solid #e8ebf1;
        }

        .brand {
            color: #172033;
            font-size: 21px;
            font-weight: 800;
            text-decoration: none;
        }

        .brand span {
            color: #2563eb;
        }

        .page-container {
            max-width: 1120px;
            margin: 0 auto;
            padding: 42px 20px 70px;
        }

        .page-title {
            font-size: 25px;
            font-weight: 800;
            letter-spacing: -0.7px;
        }

        .page-subtitle {
            color: #7b8495;
            font-size: 13px;
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

        .btn {
            border-radius: 8px;
            font-size: 13px;
            font-weight: 600;
            padding: 9px 14px;
        }

        .address-card {
            background: #fff;
            border: 1px solid #e9edf3;
            border-radius: 13px;
            padding: 25px;
            margin-bottom: 15px;
            transition: .2s;
        }

        .address-card:hover {
            border-color: #cbdafc;
            box-shadow: 0 5px 18px rgba(20, 35, 65, .04);
        }

        .address-name {
            font-size: 16px;
            font-weight: 700;
            margin-bottom: 8px;
        }

        .address-info {
            color: #596579;
            font-size: 13px;
            line-height: 1.8;
        }

        .address-info i {
            color: #2563eb;
            margin-right: 7px;
        }

        .badge-primary-soft {
            display: inline-block;
            background: #eaf1ff;
            color: #2563eb;
            border-radius: 6px;
            padding: 5px 9px;
            font-size: 10px;
            font-weight: 700;
            margin-bottom: 12px;
        }

        .address-actions {
            min-width: 145px;
        }

        .address-actions .btn {
            width: 100%;
        }

        .empty-card {
            background: #fff;
            border: 1px solid #e9edf3;
            border-radius: 13px;
            padding: 65px 20px;
            text-align: center;
        }

        .empty-icon {
            width: 76px;
            height: 76px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: #eff4ff;
            color: #2563eb;
            border-radius: 20px;
            font-size: 32px;
            margin: 0 auto 20px;
        }

        .alert {
            border-radius: 9px;
            font-size: 13px;
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
    </style>
</head>

<body>

<nav class="navbar">
    <div class="container">
        <a href="{{ route('home') }}" class="brand">
            SPORT<span>ZONE</span>
        </a>

        <a href="{{ route('customer.dashboard') }}" class="back-link">
            <i class="bi bi-arrow-left me-1"></i>
            Kembali ke Dashboard
        </a>
    </div>
</nav>

<div class="page-container">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h3 class="page-title mb-2">Alamat Pengiriman</h3>
            <p class="page-subtitle mb-0">
                Kelola alamat untuk mempermudah proses pengiriman pesanan.
            </p>
        </div>

        <a href="{{ route('customer.addresses.create') }}" class="btn btn-primary">
            <i class="bi bi-plus-lg me-1"></i>
            Tambah Alamat
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">
            <i class="bi bi-check-circle me-2"></i>
            {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger">
            <i class="bi bi-exclamation-circle me-2"></i>
            {{ session('error') }}
        </div>
    @endif

    @if($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @forelse($addresses as $address)

        <div class="address-card">
            <div class="d-flex justify-content-between align-items-start gap-4">

                <div class="flex-grow-1">

                    <h5 class="address-name">
                        {{ $address->penerima }}
                    </h5>

                    @if($address->is_utama)
                        <span class="badge-primary-soft">
                            <i class="bi bi-check-circle-fill me-1"></i>
                            ALAMAT UTAMA
                        </span>
                    @endif

                    <div class="address-info">
                        <div>
                            <i class="bi bi-telephone"></i>
                            {{ $address->no_hp }}
                        </div>

                        <div class="mt-1">
                            <i class="bi bi-geo-alt"></i>
                            {{ $address->alamat_lengkap }}
                        </div>

                        <div class="mt-1">
                            <i class="bi bi-buildings"></i>
                            {{ $address->kota ?: '-' }}
                            {{ $address->kode_pos ?: '' }}
                        </div>
                    </div>

                </div>

                <div class="address-actions d-flex flex-column gap-2">

                    <a href="{{ route('customer.addresses.edit', $address->id) }}"
                       class="btn btn-outline-primary btn-sm">
                        <i class="bi bi-pencil me-1"></i>
                        Edit Alamat
                    </a>

                    @if(!$address->is_utama)
                        <form action="{{ route('customer.addresses.primary', $address->id) }}"
                              method="POST">
                            @csrf
                            @method('PATCH')

                            <button type="submit"
                                    class="btn btn-outline-success btn-sm">
                                <i class="bi bi-check2-circle me-1"></i>
                                Jadikan Utama
                            </button>
                        </form>
                    @endif

                    <form action="{{ route('customer.addresses.destroy', $address->id) }}"
                          method="POST"
                          onsubmit="return confirm('Yakin ingin menghapus alamat ini?')">
                        @csrf
                        @method('DELETE')

                        <button type="submit" class="btn btn-outline-danger btn-sm">
                            <i class="bi bi-trash me-1"></i>
                            Hapus Alamat
                        </button>
                    </form>

                </div>

            </div>
        </div>

    @empty

        <div class="empty-card">
            <div class="empty-icon">
                <i class="bi bi-geo-alt"></i>
            </div>

            <h5 class="fw-bold mb-2">Belum Ada Alamat</h5>

            <p class="text-secondary small mb-4">
                Kamu belum memiliki alamat pengiriman.
                Tambahkan alamat agar dapat melanjutkan proses pemesanan.
            </p>

            <a href="{{ route('customer.addresses.create') }}"
               class="btn btn-primary">
                <i class="bi bi-plus-lg me-1"></i>
                Tambah Alamat Pertama
            </a>
        </div>

    @endforelse

</div>

</body>
</html>
