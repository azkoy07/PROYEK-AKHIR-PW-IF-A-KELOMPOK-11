
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Pesanan - SportZone</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container py-4">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h3 class="mb-1">Detail Pesanan</h3>
            <p class="text-secondary mb-0">
                {{ $order->kode_order }}
            </p>
        </div>

        <a href="{{ route('customer.orders.index') }}"
           class="btn btn-outline-secondary">
            <i class="bi bi-arrow-left"></i> Kembali
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    @if($errors->any())
        <div class="alert alert-danger">
            <strong>Upload gagal:</strong>
            <ul class="mb-0 mt-2">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="row g-4">

        <div class="col-lg-6">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-header bg-white">
                    <strong>Informasi Pesanan</strong>
                </div>

                <div class="card-body">

                    <p class="text-secondary mb-1">Kode pesanan</p>
                    <p class="fw-semibold">{{ $order->kode_order }}</p>

                    <p class="text-secondary mb-1">Tanggal pesanan</p>
                    <p class="fw-semibold">
                        {{ \Carbon\Carbon::parse($order->created_at)->format('d-m-Y H:i') }}
                    </p>

                    <p class="text-secondary mb-1">Metode pembayaran</p>
                    <p class="fw-semibold">
                        {{ strtoupper($order->metode_bayar) }}
                    </p>

                    <p class="text-secondary mb-1">Status pesanan</p>

                    @if($order->status === 'menunggu_bayar')
                        <span class="badge bg-warning text-dark">
                            Menunggu Pembayaran
                        </span>
                    @elseif($order->status === 'dikemas')
                        <span class="badge bg-info text-dark">
                            Dikemas
                        </span>
                    @elseif($order->status === 'dikirim')
                        <span class="badge bg-primary">
                            Dikirim
                        </span>
                    @elseif($order->status === 'selesai')
                        <span class="badge bg-success">
                            Selesai
                        </span>
                    @elseif($order->status === 'ditolak')
                        <span class="badge bg-danger">
                            Ditolak
                        </span>
                    @else
                        <span class="badge bg-secondary">
                            {{ $order->status }}
                        </span>
                    @endif

                    <hr>

                    <p class="text-secondary mb-1">Subtotal</p>
                    <p>
                        Rp{{ number_format($order->subtotal, 0, ',', '.') }}
                    </p>

                    <p class="text-secondary mb-1">Ongkir</p>
                    <p>
                        Rp{{ number_format($order->ongkir, 0, ',', '.') }}
                    </p>

                    <p class="text-secondary mb-1">Diskon</p>
                    <p>
                        Rp{{ number_format($order->diskon, 0, ',', '.') }}
                    </p>

                    <hr>

                    <h5>
                        Total Pembayaran:
                        Rp{{ number_format($order->total, 0, ',', '.') }}
                    </h5>

                </div>
            </div>
        </div>

        <div class="col-lg-6">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-header bg-white">
                    <strong>Rincian Produk</strong>
                </div>

                <div class="card-body">

                    @foreach($items as $item)
                        <div class="d-flex justify-content-between gap-3 mb-3">
                            <div>
                                <strong>{{ $item->nama_produk }}</strong>

                                @if($item->varian)
                                    <div class="text-secondary small">
                                        Variasi: {{ $item->varian }}
                                    </div>
                                @endif

                                <div class="text-secondary small">
                                    {{ $item->qty }} x
                                    Rp{{ number_format($item->harga_satuan, 0, ',', '.') }}
                                </div>
                            </div>

                            <div class="text-end fw-semibold">
                                Rp{{ number_format($item->qty * $item->harga_satuan, 0, ',', '.') }}
                            </div>
                        </div>

                        <hr>
                    @endforeach

                </div>
            </div>
        </div>

    </div>

    {{-- Bagian upload bukti pembayaran --}}
    <div class="card border-0 shadow-sm mt-4">
        <div class="card-header bg-white">
            <strong>Bukti Pembayaran</strong>
        </div>

        <div class="card-body">

            @if($order->status === 'ditolak')

                <div class="alert alert-danger mb-0">
                    <h6 class="alert-heading">
                        <i class="bi bi-x-circle"></i>
                        Pesanan Ditolak
                    </h6>

                    Pesanan ini tidak lolos verifikasi admin.
                    Silakan buat pesanan baru jika masih ingin membeli produk.
                </div>

                <a href="{{ route('home') }}" class="btn btn-primary mt-3">
                    <i class="bi bi-cart"></i> Belanja Kembali
                </a>

            @elseif($order->status !== 'menunggu_bayar')

                <div class="alert alert-success mb-0">
                    Pesanan sudah diproses dengan status
                    <strong>{{ $order->status }}</strong>.
                    Upload bukti pembayaran sudah ditutup.
                </div>

                @if($order->bukti_bayar)
                    <div class="mt-3">
                        <p class="fw-semibold">Bukti pembayaran yang diunggah:</p>

                        <a href="{{ asset('storage/' . $order->bukti_bayar) }}"
                           target="_blank">
                            <img
                                src="{{ asset('storage/' . $order->bukti_bayar) }}"
                                alt="Bukti pembayaran"
                                class="img-fluid rounded border"
                                style="max-width: 350px;"
                            >
                        </a>
                    </div>
                @endif

            @elseif($order->metode_bayar === 'cod')

                <div class="alert alert-info mb-0">
                    Pesanan menggunakan metode COD.
                    Anda tidak perlu mengunggah bukti pembayaran.
                </div>

            @else

                @if($order->bukti_bayar)
                    <div class="alert alert-success">
                        Bukti pembayaran sudah diunggah.
                        Silakan menunggu pemeriksaan admin.
                    </div>

                    <p class="fw-semibold">Bukti pembayaran saat ini:</p>

                    <a href="{{ asset('storage/' . $order->bukti_bayar) }}"
                       target="_blank">
                        <img
                            src="{{ asset('storage/' . $order->bukti_bayar) }}"
                            alt="Bukti pembayaran"
                            class="img-fluid rounded border mb-3"
                            style="max-width: 350px;"
                        >
                    </a>

                    <p class="text-secondary small">
                        Jika ingin mengganti bukti sebelum diverifikasi,
                        pilih file baru di bawah ini.
                    </p>
                @else
                    <div class="alert alert-warning">
                        Silakan unggah bukti pembayaran agar admin dapat
                        memeriksa pesanan Anda.
                    </div>
                @endif

                <form action="{{ route('customer.orders.payment.upload', $order->id) }}"
                      method="POST"
                      enctype="multipart/form-data">

                    @csrf

                    <div class="mb-3">
                        <label for="bukti_bayar" class="form-label">
                            Pilih Bukti Pembayaran
                        </label>

                        <input
                            type="file"
                            name="bukti_bayar"
                            id="bukti_bayar"
                            class="form-control"
                            accept=".jpg,.jpeg,.png"
                            required
                        >

                        <div class="form-text">
                            Format JPG, JPEG, atau PNG. Maksimal 2 MB.
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary">
                        <i class="bi bi-upload"></i>
                        {{ $order->bukti_bayar ? 'Ganti Bukti Pembayaran' : 'Upload Bukti Pembayaran' }}
                    </button>

                </form>

            @endif

        </div>
    </div>

</div>

</body>
</html>
