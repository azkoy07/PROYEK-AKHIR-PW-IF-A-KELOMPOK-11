
@extends('layouts.admin')

@section('title', 'Laporan Penjualan - SportZone')
@section('page_title', 'Laporan Penjualan')
@section('page_subtitle', 'Ringkasan dan analisis penjualan SportZone berdasarkan periode.')

@section('content')

@php
    $grafikHarian = $laporanHarian->reverse()->values();

    $grafikTanggal = $grafikHarian->map(function ($item) {
        return \Carbon\Carbon::parse($item->tanggal)->format('d/m/Y');
    })->values();

    $grafikOmzet = $grafikHarian->map(function ($item) {
        return (float) $item->omzet;
    })->values();

    $grafikPesanan = $grafikHarian->map(function ($item) {
        return (int) $item->jumlah_pesanan;
    })->values();

    $grafikItem = $grafikHarian->map(function ($item) {
        return (int) $item->item_terjual;
    })->values();

    $grafikNamaKategori = $laporanKategori->pluck('nama_kategori')->values();

    $grafikOmzetKategori = $laporanKategori->map(function ($item) {
        return (float) $item->omzet;
    })->values();
@endphp

<style>
    .report-page {
        width: 100%;
        color: #1e293b;
        font-size: 13px;
    }

    .report-page .report-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        gap: 20px;
        margin-bottom: 24px;
    }

    .report-heading {
        display: flex;
        align-items: center;
        gap: 14px;
    }

    .report-heading-icon {
        width: 48px;
        height: 48px;
        border-radius: 13px;
        display: flex;
        align-items: center;
        justify-content: center;
        background: #eaf1ff;
        color: #2563eb;
        font-size: 22px;
        flex-shrink: 0;
    }

    .report-heading h3 {
        color: #172033;
        font-size: 19px;
        font-weight: 800;
        margin-bottom: 4px;
        letter-spacing: -.4px;
    }

    .report-heading p {
        color: #64748b;
        margin: 0;
        font-size: 12px;
    }

    .report-header-actions {
        display: flex;
        align-items: center;
        gap: 8px;
    }

    .report-page .btn-sz-primary {
        background: #2563eb;
        color: #fff;
        border: 1px solid #2563eb;
        border-radius: 8px;
        padding: 9px 14px;
        font-size: 12px;
        font-weight: 600;
        transition: .2s;
    }

    .report-page .btn-sz-primary:hover {
        background: #1d4ed8;
        border-color: #1d4ed8;
        color: #fff;
    }

    .report-page .btn-sz-outline {
        background: #fff;
        color: #172033;
        border: 1px solid #e2e8f0;
        border-radius: 8px;
        padding: 9px 14px;
        font-size: 12px;
        font-weight: 600;
        transition: .2s;
    }

    .report-page .btn-sz-outline:hover {
        background: #f8fafc;
        border-color: #cbd5e1;
        color: #172033;
    }

    .report-card,
    .chart-main-card {
        background: #fff;
        border: 1px solid #e8edf4;
        border-radius: 12px;
        box-shadow: 0 2px 8px rgba(15, 23, 42, .025);
    }

    .report-card-body {
        padding: 21px;
    }

    .section-title {
        color: #172033;
        font-size: 14px;
        font-weight: 700;
        margin-bottom: 5px;
    }

    .section-description {
        color: #64748b;
        font-size: 11px;
        margin-bottom: 0;
    }

    .filter-label {
        display: block;
        color: #475569;
        font-size: 11px;
        font-weight: 600;
        margin-bottom: 7px;
    }

    .report-page .form-control {
        min-height: 40px;
        border: 1px solid #dfe5ed;
        border-radius: 7px;
        padding: 8px 11px;
        font-size: 12px;
        color: #1e293b;
        box-shadow: none;
    }

    .report-page .form-control:focus {
        border-color: #2563eb;
        box-shadow: 0 0 0 3px rgba(37, 99, 235, .09);
    }

    .summary-card {
        height: 100%;
        transition: .2s;
    }

    .summary-card:hover {
        transform: translateY(-2px);
        box-shadow: 0 6px 16px rgba(15, 23, 42, .05);
    }

    .summary-label {
        color: #64748b;
        font-size: 11px;
        font-weight: 600;
        margin-bottom: 9px;
    }

    .summary-value {
        color: #172033;
        font-size: 23px;
        font-weight: 800;
        letter-spacing: -.5px;
        margin: 0;
        overflow-wrap: anywhere;
    }

    .summary-icon {
        width: 44px;
        height: 44px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 11px;
        font-size: 19px;
    }

    .summary-icon.blue {
        color: #2563eb;
        background: #eaf1ff;
    }

    .summary-icon.green {
        color: #059669;
        background: #e8f8f1;
    }

    .summary-icon.orange {
        color: #d97706;
        background: #fff5e6;
    }

    .chart-card {
        height: 100%;
        border: 1px solid #e8edf4;
        border-radius: 10px;
        background: #fff;
    }

    .chart-container {
        position: relative;
        height: 260px;
        width: 100%;
    }

    .chart-title {
        color: #172033;
        font-size: 12px;
        font-weight: 700;
        margin-bottom: 17px;
    }

    .chart-label {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        background: #eff6ff;
        color: #2563eb;
        border-radius: 20px;
        padding: 6px 10px;
        font-size: 10px;
        font-weight: 600;
        white-space: nowrap;
    }

    .table-section-heading {
        display: flex;
        justify-content: space-between;
        align-items: center;
        gap: 15px;
        margin-bottom: 18px;
    }

    .table-section-icon {
        width: 36px;
        height: 36px;
        display: flex;
        align-items: center;
        justify-content: center;
        background: #eff6ff;
        color: #2563eb;
        border-radius: 9px;
        font-size: 16px;
        flex-shrink: 0;
    }

    .report-table {
        margin-bottom: 0;
        border-collapse: separate;
        border-spacing: 0;
    }

    .report-table thead th {
        background: #f8fafc;
        color: #64748b;
        border-top: 1px solid #e8edf4;
        border-bottom: 1px solid #e8edf4;
        padding: 13px 15px;
        font-size: 10px;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: .3px;
        white-space: nowrap;
    }

    .report-table tbody td {
        color: #334155;
        padding: 14px 15px;
        border-bottom: 1px solid #edf1f6;
        font-size: 12px;
        vertical-align: middle;
    }

    .report-table tbody tr:last-child td {
        border-bottom: none;
    }

    .report-table tbody tr:hover td {
        background: #fafcff;
    }

    .table-number {
        color: #94a3b8 !important;
        font-weight: 600;
    }

    .table-amount {
        color: #172033 !important;
        font-weight: 700;
        white-space: nowrap;
    }

    .table-date {
        font-weight: 600;
        color: #475569 !important;
        white-space: nowrap;
    }

    .table-empty {
        text-align: center;
        padding: 35px 15px !important;
        color: #94a3b8 !important;
    }

    .table-footer-note {
        color: #64748b;
        font-size: 10px;
        margin-top: 14px;
        margin-bottom: 0;
    }

    @media print {
        body {
            background: #fff !important;
        }

        .admin-sidebar,
        .admin-topbar,
        .report-header-actions,
        .filter-card,
        .report-footer {
            display: none !important;
        }

        .admin-main {
            margin-left: 0 !important;
        }

        .report-page {
            padding: 0 !important;
        }

        .report-card,
        .chart-main-card {
            box-shadow: none !important;
            break-inside: avoid;
        }

        #panelGrafik {
            display: block !important;
            height: auto !important;
            visibility: visible !important;
        }

        .chart-container {
            height: 220px;
        }
    }
