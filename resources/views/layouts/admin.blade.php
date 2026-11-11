
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title', 'Admin SportZone')</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    @stack('styles')
</head>

<body class="sz-admin-body">

<div class="sz-admin-layout">

    <!-- SIDEBAR -->
    <aside class="sz-sidebar">

        <!-- BRAND -->
        <a href="{{ route('admin.dashboard') }}" class="sz-brand">
            <div class="sz-brand-icon">
                <i class="bi bi-dribbble"></i>
            </div>

            <div>
                <div class="sz-brand-name">SportZone</div>
                <div class="sz-brand-caption">ADMIN PANEL</div>
            </div>
        </a>

        <div class="sz-sidebar-divider"></div>

        <!-- MENU UTAMA -->
        <div class="sz-menu-label">MENU UTAMA</div>

        <nav class="sz-sidebar-nav">

            <a href="{{ route('admin.dashboard') }}"
               class="sz-menu-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                <i class="bi bi-grid-1x2"></i>
                <span>Dashboard</span>
            </a>

            <a href="{{ route('admin.products.index') }}"
               class="sz-menu-link {{ request()->routeIs('admin.products.*') ? 'active' : '' }}">
                <i class="bi bi-box-seam"></i>
                <span>Produk</span>
            </a>

            <a href="{{ route('admin.categories.index') }}"
               class="sz-menu-link {{ request()->routeIs('admin.categories.*') ? 'active' : '' }}">
                <i class="bi bi-tags"></i>
                <span>Kategori</span>
            </a>

            <a href="{{ route('admin.orders.index') }}"
               class="sz-menu-link {{ request()->routeIs('admin.orders.*') ? 'active' : '' }}">
                <i class="bi bi-receipt"></i>
                <span>Pesanan</span>
            </a>

            <a href="{{ route('admin.reviews.index') }}"
                class="sz-menu-link {{ request()->routeIs('admin.reviews.*') ? 'active' : '' }}">
                    <i class="bi bi-star"></i>
                    <span>Ulasan Pelanggan</span>
            </a>

            <a href="{{ route('admin.stock-logs.index') }}"
               class="sz-menu-link {{ request()->routeIs('admin.stock-logs.*') ? 'active' : '' }}">
                <i class="bi bi-clipboard-data"></i>
                <span>Riwayat Stok</span>
            </a>

            <a href="{{ route('admin.reports.index') }}"
               class="sz-menu-link {{ request()->routeIs('admin.reports.*') ? 'active' : '' }}">
                <i class="bi bi-bar-chart-line"></i>
                <span>Laporan Penjualan</span>
            </a>

        </nav>

        <div class="sz-sidebar-divider"></div>

        <!-- PENGELOLAAN TOKO -->
        <div class="sz-menu-label">PENGELOLAAN TOKO</div>

        <nav class="sz-sidebar-nav">

            <a href="{{ route('admin.vouchers.index') }}"
               class="sz-menu-link {{ request()->routeIs('admin.vouchers.*') ? 'active' : '' }}">
                <i class="bi bi-ticket-perforated"></i>
                <span>Voucher</span>
            </a>

            <a href="{{ route('admin.settings.edit') }}"
               class="sz-menu-link {{ request()->routeIs('admin.settings.*') ? 'active' : '' }}">
                <i class="bi bi-gear"></i>
                <span>Pengaturan Toko</span>
            </a>

        </nav>

        <div class="sz-sidebar-divider"></div>

        <!-- NAVIGASI -->
        <div class="sz-menu-label">NAVIGASI</div>

        <nav class="sz-sidebar-nav">

            <a href="{{ route('home') }}" class="sz-menu-link">
                <i class="bi bi-shop"></i>
                <span>Lihat Toko</span>
                <i class="bi bi-box-arrow-up-right sz-menu-external"></i>
            </a>

        </nav>

        <!-- SIDEBAR BOTTOM -->
        <div class="sz-sidebar-bottom">

            <div class="sz-admin-mini-profile">
                <div class="sz-admin-avatar">
                    <i class="bi bi-person-fill"></i>
                </div>

                <div class="sz-admin-mini-info">
                    <div class="sz-admin-mini-name">
                        {{ auth()->user()->nama }}
                    </div>

                    <div class="sz-admin-mini-role">
                        Administrator
                    </div>
                </div>
            </div>

            <a href="{{ route('home') }}" class="sz-back-home">
                <i class="bi bi-arrow-left-circle"></i>
                <span>Kembali ke Halaman Utama</span>
            </a>

        </div>

    </aside>

    <!-- AREA KONTEN -->
    <main class="sz-admin-main">

        <!-- TOPBAR -->
        <header class="sz-admin-topbar">

            <div>
                <div class="sz-topbar-title">
                    @yield('page_title', 'Dashboard Admin')
                </div>

                <div class="sz-topbar-subtitle">
                    @yield('page_subtitle', 'Kelola toko SportZone dengan mudah.')
                </div>
            </div>

            <!-- PROFIL ADMIN -->
            <div class="sz-topbar-account">

                <!-- INFORMASI ADMIN -->
                <div class="sz-topbar-account-text">

                    <div class="sz-topbar-name">
                        Admin SportZone
                    </div>

                    <div class="sz-topbar-email">
                        {{ auth()->user()->email }}
                    </div>

                </div>

                <!-- FOTO PROFIL MENGGUNAKAN LOGO TOKO -->
                <div class="sz-topbar-avatar sz-topbar-store-profile">

                    @if(!empty($settings?->logo))

                        <img
                            src="{{ asset('storage/' . $settings->logo) }}"
                            alt="Logo SportZone"
                            onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';"
                        >

                        <i class="bi bi-person-fill" style="display: none;"></i>

                    @else

                        <i class="bi bi-person-fill"></i>

                    @endif

                </div>

            </div>

        </header>

        <!-- KONTEN HALAMAN -->
        <div class="sz-admin-content">

            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show sz-alert" role="alert">
                    <i class="bi bi-check-circle-fill me-2"></i>
                    {{ session('success') }}

                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            @if(session('error'))
                <div class="alert alert-danger alert-dismissible fade show sz-alert" role="alert">
                    <i class="bi bi-exclamation-circle-fill me-2"></i>
                    {{ session('error') }}

                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            @if($errors->any())
                <div class="alert alert-danger alert-dismissible fade show sz-alert" role="alert">

                    <strong>
                        <i class="bi bi-exclamation-triangle me-2"></i>
                        Periksa kembali data yang dimasukkan.
                    </strong>

                    <ul class="mb-0 mt-2">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>

                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>

                </div>
            @endif

            @yield('content')

        </div>

        <!-- FOOTER -->
        <footer class="sz-admin-footer">
            SportZone &copy; {{ date('Y') }}. All rights reserved.
        </footer>

    </main>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>

@stack('scripts')

</body>
</html>
