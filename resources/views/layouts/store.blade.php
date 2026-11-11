
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title', 'SportZone - Toko Olahraga')</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        /* =====================================
           PENGATURAN DASAR
        ===================================== */

        :root {
            --store-sidebar-width: 270px;
            --store-primary: #2563eb;
            --store-text: #1e293b;
            --store-muted: #94a3b8;
            --store-border: #e8edf3;
            --store-background: #f7f9fc;
        }

        html {
            min-height: 100%;
        }

        body {
            margin: 0 !important;
            padding: 0 !important;
            background: var(--store-background);
            color: var(--store-text);
            font-family: 'Inter', sans-serif;
            overflow-x: hidden;
        }

        .store-layout,
        .store-layout * {
            box-sizing: border-box;
        }

        .store-layout {
            width: 100%;
            min-height: 100vh;
        }

        /* =====================================
           SIDEBAR
        ===================================== */

        .store-sidebar {
            position: fixed;
            top: 0;
            left: 0;
            bottom: 0;
            z-index: 1050;

            width: var(--store-sidebar-width);
            height: 100vh;

            display: flex;
            flex-direction: column;

            padding: 24px 20px 18px;

            background: #fff;
            border-right: 1px solid var(--store-border);

            overflow-y: auto;
            overflow-x: hidden;

            scrollbar-width: thin;
            scrollbar-color: #dce3ed transparent;
        }

        .store-brand {
            display: flex;
            align-items: center;
            gap: 12px;

            padding: 2px 0 22px;

            color: #17191f;
            text-decoration: none;
            flex-shrink: 0;
        }

        .store-brand-icon {
            width: 43px;
            height: 43px;
            min-width: 43px;

            display: flex;
            align-items: center;
            justify-content: center;

            color: #fff;
            background: var(--store-primary);
            border-radius: 12px;

            font-size: 23px;
        }

        .store-brand-text {
            display: flex;
            flex-direction: column;
            line-height: 1.2;
        }

        .store-brand-text > span {
            font-size: 21px;
            font-weight: 800;
            letter-spacing: -.8px;
        }

        .store-brand-blue {
            color: var(--store-primary);
        }

        .store-brand-text small {
            margin-top: 4px;
            color: var(--store-muted);
            font-size: 9px;
            font-weight: 700;
            letter-spacing: 1.5px;
        }

        .store-sidebar-divider {
            width: 100%;
            height: 1px;
            margin: 8px 0 21px;
            background: var(--store-border);
            flex-shrink: 0;
        }

        .store-sidebar-label {
            margin: 0 0 10px;

            color: var(--store-muted);
            font-size: 11px;
            font-weight: 700;
            letter-spacing: 1px;
        }

        .store-sidebar-navigation {
            display: flex;
            flex-direction: column;
            gap: 5px;
        }

        .store-side-link {
            min-height: 46px;

            display: flex;
            align-items: center;
            gap: 13px;

            padding: 0 13px;

            color: #64748b;
            text-decoration: none;

            font-size: 13px;
            font-weight: 500;

            border-radius: 9px;
            transition: all .2s ease;
        }

        .store-side-link > i:first-child {
            width: 20px;
            flex-shrink: 0;
            text-align: center;
            font-size: 18px;
        }

        .store-side-link span {
            flex: 1;
        }

        .store-side-link:hover,
        .store-category-link:hover {
            color: var(--store-primary);
            background: #f4f7fc;
        }

        .store-side-link.active,
        .store-category-link.active {
            color: var(--store-primary);
            background: #eaf1ff;
            font-weight: 600;
        }

        .store-nav-count {
            min-width: 21px;
            height: 21px;

            display: flex;
            align-items: center;
            justify-content: center;

            padding: 0 5px;

            color: var(--store-primary);
            background: #eaf1ff;
            border-radius: 20px;

            font-size: 10px;
            font-weight: 700;
        }

        .store-category-navigation {
            gap: 3px;
        }

        .store-category-link {
            min-height: 39px;

            display: flex;
            align-items: center;
            gap: 11px;

            padding: 0 12px;

            color: #64748b;
            text-decoration: none;

            font-size: 12.5px;
            font-weight: 500;

            border-radius: 8px;
            transition: all .2s ease;
        }

        .store-category-link i {
            width: 18px;
            color: var(--store-muted);
            text-align: center;
            font-size: 15px;
        }

        .store-category-link:hover i,
        .store-category-link.active i {
            color: var(--store-primary);
        }

        .store-sidebar-bottom {
            margin-top: auto;
            padding-top: 22px;
        }

        .store-help-card {
            display: flex;
            align-items: center;
            gap: 11px;

            padding: 13px 11px;
            margin-bottom: 16px;

            background: #f7f9fc;
            border: 1px solid #edf1f6;
            border-radius: 10px;
        }

        .store-help-icon {
            width: 35px;
            height: 35px;
            min-width: 35px;

            display: flex;
            align-items: center;
            justify-content: center;

            color: var(--store-primary);
            background: #eaf1ff;
            border-radius: 9px;

            font-size: 17px;
        }

        .store-help-info {
            display: flex;
            flex-direction: column;
            gap: 3px;
        }

        .store-help-info strong {
            color: var(--store-text);
            font-size: 11px;
            font-weight: 700;
        }

        .store-help-info small {
            color: var(--store-muted);
            font-size: 9px;
        }

        .store-guest-actions {
            display: flex;
            gap: 8px;
        }

        .store-login-button,
        .store-register-button {
            min-height: 38px;
            flex: 1;

            display: flex;
            align-items: center;
            justify-content: center;
            gap: 6px;

            border-radius: 8px;
            text-decoration: none;

            font-size: 11px;
            font-weight: 600;
            transition: all .2s ease;
        }

        .store-login-button {
            color: var(--store-primary);
            background: #eaf1ff;
        }

        .store-login-button:hover {
            color: #fff;
            background: var(--store-primary);
        }

        .store-register-button {
            color: #fff;
            background: var(--store-primary);
        }

        .store-register-button:hover {
            color: #fff;
            background: #1d4ed8;
        }

        .store-sidebar-user {
            display: flex;
            align-items: center;
            gap: 10px;

            padding: 12px 9px;
            border-top: 1px solid var(--store-border);
        }

        .store-sidebar-avatar {
            width: 37px;
            height: 37px;
            min-width: 37px;

            display: flex;
            align-items: center;
            justify-content: center;

            color: var(--store-primary);
            background: #eaf1ff;
            border-radius: 50%;
            font-size: 18px;
        }

        .store-sidebar-user-info {
            min-width: 0;
            flex: 1;

            display: flex;
            flex-direction: column;
            gap: 3px;
        }

        .store-sidebar-user-info strong {
            overflow: hidden;
            color: var(--store-text);
            font-size: 11px;
            font-weight: 700;
            text-overflow: ellipsis;
            white-space: nowrap;
        }

        .store-sidebar-user-info small {
            color: var(--store-muted);
            font-size: 10px;
        }

        /* =====================================
           AREA UTAMA
        ===================================== */

        .store-main {
            width: calc(100% - var(--store-sidebar-width));
            min-width: 0;
            min-height: 100vh;

            margin-left: var(--store-sidebar-width);
            padding: 0;

            background: var(--store-background);
        }

        /* =====================================
           TOPBAR
        ===================================== */

        .store-topbar {
            width: 100%;
            min-height: 82px;

            position: sticky;
            top: 0;
            z-index: 900;

            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 25px;

            padding: 0 38px;

            background: rgba(255,255,255,.97);
            border-bottom: 1px solid var(--store-border);
            backdrop-filter: blur(12px);
        }

        .store-topbar-heading {
            min-width: 0;
            flex: 1;
        }

        .store-topbar-heading h5 {
            margin: 0;
            color: #172033;
            font-size: 16px;
            font-weight: 700;
        }

        .store-topbar-heading small {
            display: block;
            margin-top: 4px;
            color: var(--store-muted);
            font-size: 11px;
        }

        .store-topbar-actions {
            display: flex;
            align-items: center;
            gap: 17px;
            flex-shrink: 0;
        }

        .store-icon-button {
            width: 42px;
            height: 42px;

            position: relative;

            display: flex;
            align-items: center;
            justify-content: center;

            color: #64748b;
            background: #f7f9fc;
            border: 1px solid #edf1f6;
            border-radius: 10px;

            font-size: 18px;
            text-decoration: none;
        }

        .store-icon-button:hover {
            color: var(--store-primary);
            background: #eaf1ff;
        }

        .store-notification-count {
            position: absolute;
            top: 2px;
            right: 2px;

            min-width: 15px;
            height: 15px;

            display: flex;
            align-items: center;
            justify-content: center;

            padding: 0 4px;

            color: white;
            background: #dc3545;
            border: 1px solid white;
            border-radius: 50px;

            font-size: 9px;
            font-weight: 600;
        }

        .store-cart-count {
            position: absolute;
            top: -5px;
            right: -5px;

            min-width: 17px;
            height: 17px;

            display: flex;
            align-items: center;
            justify-content: center;

            padding: 0 4px;

            color: white;
            background: var(--store-primary);
            border-radius: 20px;

            font-size: 9px;
            font-weight: 700;
        }

        .store-account-button {
            display: flex;
            align-items: center;
            gap: 10px;

            padding: 5px 8px;

            background: transparent;
            border: 0;
            text-align: left;
        }

        .store-account-button::after {
            display: none;
        }

        .store-account-avatar,
        .store-account-dropdown-avatar {
            width: 38px;
            height: 38px;

            display: flex;
            align-items: center;
            justify-content: center;

            color: var(--store-primary);
            background: #eaf1ff;
            border-radius: 50%;
            font-size: 18px;
        }

        .store-account-info {
            display: flex;
            flex-direction: column;
            gap: 3px;
        }

        .store-account-info strong {
            max-width: 150px;
            overflow: hidden;
            color: var(--store-text);
            font-size: 11px;
            text-overflow: ellipsis;
            white-space: nowrap;
        }

        .store-account-info small {
            max-width: 150px;
            overflow: hidden;
            color: var(--store-muted);
            font-size: 10px;
            text-overflow: ellipsis;
            white-space: nowrap;
        }

        .store-account-arrow {
            color: var(--store-muted);
            font-size: 11px;
        }

        .store-account-menu {
            width: 280px;
            margin-top: 12px !important;
            padding: 8px;

            border: 1px solid #edf1f6;
            border-radius: 12px;
        }

        .store-account-header {
            padding: 12px;
        }

        .store-section-subtitle {
            color: var(--store-primary);
            font-size: 9px;
            font-weight: 800;
            letter-spacing: 1.3px;
        }

        .store-account-header h6 {
            margin: 7px 0 12px;
            font-size: 15px;
            font-weight: 700;
        }

        .store-account-profile {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .store-account-identity {
            display: flex;
            flex-direction: column;
            gap: 3px;
        }

        .store-account-identity strong {
            color: var(--store-text);
            font-size: 12px;
        }

        .store-account-identity small {
            color: var(--store-muted);
            font-size: 10px;
        }

        .store-account-menu .dropdown-item {
            padding: 10px;
            border-radius: 7px;
            font-size: 12px;
        }

        /* =====================================
           NOTIFIKASI
        ===================================== */

        .store-notification-item {
            white-space: normal;
            transition: background-color .2s ease;
        }

        .store-notification-item:hover {
            background: #f5f7fa;
        }

        .store-notification-item .fw-semibold {
            font-size: 13px;
        }

        .store-notification-item .small {
            font-size: 11px;
            line-height: 1.5;
        }

        .store-unread-dot {
            width: 7px;
            height: 7px;
            min-width: 7px;
            margin-top: 5px;
            background: #0d6efd;
            border-radius: 50%;
        }

        /* =====================================
           KONTEN DAN FOOTER
        ===================================== */

        .store-alerts {
            margin: 20px 38px 0;
        }

        .store-content {
            display: block;
            width: 100%;
            max-width: none;

            margin: 0;
            padding: 32px 38px 45px;
        }

        .store-footer {
            width: 100%;
            padding: 18px 38px;

            color: var(--store-muted);
            border-top: 1px solid var(--store-border);

            font-size: 11px;
        }

        /* =====================================
           DESKTOP
        ===================================== */

        @media (min-width: 901px) {
            .store-sidebar {
                width: 270px;
            }

            .store-main {
                margin-left: 270px;
                width: calc(100% - 270px);
            }
        }

        @media (max-width: 1100px) {
            .store-topbar {
                padding-left: 24px;
                padding-right: 24px;
            }

            .store-content {
                padding-left: 24px;
                padding-right: 24px;
            }

            .store-topbar-actions {
                gap: 10px;
            }
        }
    </style>

    @stack('styles')
</head>

<body>

@php
    $storeIsAdmin = auth()->check() && auth()->user()->role === 'admin';
    $storeIsCustomer = auth()->check() && auth()->user()->role === 'customer';
    $storeIsGuest = !auth()->check();

    $storeSidebarCategories = \Illuminate\Support\Facades\DB::table('categories')
        ->orderBy('nama_kategori')
        ->get();

    $storeJumlahKeranjang = 0;

    if ($storeIsCustomer) {
        $storeJumlahKeranjang = \Illuminate\Support\Facades\DB::table('cart_items')
            ->where('user_id', auth()->id())
            ->sum('qty');
    }

    $storeJumlahNotifikasi = $storeIsCustomer
        ? ($jumlahNotifikasi ?? 0)
        : 0;

    $storeNotifikasi = $storeIsCustomer
        ? ($notifikasi ?? collect())
        : collect();
@endphp

<div class="store-layout">

    <!-- =================================
         SIDEBAR
    ================================== -->

    <aside class="store-sidebar">

        <a href="{{ route('home') }}" class="store-brand">
            <div class="store-brand-icon">
                <i class="bi bi-dribbble"></i>
            </div>

            <div class="store-brand-text">
                <span>SPORT<span class="store-brand-blue">ZONE</span></span>
                <small>SPORTS STORE</small>
            </div>
        </a>

        <div class="store-sidebar-divider"></div>

        <div class="store-sidebar-label">MENU UTAMA</div>

        <nav class="store-sidebar-navigation">

            <a href="{{ route('home') }}"
               class="store-side-link {{ request()->routeIs('home') && !request()->has('category') && !request()->has('search') ? 'active' : '' }}">
                <i class="bi bi-house-door"></i>
                <span>Beranda</span>
            </a>

            <a href="{{ route('home') }}#catalog" class="store-side-link">
                <i class="bi bi-grid"></i>
                <span>Semua Produk</span>
            </a>

            @if($storeIsCustomer || $storeIsGuest)

                <a href="{{ $storeIsCustomer ? route('cart.index') : route('login') }}"
                   class="store-side-link {{ request()->routeIs('cart.*') ? 'active' : '' }}">
                    <i class="bi bi-cart3"></i>
                    <span>Keranjang</span>

                    @if($storeJumlahKeranjang > 0)
                        <span class="store-nav-count">
                            {{ $storeJumlahKeranjang > 99 ? '99+' : $storeJumlahKeranjang }}
                        </span>
                    @endif
                </a>

                <a href="{{ $storeIsCustomer ? route('customer.wishlist.index') : route('login') }}"
                   class="store-side-link {{ request()->routeIs('customer.wishlist.*') ? 'active' : '' }}">
                    <i class="bi bi-heart"></i>
                    <span>Wishlist</span>
                </a>

                @if($storeIsCustomer)

                    <a href="{{ route('customer.orders.index') }}"
                       class="store-side-link {{ request()->routeIs('customer.orders.*') ? 'active' : '' }}">
                        <i class="bi bi-receipt"></i>
                        <span>Pesanan Saya</span>
                    </a>

                    <a href="{{ route('customer.addresses.index') }}"
                       class="store-side-link {{ request()->routeIs('customer.addresses.*') ? 'active' : '' }}">
                        <i class="bi bi-geo-alt"></i>
                        <span>Alamat Pengiriman</span>
                    </a>

                    <a href="{{ route('notifications.index') }}"
                       class="store-side-link {{ request()->routeIs('notifications.*') ? 'active' : '' }}">
                        <i class="bi bi-bell"></i>
                        <span>Notifikasi</span>

                        @if($storeJumlahNotifikasi > 0)
                            <span class="store-nav-count">
                                {{ $storeJumlahNotifikasi > 99 ? '99+' : $storeJumlahNotifikasi }}
                            </span>
                        @endif
                    </a>

                @endif
            @endif

        </nav>

        <div class="store-sidebar-divider"></div>

        <div class="store-sidebar-label">KATEGORI PRODUK</div>

        <nav class="store-sidebar-navigation store-category-navigation">

            <a href="{{ route('home') }}"
               class="store-category-link {{ !request('category') ? 'active' : '' }}">
                <i class="bi bi-grid-3x3-gap"></i>
                <span>Semua Kategori</span>
            </a>

            @foreach($storeSidebarCategories as $category)

                <a href="{{ route('home', array_merge(request()->query(), [
                        'category' => $category->slug,
                        'page' => 1
                    ])) }}"
                   class="store-category-link {{ request('category') == $category->slug ? 'active' : '' }}">
                    <i class="bi bi-tag"></i>
                    <span>{{ $category->nama_kategori }}</span>
                </a>

            @endforeach

        </nav>

        <div class="store-sidebar-bottom">

            @if($storeIsGuest)

                <div class="store-help-card">
                    <div class="store-help-icon">
                        <i class="bi bi-headset"></i>
                    </div>

                    <div class="store-help-info">
                        <strong>Butuh Bantuan?</strong>
                        <small>Hubungi layanan pelanggan</small>
                    </div>
                </div>

                <div class="store-guest-actions">

                    <a href="{{ route('login') }}" class="store-login-button">
                        <i class="bi bi-box-arrow-in-right"></i>
                        Masuk
                    </a>

                    <a href="{{ route('register') }}" class="store-register-button">
                        Daftar
                    </a>

                </div>

            @endif

            @auth

                <div class="store-sidebar-user">

                    <div class="store-sidebar-avatar">
                        <i class="bi bi-person-fill"></i>
                    </div>

                    <div class="store-sidebar-user-info">
                        <strong>{{ auth()->user()->nama }}</strong>
                        <small>{{ $storeIsAdmin ? 'Administrator' : 'Customer' }}</small>
                    </div>

                </div>

            @endauth

        </div>

    </aside>

    <!-- =================================
         AREA UTAMA
    ================================== -->

    <main class="store-main">

        <!-- TOPBAR -->

        <header class="store-topbar">

            <div class="store-topbar-heading">
                <h5>@yield('page_title', 'SportZone')</h5>
                <small>@yield('page_subtitle', 'Temukan perlengkapan olahraga pilihanmu.')</small>
            </div>

            <div class="store-topbar-actions">

                @if($storeIsCustomer)

                    <!-- NOTIFIKASI -->

                    <div class="dropdown">

                        <button type="button"
                                class="store-icon-button"
                                data-bs-toggle="dropdown"
                                aria-expanded="false"
                                title="Notifikasi">

                            <i class="bi bi-bell"></i>

                            @if($storeJumlahNotifikasi > 0)
                                <span class="store-notification-count">
                                    {{ $storeJumlahNotifikasi > 9 ? '9+' : $storeJumlahNotifikasi }}
                                </span>
                            @endif

                        </button>

                        <div class="dropdown-menu dropdown-menu-end p-0 shadow border-0"
                             style="width:330px; max-width:90vw; border-radius:12px;">

                            <div class="d-flex justify-content-between align-items-center p-3 border-bottom">
                                <div>
                                    <h6 class="mb-0 fw-bold">Notifikasi</h6>
                                    <small class="text-muted">
                                        {{ $storeJumlahNotifikasi }} belum dibaca
                                    </small>
                                </div>

                                <i class="bi bi-bell text-primary"></i>
                            </div>

                            <div style="max-height:350px; overflow-y:auto;">

                                @forelse($storeNotifikasi as $item)

                                    <a href="{{ route('notifications.read', $item->id) }}"
                                       class="dropdown-item text-wrap p-3 border-bottom store-notification-item">

                                        <div class="d-flex gap-3">

                                            <div class="text-{{ $item->warna }} fs-5">
                                                <i class="bi {{ $item->ikon }}"></i>
                                            </div>

                                            <div class="flex-grow-1">

                                                <div class="d-flex justify-content-between gap-2">

                                                    <div class="fw-semibold mb-1">
                                                        {{ $item->judul }}
                                                    </div>

                                                    @if($item->read_at === null)
                                                        <span class="store-unread-dot"></span>
                                                    @endif

                                                </div>

                                                <div class="small text-muted">
                                                    {{ $item->pesan }}
                                                </div>

                                                <div class="small text-secondary mt-1">
                                                    {{ \Carbon\Carbon::parse($item->created_at)->diffForHumans() }}
                                                </div>

                                            </div>
                                        </div>

                                    </a>

                                @empty

                                    <div class="text-center p-4">
                                        <i class="bi bi-bell-slash fs-2 text-muted"></i>
                                        <p class="fw-semibold mt-2 mb-1">Belum Ada Notifikasi</p>
                                        <small class="text-muted">
                                            Informasi terbaru akan muncul di sini.
                                        </small>
                                    </div>

                                @endforelse

                            </div>

                            <div class="p-2 border-top">

                                @if($storeJumlahNotifikasi > 0)

                                    <form action="{{ route('notifications.read-all') }}"
                                          method="POST"
                                          class="mb-2">
                                        @csrf

                                        <button type="submit" class="btn btn-sm btn-light w-100">
                                            <i class="bi bi-check2-all"></i>
                                            Tandai Semua Dibaca
                                        </button>
                                    </form>

                                @endif

                                <a href="{{ route('notifications.index') }}"
                                   class="btn btn-sm btn-outline-primary w-100">
                                    Lihat Semua Notifikasi
                                </a>

                            </div>

                        </div>
                    </div>

                    <!-- KERANJANG -->

                    <a href="{{ route('cart.index') }}"
                       class="store-icon-button"
                       title="Keranjang Belanja">

                        <i class="bi bi-bag"></i>

                        @if($storeJumlahKeranjang > 0)
                            <span class="store-cart-count">
                                {{ $storeJumlahKeranjang > 99 ? '99+' : $storeJumlahKeranjang }}
                            </span>
                        @endif

                    </a>

                @endif

                <!-- DROPDOWN PROFIL -->

                <div class="dropdown">

                    <button type="button"
                            class="store-account-button dropdown-toggle"
                            id="storeAccountDropdown"
                            data-bs-toggle="dropdown"
                            aria-expanded="false">

                        <div class="store-account-avatar">
                            <i class="bi bi-person"></i>
                        </div>

                        <div class="store-account-info">

                            @auth
                                <strong>{{ auth()->user()->nama }}</strong>
                                <small>{{ auth()->user()->email }}</small>
                            @else
                                <strong>Pengunjung</strong>
                                <small>Belum login</small>
                            @endauth

                        </div>

                        <i class="bi bi-chevron-down store-account-arrow"></i>

                    </button>

                    <ul class="dropdown-menu dropdown-menu-end store-account-menu"
                        aria-labelledby="storeAccountDropdown">

                        @auth

                            <li>
                                <div class="store-account-header">

                                    <span class="store-section-subtitle">YOUR ACCOUNT</span>

                                    <h6>Informasi Akun</h6>

                                    <div class="store-account-profile">

                                        <div class="store-account-dropdown-avatar">
                                            <i class="bi bi-person"></i>
                                        </div>

                                        <div class="store-account-identity">
                                            <strong>{{ auth()->user()->nama }}</strong>
                                            <small>{{ auth()->user()->email }}</small>
                                        </div>

                                    </div>

                                    <div class="mt-3">
                                        <span class="badge bg-primary">
                                            {{ ucfirst(auth()->user()->role) }}
                                        </span>
                                    </div>

                                </div>
                            </li>

                            <li><hr class="dropdown-divider"></li>

                            @if($storeIsAdmin)

                                <li class="px-2">
                                    <a href="{{ route('admin.dashboard') }}"
                                       class="dropdown-item">
                                        <i class="bi bi-shop me-2"></i>
                                        Toko Saya
                                    </a>
                                </li>

                                <li><hr class="dropdown-divider"></li>

                            @endif

                            <li class="px-2 pb-2">

                                <form action="{{ route('logout') }}" method="POST">
                                    @csrf

                                    <button type="submit" class="dropdown-item text-danger">
                                        <i class="bi bi-box-arrow-right me-2"></i>
                                        Logout
                                    </button>
                                </form>

                            </li>

                        @else

                            <li>
                                <div class="store-account-header">

                                    <span class="store-section-subtitle">YOUR ACCOUNT</span>

                                    <h6>Selamat Datang!</h6>

                                    <p class="text-secondary small mb-0">
                                        Login atau buat akun untuk menikmati seluruh fitur belanja SportZone.
                                    </p>

                                </div>
                            </li>

                            <li><hr class="dropdown-divider"></li>

                            <li class="px-2">
                                <a href="{{ route('login') }}" class="dropdown-item">
                                    <i class="bi bi-box-arrow-in-right me-2"></i>
                                    Login
                                </a>
                            </li>

                            <li class="px-2 pb-2">
                                <a href="{{ route('register') }}" class="dropdown-item">
                                    <i class="bi bi-person-plus me-2"></i>
                                    Buat Akun
                                </a>
                            </li>

                        @endauth

                    </ul>

                </div>

            </div>

        </header>

        <!-- ALERT GLOBAL -->

        <div class="store-alerts">

            @if(session('success'))

                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>

            @endif

            @if(session('error'))

                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>

            @endif

            @if($errors->any())

                <div class="alert alert-danger alert-dismissible fade show" role="alert">

                    <strong>Terjadi kesalahan:</strong>

                    <ul class="mb-0 mt-1">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>

                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>

                </div>

            @endif

        </div>

        <!-- ISI HALAMAN -->

        <section class="store-content">
            @yield('content')
        </section>

        <!-- FOOTER -->

        <footer class="store-footer">
            &copy; {{ date('Y') }} SportZone. All rights reserved.
        </footer>

    </main>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>

@stack('scripts')

</body>
</html>
