<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Pesanan Berhasil - SportZone</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css" rel="stylesheet">
</head>

<body class="bg-light">

<div class="container py-5">

    <div class="card border-0 shadow-sm mx-auto"
         style="max-width: 700px;">

        <div class="card-body p-5 text-center">

            <i class="bi bi-check-circle-fill text-success"
               style="font-size: 75px;"></i>

            <h2 class="fw-bold mt-3">
                Pesanan Berhasil Dibuat!
            </h2>

            <p class="text-secondary">
                Terima kasih telah berbelanja di SportZone.
            </p>

            <hr>

            <div class="text-start">

                <p>
                    <strong>Kode Pesanan:</strong>
                    {{ $order->kode_order }}
                </p>

                <p>
                    <strong>Status:</strong>
                    <span class="badge bg-warning text-dark">
                        {{ str_replace('_', ' ', $order->status) }}
                    </span>
                </p>

                <p>
                    <strong>Metode Pembayaran:</strong>
                    {{ strtoupper($order->metode_bayar) }}
                </p>

                <p>
                    <strong>Total Pembayaran:</strong>
                    <span class="text-primary fw-bold">
                        Rp{{ number_format($order->total, 0, ',', '.') }}
                    </span>
                </p>

                <hr>

                <h5 class="fw-bold mb-3">
                    Rincian Produk
                </h5>

                @foreach($items as $item)

                    <div class="d-flex justify-content-between mb-3">

                        <div>
                            <strong>{{ $item->nama_produk }}</strong>

                            @if($item->varian)
                                <div class="text-secondary small">
                                    {{ $item->varian }}
                                </div>
                            @endif

                            <div class="text-secondary small">
                                Jumlah: {{ $item->qty }}
                            </div>
                        </div>

                        <strong>
                            Rp{{ number_format($item->harga_satuan * $item->qty, 0, ',', '.') }}
                        </strong>

                    </div>

                @endforeach

            </div>

            <hr>

            <a href="{{ route('home') }}"
               class="btn btn-primary w-100">
                Kembali ke Katalog
            </a>

        </div>

    </div>

</div>

</body>
</html>