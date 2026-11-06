
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Pesanan - SportZone</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

<div class="container py-5">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h3>Detail Pesanan</h3>

        <a href="{{ route('admin.orders.index') }}"
           class="btn btn-secondary">
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
    <div class="card mb-4">
        <div class="card-header">
            <h5 class="mb-0">Informasi Pesanan</h5>
        </div>

        <div class="card-body">

            <p>
                <strong>Kode Pesanan:</strong>
                {{ $order->kode_order }}
            </p>

            <p>
                <strong>Tanggal:</strong>
                {{ $order->created_at }}
            </p>

            <p>
                <strong>Status:</strong>

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
                @endif
            </p>

            <p>
                <strong>Metode Pembayaran:</strong>
                {{ strtoupper($order->metode_bayar) }}
            </p>

            <p>
                <strong>Total:</strong>
                Rp {{ number_format($order->total, 0, ',', '.') }}
            </p>

        </div>
    </div>

    {{-- Informasi Customer --}}
    <div class="card mb-4">
        <div class="card-header">
            <h5 class="mb-0">Informasi Customer</h5>
        </div>

        <div class="card-body">

            <p>
                <strong>Nama:</strong>
                {{ $order->nama_customer }}
            </p>

            <p>
                <strong>Email:</strong>
                {{ $order->email }}
            </p>

            <p>
                <strong>Penerima:</strong>
                {{ $order->penerima ?? '-' }}
            </p>

            <p>
                <strong>No. HP:</strong>
                {{ $order->no_hp ?? '-' }}
            </p>

            <p>
                <strong>Alamat:</strong>
                {{ $order->alamat_lengkap ?? '-' }}
            </p>

            <p>
                <strong>Kota:</strong>
                {{ $order->kota ?? '-' }}
            </p>

            <p>
                <strong>Kode Pos:</strong>
                {{ $order->kode_pos ?? '-' }}
            </p>

        </div>
    </div>

    {{-- Daftar Produk --}}
    <div class="card mb-4">
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
                    Rp {{ number_format($order->diskon, 0, ',', '.') }}
                </p>

                <p>
                    Ongkir:
                    Rp {{ number_format($order->ongkir, 0, ',', '.') }}
                </p>

                <h5>
                    Total:
                    Rp {{ number_format($order->total, 0, ',', '.') }}
                </h5>
            </div>

        </div>
    </div>

    {{-- Bukti Pembayaran --}}
    <div class="card mb-4">
        <div class="card-header">
            <h5 class="mb-0">Bukti Pembayaran</h5>
        </div>

        <div class="card-body">

            @if($order->bukti_bayar)

                <img
                    src="{{ asset('storage/' . $order->bukti_bayar) }}"
                    alt="Bukti Pembayaran"
                    class="img-fluid rounded"
                    style="max-width: 400px;"
                >

            @else

                <p class="text-muted mb-0">
                    Belum ada bukti pembayaran.
                </p>

            @endif

        </div>
    </div>

    {{-- Verifikasi dan Penolakan --}}
    @if($order->status == 'menunggu_bayar')

        <div class="card mb-4">
            <div class="card-header">
                <h5 class="mb-0">Verifikasi Pesanan</h5>
            </div>

            <div class="card-body">

                <div class="d-flex gap-2 flex-wrap">

                    <form
                        action="{{ route('admin.orders.approve', $order->id) }}"
                        method="POST"
                        onsubmit="return confirm('Verifikasi pembayaran dan lanjutkan pesanan?')"
                    >
                        @csrf
                        @method('PATCH')

                        <button type="submit" class="btn btn-success">
                            Verifikasi Pembayaran
                        </button>
                    </form>

                    <form
                        action="{{ route('admin.orders.reject', $order->id) }}"
                        method="POST"
                        onsubmit="return confirm('Yakin ingin menolak pesanan ini?')"
                    >
                        @csrf
                        @method('PATCH')

                        <button type="submit" class="btn btn-danger">
                            Tolak Pesanan
                        </button>
                    </form>

                </div>

            </div>
        </div>

    @endif

    {{-- Pengiriman Pesanan --}}
    @if($order->status == 'dikemas')

        <div class="card mb-4">
            <div class="card-header">
                <h5 class="mb-0">Pengiriman Pesanan</h5>
            </div>

            <div class="card-body">

                <form
                    action="{{ route('admin.orders.ship', $order->id) }}"
                    method="POST"
                >

                    @csrf
                    @method('PATCH')

                    <div class="mb-3">

                        <label for="resi" class="form-label">
                            Nomor Resi Pengiriman
                        </label>

                        <input
                            type="text"
                            name="resi"
                            id="resi"
                            class="form-control"
                            value="{{ old('resi') }}"
                            placeholder="Masukkan nomor resi"
                            maxlength="50"
                            required
                        >

                    </div>

                    <button type="submit" class="btn btn-primary">
                        Kirim Pesanan
                    </button>

                </form>

            </div>
        </div>

    @endif

    {{-- Informasi Pengiriman --}}
    @if(in_array($order->status, ['dikirim', 'selesai']))

        <div class="card mb-4">
            <div class="card-header">
                <h5 class="mb-0">Informasi Pengiriman</h5>
            </div>

            <div class="card-body">

                <p>
                    <strong>Nomor Resi:</strong>
                    {{ $order->resi ?? '-' }}
                </p>

                <p>
                    <strong>Status:</strong>
                    {{ ucfirst($order->status) }}
                </p>

            </div>
        </div>

    @endif

</div>

</body>
</html>
