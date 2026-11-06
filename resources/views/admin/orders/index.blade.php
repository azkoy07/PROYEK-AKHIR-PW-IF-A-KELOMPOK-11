
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola Pesanan - SportZone</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container py-4">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h3 class="mb-1">Kelola Pesanan</h3>
            <p class="text-secondary mb-0">Daftar seluruh pesanan pelanggan SportZone</p>
        </div>

        <a href="{{ route('admin.dashboard') }}" class="btn btn-outline-secondary">
            <i class="bi bi-arrow-left"></i> Dashboard
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

    <div class="card border-0 shadow-sm">
        <div class="card-body">

            <div class="table-responsive">
                <table class="table table-hover align-middle">
                    <thead class="table-light">
                        <tr>
                            <th>No.</th>
                            <th>Kode Pesanan</th>
                            <th>Pelanggan</th>
                            <th>Tanggal</th>
                            <th>Total</th>
                            <th>Metode Pembayaran</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse($orders as $order)
                            <tr>
                                <td>{{ $loop->iteration }}</td>

                                <td>
                                    <strong>{{ $order->kode_order }}</strong>
                                </td>

                                <td>
                                    {{ $order->nama_customer }}
                                    <br>
                                    <small class="text-secondary">
                                        {{ $order->email }}
                                    </small>
                                </td>

                                <td>
                                    {{ \Carbon\Carbon::parse($order->created_at)->format('d-m-Y H:i') }}
                                </td>

                                <td>
                                    Rp{{ number_format($order->total, 0, ',', '.') }}
                                </td>

                                <td>
                                    {{ strtoupper($order->metode_bayar) }}
                                </td>

                                <td>
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
                                </td>

                                <td>
                                    <a href="{{ route('admin.orders.show', $order->id) }}"
                                       class="btn btn-sm btn-primary">
                                        <i class="bi bi-eye"></i> Detail
                                    </a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="8" class="text-center text-secondary py-4">
                                    Belum ada pesanan.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

        </div>
    </div>

</div>

</body>
</html>
