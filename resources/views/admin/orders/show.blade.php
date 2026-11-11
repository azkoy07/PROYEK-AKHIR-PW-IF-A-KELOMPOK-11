
@extends('layouts.admin')

@section('title', 'Detail Pesanan - SportZone')
@section('page_title', 'Detail Pesanan')
@section('page_subtitle', 'Informasi lengkap dan pengelolaan pesanan pelanggan SportZone.')

@section('content')

    <!-- HEADER HALAMAN -->
    <div class="d-flex justify-content-between align-items-center gap-3 mb-4">

        <div>
            <h3 class="sz-dashboard-title">
                Pesanan {{ $order->kode_order }}
            </h3>

            <p class="sz-dashboard-description">
                Dibuat pada
                {{ \Carbon\Carbon::parse($order->created_at)->format('d/m/Y H:i') }} WIB
            </p>
        </div>

        <a href="{{ route('admin.orders.index') }}"
           class="btn btn-light border">
            <i class="bi bi-arrow-left me-1"></i>
            Kembali ke Pesanan
        </a>

    </div>

    <!-- NOTIFIKASI -->
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show">
            <i class="bi bi-check-circle me-2"></i>
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger alert-dismissible fade show">
            <i class="bi bi-exclamation-circle me-2"></i>
            {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    @if($errors->any())
        <div class="alert alert-danger">
            <div class="fw-semibold mb-1">
                <i class="bi bi-exclamation-circle me-1"></i>
                Terjadi kesalahan:
            </div>

            @foreach($errors->all() as $error)
                <div>{{ $error }}</div>
            @endforeach
        </div>
    @endif

    <!-- RINGKASAN PESANAN -->
    <div class="card mb-4">

        <div class="card-header bg-white p-4">

            <div class="d-flex justify-content-between align-items-center">

                <div>
                    <h5 class="sz-dashboard-section-title">
                        Informasi Pesanan
                    </h5>

                    <p class="sz-dashboard-section-description mb-0">
                        Ringkasan transaksi dan informasi pelanggan.
                    </p>
                </div>

                <div>
                    @if($order->status === 'menunggu_bayar')
                        <span class="badge bg-warning-subtle text-warning-emphasis px-3 py-2">
                            Menunggu Pembayaran
                        </span>
                    @elseif($order->status === 'dikemas')
                        <span class="badge bg-info-subtle text-info-emphasis px-3 py-2">
                            Dikemas
                        </span>
                    @elseif($order->status === 'dikirim')
                        <span class="badge bg-primary-subtle text-primary px-3 py-2">
                            Dikirim
                        </span>
                    @elseif($order->status === 'selesai')
                        <span class="badge bg-success-subtle text-success px-3 py-2">
                            Selesai
                        </span>
                    @elseif($order->status === 'ditolak')
                        <span class="badge bg-danger-subtle text-danger px-3 py-2">
                            Ditolak
                        </span>
                    @else
                        <span class="badge bg-secondary-subtle text-secondary px-3 py-2">
                            {{ $order->status }}
                        </span>
                    @endif
                </div>

            </div>

        </div>

        <div class="card-body p-4">

            <div class="row g-4">

                <div class="col-md-6">

                    <div class="mb-3">
                        <div class="text-secondary small mb-1">Kode Pesanan</div>
                        <div class="fw-semibold text-primary">
                            {{ $order->kode_order }}
                        </div>
                    </div>

                    <div class="mb-3">
                        <div class="text-secondary small mb-1">Tanggal Pesanan</div>
                        <div class="fw-semibold">
                            {{ \Carbon\Carbon::parse($order->created_at)->format('d-m-Y H:i') }}
                        </div>
                    </div>

                    <div>
                        <div class="text-secondary small mb-1">Metode Pembayaran</div>
                        <div class="fw-semibold">
                            {{ strtoupper($order->metode_bayar ?? '-') }}
                        </div>
                    </div>

                </div>

                <div class="col-md-6">

                    <div class="mb-3">
                        <div class="text-secondary small mb-1">Nama Pelanggan</div>
                        <div class="fw-semibold">
                            {{ $order->nama_customer }}
                        </div>
                    </div>

                    <div class="mb-3">
                        <div class="text-secondary small mb-1">Email</div>
                        <div class="fw-semibold">
                            {{ $order->email }}
                        </div>
                    </div>

                    <div>
                        <div class="text-secondary small mb-1">Status Pesanan</div>
                        <div class="fw-semibold">
                            {{ ucfirst(str_replace('_', ' ', $order->status)) }}
                        </div>
                    </div>

                </div>

            </div>

        </div>

    </div>

    <!-- ALAMAT PENGIRIMAN -->
    <div class="card mb-4">

        <div class="card-header bg-white p-4">
            <h5 class="sz-dashboard-section-title mb-0">
                <i class="bi bi-geo-alt text-primary me-2"></i>
                Alamat Pengiriman
            </h5>
        </div>

        <div class="card-body p-4">

            <div class="row g-4">

                <div class="col-md-6">

                    <div class="mb-3">
                        <div class="text-secondary small mb-1">Nama Penerima</div>
                        <div class="fw-semibold">
                            {{ $order->penerima ?? '-' }}
                        </div>
                    </div>

                    <div>
                        <div class="text-secondary small mb-1">Nomor HP</div>
                        <div class="fw-semibold">
                            {{ $order->no_hp ?? '-' }}
                        </div>
                    </div>

                </div>

                <div class="col-md-6">

                    <div class="mb-3">
                        <div class="text-secondary small mb-1">Kota</div>
                        <div class="fw-semibold">
                            {{ $order->kota ?? '-' }}
                        </div>
                    </div>

                    <div>
                        <div class="text-secondary small mb-1">Kode Pos</div>
                        <div class="fw-semibold">
                            {{ $order->kode_pos ?? '-' }}
                        </div>
                    </div>

                </div>

            </div>

            <div class="border-top pt-3 mt-3">
                <div class="text-secondary small mb-1">Alamat Lengkap</div>
                <div class="fw-semibold">
                    {{ $order->alamat_lengkap ?? '-' }}
                </div>
            </div>

        </div>

    </div>

    <!-- PRODUK YANG DIPESAN -->
    <div class="card mb-4">

        <div class="card-header bg-white p-4">

            <h5 class="sz-dashboard-section-title">
                <i class="bi bi-box-seam text-primary me-2"></i>
                Produk yang Dipesan
            </h5>

            <p class="sz-dashboard-section-description mb-0">
                Rincian produk dan jumlah pembelian pelanggan.
            </p>

        </div>

        <div class="card-body p-0">

            <div class="table-responsive">

                <table class="table table-hover mb-0">

                    <thead>
                        <tr>
                            <th class="ps-4">Nama Produk</th>
                            <th>Variasi</th>
                            <th>Harga Satuan</th>
                            <th>Jumlah</th>
                            <th>Subtotal</th>
                        </tr>
                    </thead>

                    <tbody>

                        @forelse($items as $item)

                            <tr>

                                <td class="ps-4 fw-semibold">
                                    {{ $item->nama_produk }}
                                </td>

                                <td>
                                    {{ $item->varian ?? '-' }}
                                </td>

                                <td class="text-nowrap">
                                    Rp{{ number_format($item->harga_satuan, 0, ',', '.') }}
                                </td>

                                <td>
                                    {{ $item->qty }}
                                </td>

                                <td class="fw-semibold text-nowrap">
                                    Rp{{ number_format($item->harga_satuan * $item->qty, 0, ',', '.') }}
                                </td>

                            </tr>

                        @empty

                            <tr>
                                <td colspan="5" class="text-center py-4 text-secondary">
                                    Tidak ada rincian produk.
                                </td>
                            </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>

        </div>

        <!-- RINGKASAN PEMBAYARAN -->
        <div class="card-body p-4">

            <div class="ms-auto" style="max-width: 430px;">

                <div class="d-flex justify-content-between mb-3">
                    <span class="text-secondary">Subtotal Produk</span>
                    <strong>
                        Rp{{ number_format($order->subtotal, 0, ',', '.') }}
                    </strong>
                </div>

                <div class="d-flex justify-content-between mb-3">
                    <span class="text-secondary">Diskon</span>
                    <strong>
                        Rp{{ number_format($order->diskon, 0, ',', '.') }}
                    </strong>
                </div>

                <div class="d-flex justify-content-between mb-3">
                    <span class="text-secondary">Ongkos Kirim</span>
                    <strong>
                        Rp{{ number_format($order->ongkir, 0, ',', '.') }}
                    </strong>
                </div>

                <div class="d-flex justify-content-between border-top pt-3">
                    <span class="fw-bold">Total Pembayaran</span>
                    <span class="fw-bold text-primary fs-5">
                        Rp{{ number_format($order->total, 0, ',', '.') }}
                    </span>
                </div>

            </div>

        </div>

    </div>

    <!-- BUKTI PEMBAYARAN -->
    <div class="card mb-4">

        <div class="card-header bg-white p-4">

            <h5 class="sz-dashboard-section-title">
                <i class="bi bi-receipt text-primary me-2"></i>
                Bukti Pembayaran
            </h5>

            <p class="sz-dashboard-section-description mb-0">
                Periksa bukti pembayaran yang diunggah pelanggan.
            </p>

        </div>

        <div class="card-body p-4">

            @if($order->bukti_bayar)

                <a href="{{ asset('storage/' . $order->bukti_bayar) }}"
                   target="_blank"
                   rel="noopener noreferrer">

                    <img src="{{ asset('storage/' . $order->bukti_bayar) }}"
                         alt="Bukti Pembayaran"
                         class="img-fluid rounded border"
                         style="max-width: 420px; max-height: 420px; object-fit: contain;">

                </a>

                <p class="text-secondary small mt-2 mb-0">
                    <i class="bi bi-zoom-in me-1"></i>
                    Klik gambar untuk melihat ukuran penuh.
                </p>

            @else

                <div class="text-center py-5 bg-light rounded">

                    <i class="bi bi-image fs-1 text-secondary d-block mb-2"></i>

                    <strong>Belum ada bukti pembayaran.</strong>

                    <p class="text-secondary small mb-0 mt-1">
                        Pelanggan belum mengunggah bukti pembayaran.
                    </p>

                </div>

            @endif

        </div>

    </div>

    <!-- VERIFIKASI PEMBAYARAN -->
    @if($order->status === 'menunggu_bayar')

        <div class="card mb-4">

            <div class="card-header bg-white p-4">

                <h5 class="sz-dashboard-section-title">
                    <i class="bi bi-shield-check text-primary me-2"></i>
                    Verifikasi Pesanan
                </h5>

                <p class="sz-dashboard-section-description mb-0">
                    Periksa pembayaran sebelum melanjutkan pesanan.
                </p>

            </div>

            <div class="card-body p-4">

                @if(in_array($order->metode_bayar, ['transfer', 'ewallet']) && !$order->bukti_bayar)

                    <div class="alert alert-warning mb-3">
                        <i class="bi bi-exclamation-triangle me-2"></i>
                        Bukti pembayaran belum tersedia. Verifikasi transfer atau e-wallet belum dapat dilakukan.
                    </div>

                @endif

                <div class="d-flex gap-2 flex-wrap">

                    <form action="{{ route('admin.orders.approve', $order->id) }}"
                          method="POST"
                          onsubmit="return confirm('Verifikasi pembayaran dan lanjutkan pesanan ke tahap pengemasan?')">

                        @csrf
                        @method('PATCH')

                        <button type="submit" class="btn btn-success px-3">
                            <i class="bi bi-check-circle me-1"></i>
                            Verifikasi Pembayaran
                        </button>

                    </form>

                    <form action="{{ route('admin.orders.reject', $order->id) }}"
                          method="POST"
                          onsubmit="return confirm('Yakin ingin menolak pesanan ini? Stok produk akan dikembalikan.')">

                        @csrf
                        @method('PATCH')

                        <button type="submit" class="btn btn-danger px-3">
                            <i class="bi bi-x-circle me-1"></i>
                            Tolak Pesanan
                        </button>

                    </form>

                </div>

            </div>

        </div>

    @endif

    <!-- PENGIRIMAN PESANAN -->
    @if($order->status === 'dikemas')

        <div class="card mb-4">

            <div class="card-header bg-white p-4">

                <h5 class="sz-dashboard-section-title">
                    <i class="bi bi-truck text-primary me-2"></i>
                    Pengiriman Pesanan
                </h5>

                <p class="sz-dashboard-section-description mb-0">
                    Masukkan nomor resi untuk memperbarui status pengiriman.
                </p>

            </div>

            <div class="card-body p-4">

                <form action="{{ route('admin.orders.ship', $order->id) }}"
                      method="POST">

                    @csrf
                    @method('PATCH')

                    <div class="mb-3" style="max-width: 520px;">

                        <label for="resi" class="form-label fw-semibold">
                            Nomor Resi Pengiriman
                        </label>

                        <input type="text"
                               name="resi"
                               id="resi"
                               class="form-control @error('resi') is-invalid @enderror"
                               value="{{ old('resi') }}"
                               placeholder="Masukkan nomor resi"
                               maxlength="50"
                               required>

                        @error('resi')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror

                    </div>

                    <button type="submit" class="btn btn-primary px-3">
                        <i class="bi bi-send me-1"></i>
                        Kirim Pesanan
                    </button>

                </form>

            </div>

        </div>

    @endif

    <!-- INFORMASI PENGIRIMAN -->
    @if(in_array($order->status, ['dikirim', 'selesai']))

        <div class="card mb-4">

            <div class="card-header bg-white p-4">

                <h5 class="sz-dashboard-section-title mb-0">
                    <i class="bi bi-truck text-primary me-2"></i>
                    Informasi Pengiriman
                </h5>

            </div>

            <div class="card-body p-4">

                <div class="mb-3">
                    <div class="text-secondary small mb-1">
                        Nomor Resi
                    </div>

                    <div class="fw-semibold">
                        {{ $order->resi ?? '-' }}
                    </div>
                </div>

                <div>
                    <div class="text-secondary small mb-1">
                        Status Pengiriman
                    </div>

                    <div class="fw-semibold">
                        {{ ucfirst($order->status) }}
                    </div>
                </div>

            </div>

        </div>

    @endif

    <!-- STATUS AKHIR -->
    @if($order->status === 'ditolak')

        <div class="alert alert-danger">
            <i class="bi bi-x-circle me-2"></i>
            Pesanan ini telah ditolak. Stok produk telah dikembalikan sesuai proses penolakan.
        </div>

    @elseif($order->status === 'selesai')

        <div class="alert alert-success">
            <i class="bi bi-check-circle me-2"></i>
            Pesanan telah selesai.
        </div>

    @endif

@endsection
