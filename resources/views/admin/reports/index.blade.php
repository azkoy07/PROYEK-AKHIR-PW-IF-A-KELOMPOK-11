
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Laporan Penjualan - SportZone</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css"
          rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css"
          rel="stylesheet">

    <style>
        body {
            background: #f5f6fa;
            font-family: Arial, sans-serif;
        }

        .report-card {
            border: none;
            border-radius: 12px;
            box-shadow: 0 3px 12px rgba(0,0,0,0.04);
        }

        .report-icon {
            width: 48px;
            height: 48px;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 22px;
            background: #eaf1ff;
            color: #2563eb;
        }

        .table thead th {
            background: #f8f9fa;
            font-size: 13px;
            color: #555;
            white-space: nowrap;
        }

        .table td {
            vertical-align: middle;
        }

        /* Bagian grafik */
        .chart-card {
            border: none;
            border-radius: 12px;
            box-shadow: 0 3px 12px rgba(0,0,0,0.04);
            height: 100%;
        }

        .chart-container {
            position: relative;
            height: 260px;
            width: 100%;
        }

        .chart-title {
            font-size: 15px;
            font-weight: bold;
        }

        .btn-chart {
            background: #2563eb;
            color: white;
            border: none;
        }

        .btn-chart:hover {
            background: #1d4ed8;
            color: white;
        }

        @media (max-width: 576px) {
            .container-fluid {
                padding: 15px !important;
            }

            .chart-container {
                height: 230px;
            }
        }
    </style>
</head>

<body>

@php
    // Data grafik harian diurutkan dari tanggal terlama ke terbaru.
    // Urutan tabel laporan tetap mengikuti controller.

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

