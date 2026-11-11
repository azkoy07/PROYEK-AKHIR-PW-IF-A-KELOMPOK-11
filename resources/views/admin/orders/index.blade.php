
@extends('layouts.admin')

@section('title', 'Kelola Pesanan - SportZone')
@section('page_title', 'Kelola Pesanan')
@section('page_subtitle', 'Pantau dan kelola seluruh pesanan pelanggan SportZone.')

@section('content')

    <!-- HEADER HALAMAN -->
    <div class="mb-4">
        <h3 class="sz-dashboard-title">Daftar Pesanan</h3>
        <p class="sz-dashboard-description">
            Pantau transaksi, pembayaran, dan status pesanan pelanggan.
        </p>
    </div>

    <!-- DAFTAR PESANAN -->
    <div class="card">

        <div class="card-header bg-white p-4">

            <div class="d-flex justify-content-between align-items-center">

                <div>
                    <h5 class="sz-dashboard-section-title">
                        Informasi Pesanan
                    </h5>

                    <p class="sz-dashboard-section-description">
                        Daftar seluruh pesanan yang masuk ke toko SportZone.
                    </p>
                </div>

                <span class="badge bg-primary-subtle text-primary px-3 py-2">
                    {{ $orders->count() }} pesanan
                </span>

            </div>

        </div>

        <div class="card-body p-0">

            <div class="table-responsive">

                <table class="table table-hover mb-0">

                    <thead>
                        <tr>
                            <th class="ps-4" width="60">No.</th>
                            <th>Kode Pesanan</th>
                            <th>Pelanggan</th>
                            <th>Tanggal</th>
                            <th>Total</th>
                            <th>Metode Bayar</th>
                            <th>Status</th>
                            <th width="120">Aksi</th>
                        </tr>
                    </thead>

                    <tbody>

                        @forelse($orders as $order)

                            <tr>

                                <td class="ps-4 text-secondary">
                                    {{ $loop->iteration }}
                                </td>

                                <td>
                                    <span class="fw-semibold text-primary">
                                        {{ $order->kode_order }}
                                    </span>
                                </td>

                                <td>
                                    <div class="fw-semibold text-dark">
                                        {{ $order->nama_customer }}
                                    </div>

                                    <div class="text-secondary small">
                                        {{ $order->email }}
                                    </div>
                                </td>

                                <td class="text-nowrap">
                                    {{ \Carbon\Carbon::parse($order->created_at)->format('d/m/Y') }}

                                    <div class="text-secondary small">
                                        {{ \Carbon\Carbon::parse($order->created_at)->format('H:i') }} WIB
                                    </div>
                                </td>

                                <td class="fw-semibold text-dark text-nowrap">
                                    Rp{{ number_format($order->total, 0, ',', '.') }}
                                </td>

                                <td>
                                    {{ strtoupper($order->metode_bayar ?? '-') }}
                                </td>

                                <td>

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

                                </td>

                                <td>
                                    <a href="{{ route('admin.orders.show', $order->id) }}"
                                       class="btn btn-sm btn-outline-primary"
                                       title="Lihat detail pesanan">

                                        <i class="bi bi-eye me-1"></i>
                                        Detail

                                    </a>
                                </td>

                            </tr>

                        @empty

                            <tr>
                                <td colspan="8" class="text-center py-5">

                                    <i class="bi bi-receipt fs-2 text-secondary d-block mb-2"></i>

                                    <span class="fw-semibold">
                                        Belum ada pesanan.
                                    </span>

                                    <p class="text-secondary small mb-0 mt-1">
                                        Pesanan pelanggan akan muncul di halaman ini.
                                    </p>

                                </td>
                            </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>

        </div>

    </div>

@endsection
