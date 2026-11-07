<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Pesanan Saya - SportZone</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

<div class="container py-5">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h3>Pesanan Saya</h3>

        <a href="/" class="btn btn-outline-secondary">
            Kembali Belanja
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

    @if($orders->count() > 0)

        <div class="card shadow-sm">
            <div class="card-body">

                <div class="table-responsive">

                    <table class="table table-bordered table-hover align-middle">

                        <thead class="table-light">
                            <tr>
                                <th>Kode Pesanan</th>
                                <th>Tanggal</th>
                                <th>Total</th>
                                <th>Metode Pembayaran</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>

                        <tbody>

                            @foreach($orders as $order)

                                <tr>

                                    <td>
                                        {{ $order->kode_order }}
                                    </td>

                                    <td>
                                        {{ $order->created_at }}
                                    </td>

                                    <td>
                                        Rp {{ number_format($order->total, 0, ',', '.') }}
                                    </td>

                                    <td>
                                        {{ strtoupper($order->metode_bayar) }}
                                    </td>

                                    <td>

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

                                    </td>

                                    <td>
                                        <a
                                            href="{{ route('customer.orders.show', $order->id) }}"
                                            class="btn btn-sm btn-primary"
                                        >
                                            Detail
                                        </a>
                                    </td>

                                </tr>

                            @endforeach

                        </tbody>

                    </table>

                </div>

            </div>
        </div>

    @else

        <div class="card shadow-sm">
            <div class="card-body text-center py-5">

                <h5>Belum Ada Pesanan</h5>

                <p class="text-muted">
                    Kamu belum memiliki riwayat pesanan.
                </p>

                <a href="/" class="btn btn-primary">
                    Mulai Belanja
                </a>

            </div>
        </div>

    @endif

</div>

</body>
</html>