</style>

<div class="report-page">

    {{-- Header --}}
    <div class="report-header">

        <div class="report-heading">
            <div class="report-heading-icon">
                <i class="bi bi-bar-chart-line"></i>
            </div>

            <div>
                <h3>Laporan Penjualan</h3>
                <p>Ringkasan dan analisis penjualan SportZone</p>
            </div>
        </div>

        <div class="report-header-actions">

            <button
                class="btn btn-sz-primary"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#panelGrafik"
                aria-expanded="false"
                aria-controls="panelGrafik"
                id="tombolGrafik">

                <i class="bi bi-bar-chart-line me-1" id="ikonGrafik"></i>
                <span id="teksGrafik">Lihat Grafik</span>
            </button>

            <button
                type="button"
                class="btn btn-sz-outline"
                onclick="window.print()">

                <i class="bi bi-printer me-1"></i>
                Cetak
            </button>

        </div>

    </div>

    {{-- Filter Periode --}}
    <div class="report-card filter-card mb-4">

        <div class="report-card-body">

            <div class="d-flex align-items-center gap-2 mb-4">

                <div class="table-section-icon">
                    <i class="bi bi-funnel"></i>
                </div>

                <div>
                    <h6 class="section-title">Filter Periode Laporan</h6>
                    <p class="section-description">
                        Tentukan rentang tanggal untuk melihat data penjualan.
                    </p>
                </div>

            </div>

            <form action="{{ route('admin.reports.index') }}" method="GET">

                <div class="row g-3 align-items-end">

                    <div class="col-md-4">
                        <label class="filter-label">Tanggal Mulai</label>

                        <input
                            type="date"
                            name="tanggal_mulai"
                            class="form-control"
                            value="{{ $tanggalMulai }}"
                            required>
                    </div>

                    <div class="col-md-4">
                        <label class="filter-label">Tanggal Akhir</label>

                        <input
                            type="date"
                            name="tanggal_akhir"
                            class="form-control"
                            value="{{ $tanggalAkhir }}"
                            min="{{ $tanggalMulai }}"
                            required>
                    </div>

                    <div class="col-md-4 d-flex gap-2">

                        <button type="submit" class="btn btn-sz-primary">
                            <i class="bi bi-search me-1"></i>
                            Tampilkan Laporan
                        </button>

                        <a
                            href="{{ route('admin.reports.index') }}"
                            class="btn btn-sz-outline">

                            <i class="bi bi-arrow-counterclockwise me-1"></i>
                            Reset
                        </a>

                    </div>

                </div>

            </form>

        </div>

    </div>

    {{-- Ringkasan --}}
    <div class="row g-3 mb-4">

        <div class="col-md-4">
            <div class="report-card summary-card">
                <div class="report-card-body">

                    <div class="d-flex justify-content-between align-items-center">

                        <div>
                            <p class="summary-label">Total Pesanan</p>

                            <h3 class="summary-value">
                                {{ number_format($ringkasan->total_pesanan, 0, ',', '.') }}
                            </h3>
                        </div>

                        <div class="summary-icon blue">
                            <i class="bi bi-receipt"></i>
                        </div>

                    </div>

                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="report-card summary-card">
                <div class="report-card-body">

                    <div class="d-flex justify-content-between align-items-center">

                        <div>
                            <p class="summary-label">Item Terjual</p>

                            <h3 class="summary-value">
                                {{ number_format($ringkasan->total_item, 0, ',', '.') }}
                            </h3>
                        </div>

                        <div class="summary-icon green">
                            <i class="bi bi-box-seam"></i>
                        </div>

                    </div>

                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="report-card summary-card">
                <div class="report-card-body">

                    <div class="d-flex justify-content-between align-items-center">

                        <div>
                            <p class="summary-label">Total Omzet</p>

                            <h3 class="summary-value">
                                Rp{{ number_format($ringkasan->total_omzet, 0, ',', '.') }}
                            </h3>
                        </div>

                        <div class="summary-icon orange">
                            <i class="bi bi-wallet2"></i>
                        </div>

                    </div>

                </div>
            </div>
        </div>

    </div>

    {{-- Grafik --}}
    <div class="collapse mb-4" id="panelGrafik">

        <div class="chart-main-card">

            <div class="report-card-body">

                <div class="d-flex justify-content-between align-items-center mb-4">

                    <div>
                        <h5 class="section-title mb-1">
                            <i class="bi bi-graph-up-arrow text-primary me-1"></i>
                            Grafik Analisis Penjualan
                        </h5>

                        <p class="section-description">
                            Visualisasi data berdasarkan periode laporan yang dipilih.
                        </p>
                    </div>

                    <span class="chart-label">
                        <i class="bi bi-calendar-range"></i>
                        Periode Terpilih
                    </span>

                </div>

                <div class="row g-3">

                    {{-- Grafik Omzet --}}
                    <div class="col-lg-6">
                        <div class="chart-card">
                            <div class="report-card-body">

                                <h6 class="chart-title">
                                    <i class="bi bi-graph-up text-primary me-1"></i>
                                    Omzet Penjualan Harian
                                </h6>

                                @if($grafikTanggal->isEmpty())

                                    <div class="text-center text-secondary py-5">
                                        <i class="bi bi-bar-chart fs-2"></i>
                                        <p class="mb-0 mt-2">Belum ada data omzet.</p>
                                    </div>

                                @else

                                    <div class="chart-container">
                                        <canvas id="grafikOmzet"></canvas>
                                    </div>

                                @endif

                            </div>
                        </div>
                    </div>

                    {{-- Grafik Pesanan --}}
                    <div class="col-lg-6">
                        <div class="chart-card">
                            <div class="report-card-body">

                                <h6 class="chart-title">
                                    <i class="bi bi-bar-chart text-primary me-1"></i>
                                    Pesanan dan Item Terjual
                                </h6>

                                @if($grafikTanggal->isEmpty())

                                    <div class="text-center text-secondary py-5">
                                        <i class="bi bi-bar-chart fs-2"></i>
                                        <p class="mb-0 mt-2">Belum ada data pesanan.</p>
                                    </div>

                                @else

                                    <div class="chart-container">
                                        <canvas id="grafikPesanan"></canvas>
                                    </div>

                                @endif

                            </div>
                        </div>
                    </div>

                    {{-- Grafik Kategori --}}
                    <div class="col-lg-6">
                        <div class="chart-card">
                            <div class="report-card-body">

                                <h6 class="chart-title">
                                    <i class="bi bi-tags text-primary me-1"></i>
                                    Omzet Berdasarkan Kategori
                                </h6>

                                @if($grafikNamaKategori->isEmpty())

                                    <div class="text-center text-secondary py-5">
                                        <i class="bi bi-tags fs-2"></i>
                                        <p class="mb-0 mt-2">Belum ada data penjualan kategori.</p>
                                    </div>

                                @else

                                    <div class="chart-container">
                                        <canvas id="grafikKategori"></canvas>
                                    </div>

                                @endif

                            </div>
                        </div>
                    </div>

                </div>

            </div>

        </div>

    </div>

    {{-- Tabel Harian --}}
    <div class="report-card mb-4">

        <div class="report-card-body">

            <div class="table-section-heading">

                <div class="d-flex align-items-center gap-3">

                    <div class="table-section-icon">
                        <i class="bi bi-calendar3"></i>
                    </div>

                    <div>
                        <h6 class="section-title">Laporan Penjualan Harian</h6>

                        <p class="section-description">
                            Periode
                            {{ \Carbon\Carbon::parse($tanggalMulai)->format('d/m/Y') }}
                            sampai
                            {{ \Carbon\Carbon::parse($tanggalAkhir)->format('d/m/Y') }}
                        </p>
                    </div>

                </div>

                <span class="chart-label">
                    {{ $laporanHarian->count() }} Data
                </span>

            </div>

            <div class="table-responsive">

                <table class="table report-table">

                    <thead>
                        <tr>
                            <th width="65">No</th>
                            <th>Tanggal</th>
                            <th>Jumlah Pesanan</th>
                            <th>Item Terjual</th>
                            <th>Omzet</th>
                        </tr>
                    </thead>

                    <tbody>

                        @forelse($laporanHarian as $index => $laporan)

                            <tr>
                                <td class="table-number">
                                    {{ $index + 1 }}
                                </td>

                                <td class="table-date">
                                    {{ \Carbon\Carbon::parse($laporan->tanggal)->format('d/m/Y') }}
                                </td>

                                <td>
                                    {{ number_format($laporan->jumlah_pesanan, 0, ',', '.') }}
                                </td>

                                <td>
                                    {{ number_format($laporan->item_terjual, 0, ',', '.') }}
                                </td>

                                <td class="table-amount">
                                    Rp{{ number_format($laporan->omzet, 0, ',', '.') }}
                                </td>
                            </tr>

                        @empty

                            <tr>
                                <td colspan="5" class="table-empty">
                                    <i class="bi bi-inbox fs-3 d-block mb-2"></i>
                                    Belum ada data penjualan pada periode ini.
                                </td>
                            </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>

            <p class="table-footer-note">
                <i class="bi bi-info-circle me-1"></i>
                Data menampilkan pesanan dengan status dikemas, dikirim, dan selesai.
            </p>

        </div>

    </div>

    {{-- Tabel Kategori --}}
    <div class="report-card">

        <div class="report-card-body">

            <div class="table-section-heading">

                <div class="d-flex align-items-center gap-3">

                    <div class="table-section-icon">
                        <i class="bi bi-tags"></i>
                    </div>

                    <div>
                        <h6 class="section-title">Penjualan Berdasarkan Kategori</h6>

                        <p class="section-description">
                            Ringkasan jumlah item dan omzet setiap kategori produk.
                        </p>
                    </div>

                </div>

                <span class="chart-label">
                    {{ $laporanKategori->count() }} Kategori
                </span>

            </div>

            <div class="table-responsive">

                <table class="table report-table">

                    <thead>
                        <tr>
                            <th width="65">No</th>
                            <th>Nama Kategori</th>
                            <th>Item Terjual</th>
                            <th>Omzet</th>
                        </tr>
                    </thead>

                    <tbody>

                        @forelse($laporanKategori as $index => $kategori)

                            <tr>
                                <td class="table-number">
                                    {{ $index + 1 }}
                                </td>

                                <td class="fw-semibold">
                                    {{ $kategori->nama_kategori }}
                                </td>

                                <td>
                                    {{ number_format($kategori->item_terjual, 0, ',', '.') }}
                                </td>

                                <td class="table-amount">
                                    Rp{{ number_format($kategori->omzet, 0, ',', '.') }}
                                </td>
                            </tr>

                        @empty

                            <tr>
                                <td colspan="4" class="table-empty">
                                    <i class="bi bi-inbox fs-3 d-block mb-2"></i>
                                    Belum ada data penjualan kategori pada periode ini.
                                </td>
                            </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>

        </div>

    </div>