<div class="container-fluid p-4">

    <!-- Header -->
    <div class="d-flex justify-content-between align-items-center flex-wrap gap-3 mb-4">

        <div>
            <h3 class="fw-bold mb-1">
                Laporan Penjualan
            </h3>

            <p class="text-secondary mb-0">
                Ringkasan dan analisis penjualan SportZone
            </p>
        </div>

        <div class="d-flex gap-2 flex-wrap">

            <!-- Tombol Buka Grafik -->
            <button
                class="btn btn-chart"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#panelGrafik"
                aria-expanded="false"
                aria-controls="panelGrafik"
                id="tombolGrafik">

                <i class="bi bi-bar-chart-line me-1" id="ikonGrafik"></i>
                <span id="teksGrafik">Lihat Grafik</span>

            </button>

            <a href="{{ route('admin.dashboard') }}"
               class="btn btn-outline-secondary">

                <i class="bi bi-arrow-left"></i>
                Dashboard

            </a>

        </div>

    </div>

    <!-- Filter Tanggal -->
    <div class="card report-card mb-4">

        <div class="card-body p-4">

            <h6 class="fw-bold mb-3">
                <i class="bi bi-funnel"></i>
                Filter Periode Laporan
            </h6>

            <form action="{{ route('admin.reports.index') }}"
                  method="GET">

                <div class="row g-3 align-items-end">

                    <div class="col-md-4">

                        <label class="form-label">
                            Tanggal Mulai
                        </label>

                        <input
                            type="date"
                            name="tanggal_mulai"
                            class="form-control"
                            value="{{ $tanggalMulai }}"
                            required
                        >

                    </div>

                    <div class="col-md-4">

                        <label class="form-label">
                            Tanggal Akhir
                        </label>

                        <input
                            type="date"
                            name="tanggal_akhir"
                            class="form-control"
                            value="{{ $tanggalAkhir }}"
                            min="{{ $tanggalMulai }}"
                            required
                        >

                    </div>

                    <div class="col-md-4 d-flex gap-2">

                        <button type="submit"
                                class="btn btn-primary">

                            <i class="bi bi-search"></i>
                            Tampilkan

                        </button>

                        <a href="{{ route('admin.reports.index') }}"
                           class="btn btn-outline-secondary">

                            Reset

                        </a>

                    </div>

                </div>

            </form>

        </div>

    </div>

    <!-- Ringkasan Penjualan -->
    <div class="row g-3 mb-4">

        <div class="col-md-4">

            <div class="card report-card h-100">

                <div class="card-body p-4">

                    <div class="d-flex justify-content-between align-items-center">

                        <div>
                            <p class="text-secondary mb-2">
                                Total Pesanan
                            </p>

                            <h3 class="fw-bold mb-0">
                                {{ number_format($ringkasan->total_pesanan, 0, ',', '.') }}
                            </h3>
                        </div>

                        <div class="report-icon">
                            <i class="bi bi-receipt"></i>
                        </div>

                    </div>

                </div>

            </div>

        </div>

        <div class="col-md-4">

            <div class="card report-card h-100">

                <div class="card-body p-4">

                    <div class="d-flex justify-content-between align-items-center">

                        <div>
                            <p class="text-secondary mb-2">
                                Item Terjual
                            </p>

                            <h3 class="fw-bold mb-0">
                                {{ number_format($ringkasan->total_item, 0, ',', '.') }}
                            </h3>
                        </div>

                        <div class="report-icon">
                            <i class="bi bi-box-seam"></i>
                        </div>

                    </div>

                </div>

            </div>

        </div>

        <div class="col-md-4">

            <div class="card report-card h-100">

                <div class="card-body p-4">

                    <div class="d-flex justify-content-between align-items-center">

                        <div>
                            <p class="text-secondary mb-2">
                                Total Omzet
                            </p>

                            <h3 class="fw-bold mb-0">
                                Rp{{ number_format($ringkasan->total_omzet, 0, ',', '.') }}
                            </h3>
                        </div>

                        <div class="report-icon">
                            <i class="bi bi-currency-dollar"></i>
                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

    <!-- Grafik Penjualan (Tersembunyi Secara Default) -->
    <div class="collapse mb-4" id="panelGrafik">

        <div class="card report-card">

            <div class="card-body p-4">

                <div class="d-flex justify-content-between align-items-center flex-wrap gap-2 mb-3">

                    <div>
                        <h5 class="fw-bold mb-1">
                            <i class="bi bi-bar-chart-line text-primary"></i>
                            Grafik Analisis Penjualan
                        </h5>

                        <p class="text-secondary small mb-0">
                            Visualisasi data berdasarkan periode laporan yang dipilih.
                        </p>
                    </div>

                    <span class="badge bg-primary-subtle text-primary">
                        Grafik Penjualan
                    </span>

                </div>

                <div class="row g-3">

                    <!-- Grafik Omzet Harian -->
                    <div class="col-lg-6">

                        <div class="card chart-card">

                            <div class="card-body">

                                <h6 class="chart-title mb-3">
                                    <i class="bi bi-graph-up text-primary"></i>
                                    Omzet Penjualan Harian
                                </h6>

                                @if($grafikTanggal->isEmpty())

                                    <div class="text-center text-secondary py-5">
                                        <i class="bi bi-bar-chart fs-2"></i>
                                        <p class="mb-0 mt-2">
                                            Belum ada data omzet.
                                        </p>
                                    </div>

                                @else

                                    <div class="chart-container">
                                        <canvas id="grafikOmzet"></canvas>
                                    </div>

                                @endif

                            </div>

                        </div>

                    </div>

                    <!-- Grafik Pesanan dan Item -->
                    <div class="col-lg-6">

                        <div class="card chart-card">

                            <div class="card-body">

                                <h6 class="chart-title mb-3">
                                    <i class="bi bi-bar-chart text-primary"></i>
                                    Pesanan dan Item Terjual
                                </h6>

                                @if($grafikTanggal->isEmpty())

                                    <div class="text-center text-secondary py-5">
                                        <i class="bi bi-bar-chart fs-2"></i>
                                        <p class="mb-0 mt-2">
                                            Belum ada data pesanan.
                                        </p>
                                    </div>

                                @else

                                    <div class="chart-container">
                                        <canvas id="grafikPesanan"></canvas>
                                    </div>

                                @endif

                            </div>

                        </div>

                    </div>

                    <!-- Grafik Kategori -->
                    <div class="col-lg-6">

                        <div class="card chart-card">

                            <div class="card-body">

                                <h6 class="chart-title mb-3">
                                    <i class="bi bi-tags text-primary"></i>
                                    Omzet Berdasarkan Kategori
                                </h6>

                                @if($grafikNamaKategori->isEmpty())

                                    <div class="text-center text-secondary py-5">
                                        <i class="bi bi-tags fs-2"></i>
                                        <p class="mb-0 mt-2">
                                            Belum ada data penjualan kategori.
                                        </p>
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

    <!-- Laporan Harian -->
    <div class="card report-card mb-4">

        <div class="card-body p-4">

            <h5 class="fw-bold mb-3">
                <i class="bi bi-calendar3"></i>
                Laporan Penjualan Harian
            </h5>

            <p class="text-secondary small">
                Periode {{ \Carbon\Carbon::parse($tanggalMulai)->format('d/m/Y') }}
                sampai {{ \Carbon\Carbon::parse($tanggalAkhir)->format('d/m/Y') }}
            </p>

            <div class="table-responsive">

                <table class="table table-hover">

                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Tanggal</th>
                            <th>Jumlah Pesanan</th>
                            <th>Item Terjual</th>
                            <th>Omzet</th>
                        </tr>
                    </thead>

                    <tbody>

                        @forelse($laporanHarian as $index => $laporan)

                            <tr>

                                <td>{{ $index + 1 }}</td>

                                <td>
                                    {{ \Carbon\Carbon::parse($laporan->tanggal)->format('d/m/Y') }}
                                </td>

                                <td>
                                    {{ number_format($laporan->jumlah_pesanan, 0, ',', '.') }}
                                </td>

                                <td>
                                    {{ number_format($laporan->item_terjual, 0, ',', '.') }}
                                </td>

                                <td class="fw-semibold">
                                    Rp{{ number_format($laporan->omzet, 0, ',', '.') }}
                                </td>

                            </tr>

                        @empty

                            <tr>
                                <td colspan="5"
                                    class="text-center text-secondary py-4">

                                    Belum ada data penjualan pada periode ini.

                                </td>
                            </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>

        </div>

    </div>

    <!-- Laporan Kategori -->
    <div class="card report-card">

        <div class="card-body p-4">

            <h5 class="fw-bold mb-3">
                <i class="bi bi-tags"></i>
                Penjualan Berdasarkan Kategori
            </h5>

            <div class="table-responsive">

                <table class="table table-hover">

                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Kategori</th>
                            <th>Item Terjual</th>
                            <th>Omzet</th>
                        </tr>
                    </thead>

                    <tbody>

                        @forelse($laporanKategori as $index => $kategori)

                            <tr>

                                <td>{{ $index + 1 }}</td>

                                <td class="fw-semibold">
                                    {{ $kategori->nama_kategori }}
                                </td>

                                <td>
                                    {{ number_format($kategori->item_terjual, 0, ',', '.') }}
                                </td>

                                <td>
                                    Rp{{ number_format($kategori->omzet, 0, ',', '.') }}
                                </td>

                            </tr>

                        @empty

                            <tr>
                                <td colspan="4"
                                    class="text-center text-secondary py-4">

                                    Belum ada data penjualan kategori pada periode ini.

                                </td>
                            </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>

        </div>

    </div>

    <p class="text-secondary text-center small mt-4">
        SportZone &copy; {{ date('Y') }} - Laporan Penjualan
    </p>

