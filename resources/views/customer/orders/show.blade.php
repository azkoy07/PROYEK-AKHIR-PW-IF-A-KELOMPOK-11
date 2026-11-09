
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Detail Pesanan - SportZone</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        .timeline {
            position: relative;
            padding-left: 30px;
        }

        .timeline-item {
            position: relative;
            padding-bottom: 25px;
            border-left: 2px solid #dee2e6;
            padding-left: 25px;
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
            background: #0d6efd;
            border: 3px solid #cfe2ff;
        }

        .timeline-item:last-child .timeline-dot {
            background: #198754;
            border-color: #d1e7dd;
        }
    </style>
</head>

<body class="bg-light">

<div class="container py-5">

    {{-- Header --}}
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h3>Detail Pesanan</h3>

        <a href="{{ route('customer.orders.index') }}"
           class="btn btn-outline-secondary">
            Kembali
        </a>
    </div>

    {{-- Notifikasi --}}
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
            @foreach($errors->all() as $error)
                <div>{{ $error }}</div>
            @endforeach
        </div>
    @endif

    {{-- Informasi Pesanan --}}
    <div class="card shadow-sm mb-4">

        <div class="card-header">
            <h5 class="mb-0">Informasi Pesanan</h5>
        </div>

        <div class="card-body">

            <p>
                <strong>Kode Pesanan:</strong>
                {{ $order->kode_order }}
            </p>

            <p>
                <strong>Tanggal Pesanan:</strong>
                {{ $order->created_at }}
            </p>

            <p>
                <strong>Metode Pembayaran:</strong>
                {{ strtoupper($order->metode_bayar) }}
            </p>

            <p>
                <strong>Status Pesanan:</strong>

                @if($order->status == 'menunggu_bayar')
                    <span class="badge bg-warning text-dark">
                        Menunggu Pembayaran
                    </span>

                @elseif($order->status == 'dikemas')
                    <span class="badge bg-info text-dark">
                        Dikemas
                    </span>

                @elseif($order->status == 'dikirim')
                    <span class="badge bg-primary">
                        Dikirim
                    </span>

                @elseif($order->status == 'selesai')
                    <span class="badge bg-success">
                        Selesai
                    </span>

                @elseif($order->status == 'ditolak')
                    <span class="badge bg-danger">
                        Ditolak
                    </span>

                @else
                    <span class="badge bg-secondary">
                        {{ $order->status }}
                    </span>
                @endif
            </p>

        </div>
    </div>

    {{-- Riwayat Status Pesanan --}}
    <div class="card shadow-sm mb-4">

        <div class="card-header">
            <h5 class="mb-0">Riwayat Status Pesanan</h5>
        </div>

        <div class="card-body">

            @if($riwayatStatus->count() > 0)

                <div class="timeline">

                    @foreach($riwayatStatus as $riwayat)

                        <div class="timeline-item">

                            <div class="timeline-dot"></div>

                            <h6 class="fw-bold mb-1">

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

                            <small class="text-muted">
                                {{ \Carbon\Carbon::parse($riwayat->created_at)->format('d-m-Y H:i') }}
                            </small>

                        </div>

                    @endforeach

                </div>

            @else

                <p class="text-muted mb-0">
                    Belum ada riwayat perubahan status pesanan.
                </p>

            @endif

        </div>
    </div>

    {{-- Daftar Produk --}}
    <div class="card shadow-sm mb-4">

        <div class="card-header">
            <h5 class="mb-0">Produk yang Dipesan</h5>
        </div>

        <div class="card-body">

            <div class="table-responsive">

                <table class="table table-bordered align-middle">

                    <thead class="table-light">
                        <tr>
                            <th>Nama Produk</th>
                            <th>Variasi</th>
                            <th>Harga</th>
                            <th>Jumlah</th>
                            <th>Subtotal</th>
                        </tr>
                    </thead>

                    <tbody>

                        @foreach($items as $item)

                            <tr>
                                <td>{{ $item->nama_produk }}</td>

                                <td>{{ $item->varian ?? '-' }}</td>

                                <td>
                                    Rp {{ number_format($item->harga_satuan, 0, ',', '.') }}
                                </td>

                                <td>{{ $item->qty }}</td>

                                <td>
                                    Rp {{ number_format($item->harga_satuan * $item->qty, 0, ',', '.') }}
                                </td>
                            </tr>

                        @endforeach

                    </tbody>

                </table>

            </div>

            <div class="text-end">

                <p>
                    Subtotal:
                    Rp {{ number_format($order->subtotal, 0, ',', '.') }}
                </p>

                <p>
                    Diskon:
                    Rp {{ number_format($order->diskon ?? 0, 0, ',', '.') }}
                </p>

                <p>
                    Ongkir:
                    Rp {{ number_format($order->ongkir ?? 0, 0, ',', '.') }}
                </p>

                <h5>
                    Total:
                    Rp {{ number_format($order->total, 0, ',', '.') }}
                </h5>

            </div>

        </div>
    </div>

    {{-- Bukti Pembayaran --}}
    @if($order->bukti_bayar)

        <div class="card shadow-sm mb-4">

            <div class="card-header">
                <h5 class="mb-0">Bukti Pembayaran</h5>
            </div>

            <div class="card-body">

                <img
                    src="{{ asset('storage/' . $order->bukti_bayar) }}"
                    alt="Bukti Pembayaran"
                    class="img-fluid rounded"
                    style="max-width: 400px;"
                >

            </div>

        </div>

    @endif

    {{-- Upload Bukti Pembayaran --}}
    @if(
        $order->status == 'menunggu_bayar'
        && in_array($order->metode_bayar, ['transfer', 'ewallet'])
    )

        <div class="card shadow-sm mb-4">

            <div class="card-header">
                <h5 class="mb-0">Upload Bukti Pembayaran</h5>
            </div>

            <div class="card-body">

                <p class="text-muted">
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

                    </div>

                    <button type="submit" class="btn btn-primary">
                        Upload Bukti Pembayaran
                    </button>

                </form>

            </div>

        </div>

    @endif

    {{-- Informasi COD --}}
    @if(
        $order->status == 'menunggu_bayar'
        && $order->metode_bayar == 'cod'
    )

        <div class="alert alert-info">
            Pesanan menggunakan metode COD. Silakan menunggu proses verifikasi dari admin.
        </div>

    @endif

    {{-- Informasi Pengemasan --}}
    @if($order->status == 'dikemas')

        <div class="alert alert-info">
            Pembayaran telah diverifikasi. Pesanan sedang disiapkan oleh admin sebelum dikirim.
        </div>

    @endif

    {{-- Informasi Pengiriman --}}
    @if(in_array($order->status, ['dikirim', 'selesai']))

        <div class="card shadow-sm mb-4">

            <div class="card-header">
                <h5 class="mb-0">Informasi Pengiriman</h5>
            </div>

            <div class="card-body">

                <p>
                    <strong>Status Pengiriman:</strong>
                    {{ ucfirst($order->status) }}
                </p>

                <p>
                    <strong>Nomor Resi:</strong>
                    {{ $order->resi ?? 'Belum tersedia' }}
                </p>

                @if($order->status == 'dikirim')

                    <p class="text-muted mb-0">
                        Pesanan sedang dalam proses pengiriman.
                    </p>

                @else

                    <div class="alert alert-success mb-0">
                        Pesanan telah dikonfirmasi diterima.
                    </div>

                @endif

            </div>

        </div>

    @endif

    {{-- Konfirmasi Pesanan Diterima --}}
    @if($order->status == 'dikirim')

        <div class="card shadow-sm mb-4">

            <div class="card-body">

                <h5>Konfirmasi Penerimaan Pesanan</h5>

                <p class="text-muted">
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
                        Pesanan Diterima
                    </button>

                </form>

            </div>

        </div>

    @endif

    {{-- Rating dan Ulasan Produk --}}
    @if($order->status == 'selesai')

        <div class="card shadow-sm mb-4">

            <div class="card-header">
                <h5 class="mb-0">Ulasan dan Rating Produk</h5>
            </div>

            <div class="card-body">

                <p class="text-muted">
                    Berikan penilaian terhadap produk yang sudah kamu terima.
                </p>

                @foreach($items->unique('product_id') as $item)

                    <div class="border rounded p-3 mb-3">

                        <h6>{{ $item->nama_produk }}</h6>

                        <div class="mb-3">

                            <a
                                href="{{ route('products.reviews.index', $item->product_id) }}"
                                class="text-decoration-none"
                            >
                                Lihat ulasan produk
                            </a>

                        </div>

                        @if(in_array($item->product_id, $reviewedProductIds))

                            <span class="badge bg-success">
                                Sudah Diulas
                            </span>

                            <p class="text-muted mt-2 mb-0">
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
                                        placeholder="Tuliskan pendapatmu tentang produk ini..."
                                    >{{ old('komentar') }}</textarea>

                                </div>

                                <button type="submit" class="btn btn-primary">
                                    Kirim Ulasan
                                </button>

                            </form>

                        @endif

                    </div>

                @endforeach

            </div>

        </div>

    @endif

    {{-- Informasi Pesanan Ditolak --}}
    @if($order->status == 'ditolak')

        <div class="alert alert-danger">
            Pesanan ini telah ditolak oleh admin.
            Silakan kembali ke halaman belanja apabila ingin membuat pesanan baru.
        </div>

        <a href="/" class="btn btn-primary">
            Belanja Kembali
        </a>

    @endif

</div>

</body>
</html>