</div>

@endsection

@push('scripts')

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
    document.addEventListener('DOMContentLoaded', function () {

        const tanggalHarian = @json($grafikTanggal);
        const omzetHarian = @json($grafikOmzet);
        const jumlahPesanan = @json($grafikPesanan);
        const jumlahItem = @json($grafikItem);

        const namaKategori = @json($grafikNamaKategori);
        const omzetKategori = @json($grafikOmzetKategori);

        function formatRupiah(nilai) {
            return 'Rp' + new Intl.NumberFormat('id-ID').format(nilai);
        }

        let grafikOmzetInstance = null;
        let grafikPesananInstance = null;
        let grafikKategoriInstance = null;

        const panelGrafik = document.getElementById('panelGrafik');

        if (!panelGrafik) {
            return;
        }

        panelGrafik.addEventListener('shown.bs.collapse', function () {

            if (!window.Chart) {
                console.error('Chart.js belum berhasil dimuat.');
                return;
            }

            // Grafik omzet harian
            if (
                document.getElementById('grafikOmzet') &&
                grafikOmzetInstance === null
            ) {

                grafikOmzetInstance = new Chart(
                    document.getElementById('grafikOmzet'),
                    {
                        type: 'line',

                        data: {
                            labels: tanggalHarian,

                            datasets: [{
                                label: 'Omzet',
                                data: omzetHarian,
                                borderColor: '#2563eb',
                                backgroundColor: 'rgba(37, 99, 235, 0.12)',
                                borderWidth: 2,
                                fill: true,
                                tension: 0.35,
                                pointRadius: 4,
                                pointHoverRadius: 6
                            }]
                        },

                        options: {
                            responsive: true,
                            maintainAspectRatio: false,

                            plugins: {
                                legend: {
                                    display: true,
                                    position: 'bottom'
                                },

                                tooltip: {
                                    callbacks: {
                                        label: function(context) {
                                            return formatRupiah(context.raw);
                                        }
                                    }
                                }
                            },

                            scales: {
                                y: {
                                    beginAtZero: true,

                                    ticks: {
                                        callback: function(value) {
                                            return 'Rp' + new Intl.NumberFormat('id-ID', {
                                                notation: 'compact'
                                            }).format(value);
                                        }
                                    }
                                }
                            }
                        }
                    }
                );

            }

            // Grafik jumlah pesanan dan item
            if (
                document.getElementById('grafikPesanan') &&
                grafikPesananInstance === null
            ) {

                grafikPesananInstance = new Chart(
                    document.getElementById('grafikPesanan'),
                    {
                        type: 'bar',

                        data: {
                            labels: tanggalHarian,

                            datasets: [
                                {
                                    label: 'Jumlah Pesanan',
                                    data: jumlahPesanan,
                                    backgroundColor: '#2563eb',
                                    borderRadius: 5
                                },
                                {
                                    label: 'Item Terjual',
                                    data: jumlahItem,
                                    backgroundColor: '#16a34a',
                                    borderRadius: 5
                                }
                            ]
                        },

                        options: {
                            responsive: true,
                            maintainAspectRatio: false,

                            plugins: {
                                legend: {
                                    position: 'bottom'
                                }
                            },

                            scales: {
                                y: {
                                    beginAtZero: true,

                                    ticks: {
                                        precision: 0
                                    }
                                }
                            }
                        }
                    }
                );

            }

            // Grafik omzet berdasarkan kategori
            if (
                document.getElementById('grafikKategori') &&
                grafikKategoriInstance === null
            ) {

                grafikKategoriInstance = new Chart(
                    document.getElementById('grafikKategori'),
                    {
                        type: 'bar',

                        data: {
                            labels: namaKategori,

                            datasets: [{
                                label: 'Omzet',
                                data: omzetKategori,
                                backgroundColor: '#2563eb',
                                borderRadius: 5
                            }]
                        },

                        options: {
                            indexAxis: 'y',
                            responsive: true,
                            maintainAspectRatio: false,

                            plugins: {
                                legend: {
                                    display: false
                                },

                                tooltip: {
                                    callbacks: {
                                        label: function(context) {
                                            return formatRupiah(context.raw);
                                        }
                                    }
                                }
                            },

                            scales: {
                                x: {
                                    beginAtZero: true,

                                    ticks: {
                                        callback: function(value) {
                                            return 'Rp' + new Intl.NumberFormat('id-ID', {
                                                notation: 'compact'
                                            }).format(value);
                                        }
                                    }
                                }
                            }
                        }
                    }
                );

            }

        });

        // Mengubah tulisan tombol ketika grafik dibuka
        panelGrafik.addEventListener('show.bs.collapse', function () {

            const ikon = document.getElementById('ikonGrafik');
            const teks = document.getElementById('teksGrafik');

            if (ikon && teks) {
                ikon.className = 'bi bi-eye-slash me-1';
                teks.textContent = 'Sembunyikan Grafik';
            }

        });

        // Mengubah tulisan tombol ketika grafik ditutup
        panelGrafik.addEventListener('hide.bs.collapse', function () {

            const ikon = document.getElementById('ikonGrafik');
            const teks = document.getElementById('teksGrafik');

            if (ikon && teks) {
                ikon.className = 'bi bi-bar-chart-line me-1';
                teks.textContent = 'Lihat Grafik';
            }

        });

    });
</script>

@endpush