</div>

<!-- Bootstrap JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>

<!-- Chart.js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
    // Data dari Laravel
    const tanggalHarian = @json($grafikTanggal);
    const omzetHarian = @json($grafikOmzet);
    const jumlahPesanan = @json($grafikPesanan);
    const jumlahItem = @json($grafikItem);

    const namaKategori = @json($grafikNamaKategori);
    const omzetKategori = @json($grafikOmzetKategori);

    // Format angka menjadi Rupiah
    function formatRupiah(nilai) {
        return 'Rp' + new Intl.NumberFormat('id-ID').format(nilai);
    }

    // Menghindari grafik dibuat berulang kali
    let grafikOmzetInstance = null;
    let grafikPesananInstance = null;
    let grafikKategoriInstance = null;

    // Membuat grafik ketika panel dibuka
    const panelGrafik = document.getElementById('panelGrafik');

    panelGrafik.addEventListener('shown.bs.collapse', function () {

        // Grafik Omzet Harian
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
                                        return 'Rp' +
                                            new Intl.NumberFormat('id-ID', {
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

        // Grafik Pesanan dan Item Terjual
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

        // Grafik Omzet Berdasarkan Kategori
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
                                        return 'Rp' +
                                            new Intl.NumberFormat('id-ID', {
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

    // Mengubah ikon dan tulisan tombol saat grafik dibuka atau ditutup
    panelGrafik.addEventListener('show.bs.collapse', function () {

        document.getElementById('ikonGrafik').className =
            'bi bi-eye-slash me-1';

        document.getElementById('teksGrafik').textContent =
            'Sembunyikan Grafik';

    });

    panelGrafik.addEventListener('hide.bs.collapse', function () {

        document.getElementById('ikonGrafik').className =
            'bi bi-bar-chart-line me-1';

        document.getElementById('teksGrafik').textContent =
            'Lihat Grafik';

    });
</script>

</body>
</html>
