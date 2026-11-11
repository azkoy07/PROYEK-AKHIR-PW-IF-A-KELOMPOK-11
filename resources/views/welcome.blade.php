
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>SportZone - Toko Olahraga</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
       
/* =========================================
   SIDEBAR SPORTZONE - BLUE THEME
========================================= */

.sidebar {
    width: 270px;
    min-width: 270px;
    height: 100vh;
    position: sticky;
    top: 0;
    display: flex;
    flex-direction: column;
    background: #1e40af;
    border-right: 1px solid #1e3a8a;
    padding: 22px 20px 16px;
    overflow-y: auto;
    overflow-x: hidden;
    scrollbar-width: thin;
    scrollbar-color: #60a5fa transparent;
    flex-shrink: 0;
    gap: 0;
}

/* =========================================
   BRAND / LOGO SPORTZONE
========================================= */

.brand {
    display: flex;
    align-items: center;
    gap: 12px;
    padding: 2px 0 14px;
    margin: 0;
    color: #ffffff;
    text-decoration: none;
    flex-shrink: 0;
}

.brand-icon {
    width: 43px;
    height: 43px;
    min-width: 43px;
    display: flex;
    align-items: center;
    justify-content: center;
    color: #1e40af;
    background: #ffffff;
    border-radius: 12px;
    font-size: 23px;
}

.brand-text {
    display: flex;
    flex-direction: column;
    line-height: 1.2;
}

.brand-text > span {
    font-size: 21px;
    font-weight: 800;
    letter-spacing: -0.8px;
    color: #ffffff;
}

.brand-blue {
    color: #bfdbfe;
}

.brand-text small {
    margin-top: 4px;
    color: #bfdbfe;
    font-size: 9px;
    font-weight: 700;
    letter-spacing: 1.5px;
}

/* =========================================
   PEMISAH SIDEBAR
========================================= */

.sidebar-divider {
    height: 1px;
    width: 100%;
    background: rgba(255, 255, 255, 0.2);
    margin: 8px 0 16px;
    flex-shrink: 0;
}

.sidebar-label {
    margin: 0 0 9px;
    color: #bfdbfe;
    font-size: 11px;
    font-weight: 700;
    letter-spacing: 1px;
    line-height: 1.4;
    flex-shrink: 0;
}

/* =========================================
   NAVIGASI UTAMA
========================================= */

.sidebar-navigation {
    display: flex;
    flex-direction: column;
    gap: 5px;
    flex-shrink: 0;
}

.side-link {
    min-height: 46px;
    height: 46px;
    display: flex;
    align-items: center;
    gap: 13px;
    padding: 0 13px;
    color: #dbeafe;
    text-decoration: none;
    font-size: 13px;
    font-weight: 500;
    border-radius: 9px;
    transition: all 0.2s ease;
    flex-shrink: 0;
}

.side-link > i:first-child {
    width: 20px;
    font-size: 18px;
    text-align: center;
    flex-shrink: 0;
    color: #bfdbfe;
}

.side-link span {
    flex: 1;
}

.side-link:hover {
    color: #ffffff;
    background: rgba(255, 255, 255, 0.12);
}

.side-link:hover > i:first-child {
    color: #ffffff;
}

.side-link.active {
    color: #1e40af;
    background: #ffffff;
    font-weight: 700;
}

.side-link.active > i:first-child {
    color: #2563eb;
}

.side-link-external {
    margin-left: auto;
    font-size: 12px;
    color: #bfdbfe;
}

/* JUMLAH KERANJANG */

.nav-count {
    min-width: 21px;
    height: 21px;
    padding: 0 5px;
    display: flex;
    align-items: center;
    justify-content: center;
    background: #ffffff;
    color: #1e40af;
    border-radius: 20px;
    font-size: 10px;
    font-weight: 700;
}

/* =========================================
   KATEGORI PRODUK
========================================= */

.category-navigation {
    gap: 4px;
}

.category-link {
    min-height: 42px;
    height: 42px;
    display: flex;
    align-items: center;
    gap: 11px;
    padding: 0 12px;
    color: #dbeafe;
    text-decoration: none;
    font-size: 12.5px;
    font-weight: 500;
    border-radius: 8px;
    transition: all 0.2s ease;
    flex-shrink: 0;
}

.category-link i {
    width: 18px;
    font-size: 15px;
    text-align: center;
    color: #bfdbfe;
}

.category-link:hover {
    color: #ffffff;
    background: rgba(255, 255, 255, 0.12);
}

.category-link:hover i {
    color: #ffffff;
}

.category-link.active {
    color: #1e40af;
    background: #ffffff;
    font-weight: 700;
}

.category-link.active i {
    color: #2563eb;
}

/* =========================================
   BAGIAN BAWAH SIDEBAR
========================================= */

.sidebar-bottom {
    margin-top: auto;
    padding-top: 18px;
    flex-shrink: 0;
}

/* KARTU BANTUAN */

.help-card {
    display: flex;
    align-items: center;
    gap: 11px;
    padding: 11px;
    margin-bottom: 12px;
    background: rgba(255, 255, 255, 0.1);
    border: 1px solid rgba(255, 255, 255, 0.15);
    border-radius: 10px;
}

.help-icon {
    width: 35px;
    height: 35px;
    min-width: 35px;
    display: flex;
    align-items: center;
    justify-content: center;
    color: #1e40af;
    background: #ffffff;
    border-radius: 9px;
    font-size: 17px;
}

.help-info {
    display: flex;
    flex-direction: column;
    gap: 3px;
}

.help-info strong {
    color: #ffffff;
    font-size: 11px;
    font-weight: 700;
}

.help-info small {
    color: #bfdbfe;
    font-size: 9px;
}

/* =========================================
   TOMBOL GUEST
========================================= */

.sidebar-guest-actions {
    display: flex;
    gap: 8px;
}

.sidebar-login,
.sidebar-register {
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
    transition: all 0.2s ease;
}

.sidebar-login {
    color: #1e40af;
    background: #ffffff;
}

.sidebar-login:hover {
    color: #1e40af;
    background: #dbeafe;
}

.sidebar-register {
    color: #1e40af;
    background: #bfdbfe;
}

.sidebar-register:hover {
    color: #1e40af;
    background: #ffffff;
}

/* =========================================
   PROFIL PENGGUNA
========================================= */

.sidebar-user {
    display: flex;
    align-items: center;
    gap: 10px;
    padding: 10px 9px;
    border-top: 1px solid rgba(255, 255, 255, 0.2);
}

.sidebar-user-avatar {
    width: 37px;
    height: 37px;
    min-width: 37px;
    display: flex;
    align-items: center;
    justify-content: center;
    color: #1e40af;
    background: #ffffff;
    border-radius: 50%;
    font-size: 18px;
}

.sidebar-user-info {
    min-width: 0;
    flex: 1;
    display: flex;
    flex-direction: column;
    gap: 3px;
}

.sidebar-user-info strong {
    color: #ffffff;
    font-size: 11px;
    font-weight: 700;
    overflow: hidden;
    text-overflow: ellipsis;
    white-space: nowrap;
}

.sidebar-user-info small {
    color: #bfdbfe;
    font-size: 10px;
}

.sidebar-user-more {
    width: 29px;
    height: 29px;
    display: flex;
    align-items: center;
    justify-content: center;
    color: #ffffff;
    background: transparent;
    border: none;
    border-radius: 7px;
}

.sidebar-user-more:hover {
    color: #1e40af;
    background: #ffffff;
}

/* =========================================
   NOTIFIKASI
========================================= */

.notification-count {
    position: absolute;
    top: 2px;
    right: 2px;
    min-width: 15px;
    height: 15px;
    padding: 0 4px;
    display: flex;
    align-items: center;
    justify-content: center;
    background-color: #dc3545;
    color: #ffffff;
    font-size: 9px;
    font-weight: 600;
    line-height: 1;
    border-radius: 50px;
    border: 1px solid #ffffff;
}

.notification-item {
    white-space: normal;
    transition: background-color 0.2s ease;
}

.notification-item:hover {
    background-color: #f5f7fa;
}

.notification-item:active {
    background-color: #e9eef5;
}

.notification-item .fw-semibold {
    font-size: 13px;
}

.notification-item .small {
    font-size: 11px;
    line-height: 1.5;
}

.notification-unread-dot {
    width: 7px;
    height: 7px;
    min-width: 7px;
    margin-top: 5px;
    background: #2563eb;
    border-radius: 50%;
}

/* =========================================
   SCROLL KE KATALOG
========================================= */

#catalog {
    scroll-margin-top: 25px;
}

/* =========================================
   KONSISTENSI JARAK SIDEBAR
========================================= */

.sidebar .brand {
    margin: 0 !important;
    padding: 2px 0 14px !important;
}

.sidebar .sidebar-divider {
    margin: 8px 0 16px !important;
}

.sidebar .sidebar-label {
    margin: 0 0 9px !important;
}

.sidebar .sidebar-navigation {
    gap: 5px;
}

.sidebar .category-navigation {
    gap: 4px;
}

.sidebar .sidebar-bottom {
    margin-top: auto;
    padding-top: 18px;
}

.sidebar .sidebar-user {
    padding: 10px 9px;
}

.sidebar .help-card {
    margin-bottom: 12px;
    padding: 11px;
}

.sidebar .sidebar-guest-actions {
    gap: 8px;
}

/* =========================
   NAVBAR SPORTZONE
========================= */

.topbar {
    background: #E8EEF8 !important;
    background-image: none !important;
    border-bottom: 1px solid #D5DEEC !important;
    color: #1E293B !important;
}

/* Tombol menu */
.topbar .mobile-menu {
    color: #1E40AF !important;
}

/* Logo */
.topbar .mobile-brand {
    color: #1E293B !important;
}

.topbar .mobile-brand span {
    color: #1E40AF !important;
}

/* Search */
.topbar .search-box {
    background: #FFFFFF !important;
    border: 1px solid #D5DEEC !important;
}

.topbar .search-box i {
    color: #64748B !important;
}

.topbar .search-box input {
    color: #1E293B !important;
}

.topbar .search-box input::placeholder {
    color: #94A3B8 !important;
}

.topbar .search-shortcut {
    background: #F1F5F9 !important;
    color: #64748B !important;
}

/* Tombol notifikasi dan keranjang */
.topbar .icon-button {
    background: #DCE6F5 !important;
    color: #1E40AF !important;
    border: none !important;
}

.topbar .icon-button:hover {
    background: #1E40AF !important;
    color: #FFFFFF !important;
}

/* Indikator keranjang */
.topbar .cart-dot {
    background: #2563EB !important;
    border-color: #E8EEF8 !important;
}

/* Akun pengguna */
.topbar .account-area {
    color: #1E293B !important;
}

.topbar .account-area:hover {
    background: #DCE6F5 !important;
}

.topbar .account-avatar {
    background: #D1DFF3 !important;
    color: #1E40AF !important;
}

.topbar .account-info strong {
    color: #1E293B !important;
}

.topbar .account-info small {
    color: #64748B !important;
}

.topbar .account-arrow {
    color: #64748B !important;
}

/* Dropdown akun */
.topbar .account-dropdown-menu {
    background: #FFFFFF !important;
    border: 1px solid #E2E8F0 !important;
}

.topbar .account-dropdown-menu a {
    color: #334155 !important;
}

.topbar .account-dropdown-menu a:hover {
    background: #EFF6FF !important;
    color: #1E40AF !important;
}

/* =========================================
   FIX SIDEBAR DAN NAVBAR AGAR MENYATU
========================================= */

html,
body {
    margin: 0 !important;
    padding: 0 !important;
    width: 100%;
    min-height: 100%;
}

/* Pembungkus sidebar dan konten */
.store-container {
    display: flex !important;
    flex-direction: row !important;
    align-items: flex-start !important;
    gap: 0 !important;
    margin: 0 !important;
    padding: 0 !important;
    width: 100%;
    min-height: 100vh;
}

/* Sidebar */
.store-container > .sidebar {
    flex: 0 0 270px !important;
    width: 270px !important;
    min-width: 270px !important;
    height: 100vh !important;
    margin: 0 !important;
    top: 0 !important;
}

/* Area utama */
.store-container > .main-content {
    flex: 1 !important;
    min-width: 0;
    margin: 0 !important;
    padding: 0 !important;
}

/* Navbar */
.main-content > .topbar {
    position: sticky;
    top: 0;
    margin: 0 !important;
    width: 100%;
    border-radius: 0 !important;
    z-index: 1000;
}



    </style>
</head>

<body>

@php
    // Menghitung jumlah produk di keranjang customer
    $jumlahKeranjang = 0;

    if (auth()->check() && auth()->user()->role == 'customer') {
        $jumlahKeranjang = \Illuminate\Support\Facades\DB::table('cart_items')
            ->where('user_id', auth()->id())
            ->sum('qty');
    }
@endphp

<div class="store-container">

    <!-- =========================================
         SIDEBAR KIRI
    ========================================== -->

    <aside class="sidebar" id="sidebar">

        <a href="{{ route('home') }}" class="brand">
            <div class="brand-icon">
                <i class="bi bi-dribbble"></i>
            </div>

            <div class="brand-text">
                <span>SPORT<span class="brand-blue">ZONE</span></span>
                <small>SPORTS STORE</small>
            </div>
        </a>

        <div class="sidebar-divider"></div>

        <div class="sidebar-label">MENU UTAMA</div>

        <nav class="sidebar-navigation">

            <a
                href="{{ route('home') }}"
                class="side-link {{ request()->routeIs('home') && !request()->has('category') && !request()->has('search') ? 'active' : '' }}"
            >
                <i class="bi bi-house-door"></i>
                <span>Dashboard</span>
            </a>

            <a href="{{ route('home') }}#catalog" class="side-link">
                <i class="bi bi-grid"></i>
                <span>Semua Produk</span>
            </a>

            @if(!auth()->check() || auth()->user()->role == 'customer')

                <a
                    href="{{ auth()->check() ? route('cart.index') : route('login') }}"
                    class="side-link"
                >
                    <i class="bi bi-cart3"></i>
                    <span>Keranjang</span>

                    @if($jumlahKeranjang > 0)
                        <span class="nav-count">
                            {{ $jumlahKeranjang > 99 ? '99+' : $jumlahKeranjang }}
                        </span>
                    @endif
                </a>

                <a
                    href="{{ auth()->check() ? route('customer.wishlist.index') : route('login') }}"
                    class="side-link"
                >
                    <i class="bi bi-heart"></i>
                    <span>Wishlist</span>
                </a>

                <a
                    href="{{ auth()->check() ? route('customer.orders.index') : route('login') }}"
                    class="side-link"
                >
                    <i class="bi bi-receipt"></i>
                    <span>Pesanan Saya</span>
                </a>

            @endif

            @if(auth()->check() && auth()->user()->role == 'admin')
                <a href="{{ route('admin.dashboard') }}" class="side-link">
                    <i class="bi bi-speedometer2"></i>
                    <span>Panel Admin</span>
                    <i class="bi bi-box-arrow-up-right side-link-external"></i>
                </a>
            @endif

        </nav>

        <div class="sidebar-divider"></div>

        <div class="sidebar-label">KATEGORI PRODUK</div>

        <nav class="sidebar-navigation category-navigation">

            <!-- SEMUA KATEGORI -->
            <a
                href="{{ route('home', request()->except(['category', 'page'])) }}#catalog"
                class="category-link {{ !request('category') ? 'active' : '' }}"
            >
                <i class="bi bi-grid-3x3-gap"></i>
                <span>Semua Kategori</span>
            </a>

            <!-- KATEGORI BERDASARKAN DATABASE -->
            @foreach($categories as $category)

                <a
                    href="{{ route('home', array_merge(
                        request()->except(['page']),
                        ['category' => $category->slug, 'page' => 1]
                    )) }}#catalog"
                    class="category-link {{ request('category') == $category->slug ? 'active' : '' }}"
                >
                    <i class="bi bi-tag"></i>
                    <span>{{ $category->nama_kategori }}</span>
                </a>

            @endforeach

        </nav>

        <div class="sidebar-bottom">

            @guest

                <div class="help-card">
                    <div class="help-icon">
                        <i class="bi bi-headset"></i>
                    </div>

                    <div class="help-info">
                        <strong>Butuh Bantuan?</strong>
                        <small>Hubungi layanan pelanggan</small>
                    </div>
                </div>

                <div class="sidebar-guest-actions">

                    <a href="{{ route('login') }}" class="sidebar-login">
                        <i class="bi bi-box-arrow-in-right"></i>
                        Masuk
                    </a>

                    <a href="{{ route('register') }}" class="sidebar-register">
                        Daftar
                    </a>

                </div>

            @endguest

            @auth

                <div class="sidebar-user">

                    <div class="sidebar-user-avatar">
                        <i class="bi bi-person-fill"></i>
                    </div>

                    <div class="sidebar-user-info">
                        <strong>{{ auth()->user()->nama }}</strong>

                        <small>
                            {{ auth()->user()->role == 'admin' ? 'Administrator' : 'Customer' }}
                        </small>
                    </div>

                    <div class="dropdown">

                        <button
                            type="button"
                            class="sidebar-user-more"
                            data-bs-toggle="dropdown"
                            aria-expanded="false"
                            title="Menu akun"
                        >
                            <i class="bi bi-three-dots-vertical"></i>
                        </button>

                        <ul class="dropdown-menu dropdown-menu-end shadow-sm border-0">

                            @if(auth()->user()->role == 'admin')
                                <li>
                                    <a href="{{ route('admin.dashboard') }}" class="dropdown-item">
                                        <i class="bi bi-speedometer2 me-2"></i>
                                        Dashboard Admin
                                    </a>
                                </li>

                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                            @endif

                            <li>
                                <form action="{{ route('logout') }}" method="POST">
                                    @csrf

                                    <button type="submit" class="dropdown-item text-danger">
                                        <i class="bi bi-box-arrow-right me-2"></i>
                                        Logout
                                    </button>
                                </form>
                            </li>

                        </ul>

                    </div>

                </div>

            @endauth

        </div>

    </aside>


    <!-- =========================================
         KONTEN UTAMA
    ========================================== -->

    <main class="main-content">

        <header class="topbar">

            <button type="button" class="mobile-menu" id="menuButton">
                <i class="bi bi-list"></i>
            </button>

            <div class="mobile-brand">
                <strong>SPORT<span>ZONE</span></strong>
            </div>

            <!-- PENCARIAN -->
            <form action="{{ route('home') }}#catalog" method="GET" class="search-box">

                @if(request('category'))
                    <input
                        type="hidden"
                        name="category"
                        value="{{ request('category') }}"
                    >
                @endif

                @if(request('sort'))
                    <input
                        type="hidden"
                        name="sort"
                        value="{{ request('sort') }}"
                    >
                @endif

                <i class="bi bi-search"></i>

                <input
                    type="text"
                    name="search"
                    placeholder="Cari sepatu, pakaian, atau perlengkapan olahraga..."
                    value="{{ request('search') }}"
                >

                <button type="submit" class="search-shortcut border-0 bg-transparent">
                    <i class="bi bi-arrow-return-left"></i>
                </button>

            </form>

            <div class="topbar-actions">

                <!-- NOTIFIKASI -->
                <div class="dropdown">

                    <button
                        type="button"
                        class="icon-button position-relative"
                        data-bs-toggle="dropdown"
                        aria-expanded="false"
                        title="Notifikasi"
                    >
                        <i class="bi bi-bell"></i>

                        @if($jumlahNotifikasi > 0)
                            <span class="notification-count">
                                {{ $jumlahNotifikasi > 9 ? '9+' : $jumlahNotifikasi }}
                            </span>
                        @endif

                    </button>

                    <div
                        class="dropdown-menu dropdown-menu-end p-0 shadow border-0"
                        style="width: 330px; max-width: 90vw; border-radius: 12px;"
                    >

                        <div class="d-flex justify-content-between align-items-center p-3 border-bottom">
                            <div>
                                <h6 class="mb-0 fw-bold">Notifikasi</h6>

                                <small class="text-muted">
                                    {{ $jumlahNotifikasi }} belum dibaca
                                </small>
                            </div>

                            <i class="bi bi-bell text-primary"></i>
                        </div>

                        <div style="max-height: 350px; overflow-y: auto;">

                            @forelse($notifikasi as $item)

                                <a
                                    href="{{ route('notifications.read', $item->id) }}"
                                    class="dropdown-item text-wrap p-3 border-bottom notification-item"
                                >
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
                                                    <span class="notification-unread-dot"></span>
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

                                    <p class="fw-semibold mt-2 mb-1">
                                        Belum Ada Notifikasi
                                    </p>

                                    <small class="text-muted">
                                        Informasi terbaru akan muncul di sini.
                                    </small>

                                </div>

                            @endforelse

                        </div>

                        <div class="p-2 border-top">

                            @if($jumlahNotifikasi > 0)

                                <form
                                    action="{{ route('notifications.read-all') }}"
                                    method="POST"
                                    class="mb-2"
                                >
                                    @csrf

                                    <button type="submit" class="btn btn-sm btn-light w-100">
                                        <i class="bi bi-check2-all"></i>
                                        Tandai Semua Dibaca
                                    </button>

                                </form>

                            @endif

                            <a
                                href="{{ route('notifications.index') }}"
                                class="btn btn-sm btn-outline-primary w-100"
                            >
                                Lihat Semua Notifikasi
                            </a>

                        </div>

                    </div>

                </div>


                <!-- IKON KERANJANG -->
                @if(!auth()->check() || auth()->user()->role == 'customer')

                    <a
                        href="{{ auth()->check() ? route('cart.index') : route('login') }}"
                        class="icon-button text-decoration-none"
                        title="Keranjang Belanja"
                    >
                        <i class="bi bi-bag"></i>

                        <span class="cart-dot">
                            {{ $jumlahKeranjang }}
                        </span>
                    </a>

                @endif


                <!-- DROPDOWN AKUN -->
                <div class="dropdown account-dropdown">

                    <button
                        type="button"
                        class="account-area dropdown-toggle"
                        id="accountDropdown"
                        data-bs-toggle="dropdown"
                        aria-expanded="false"
                    >

                        <div class="account-avatar">
                            <i class="bi bi-person"></i>
                        </div>

                        <div class="account-info">

                            @auth
                                <strong>{{ auth()->user()->nama }}</strong>
                                <small>{{ auth()->user()->email }}</small>
                            @else
                                <strong>Pengunjung</strong>
                                <small>Belum login</small>
                            @endauth

                        </div>

                        <i class="bi bi-chevron-down account-arrow"></i>

                    </button>


                    <ul
                        class="dropdown-menu dropdown-menu-end account-dropdown-menu"
                        aria-labelledby="accountDropdown"
                    >

                        @auth

                            <li>

                                <div class="account-dropdown-header">

                                    <span class="section-subtitle">
                                        YOUR ACCOUNT
                                    </span>

                                    <h6>Informasi Akun</h6>

                                    <div class="account-dropdown-profile">

                                        <div class="account-dropdown-avatar">
                                            <i class="bi bi-person"></i>
                                        </div>

                                        <div class="account-dropdown-identity">
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

                            <li>
                                <hr class="dropdown-divider">
                            </li>

                            @if(auth()->user()->role == 'admin')

                                <li class="px-2">

                                    <a
                                        href="{{ route('admin.dashboard') }}"
                                        class="dropdown-item"
                                    >
                                        <i class="bi bi-shop me-2"></i>
                                        Toko Saya
                                    </a>

                                </li>

                                <li>
                                    <hr class="dropdown-divider">
                                </li>

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

                                <div class="account-dropdown-header">

                                    <span class="section-subtitle">
                                        YOUR ACCOUNT
                                    </span>

                                    <h6>Selamat Datang!</h6>

                                    <p class="text-secondary small mb-0">
                                        Login atau buat akun untuk menikmati seluruh fitur belanja SportZone.
                                    </p>

                                </div>

                            </li>

                            <li>
                                <hr class="dropdown-divider">
                            </li>

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


        <!-- =========================================
            AREA HALAMAN
        ========================================== -->

        <section class="content-area">

            <!-- BANNER -->
            <div class="welcome-banner">

                
                <!-- =========================================
                    BANNER PROMOSI SPORTZONE
                ========================================== -->

                <div
                    id="sportZoneBanner"
                    class="carousel slide sportzone-carousel"
                    data-bs-ride="carousel"
                    data-bs-interval="5000"
                    data-bs-pause="false"
                    data-bs-wrap="true"
                >

                    <!-- INDIKATOR BANNER -->
                    <div class="carousel-indicators">

                        <button
                            type="button"
                            data-bs-target="#sportZoneBanner"
                            data-bs-slide-to="0"
                            class="active"
                            aria-current="true"
                            aria-label="Banner 1"
                        ></button>

                        <button
                            type="button"
                            data-bs-target="#sportZoneBanner"
                            data-bs-slide-to="1"
                            aria-label="Banner 2"
                        ></button>

                        <button
                            type="button"
                            data-bs-target="#sportZoneBanner"
                            data-bs-slide-to="2"
                            aria-label="Banner 3"
                        ></button>

                    </div>


                    <!-- ISI BANNER -->
                    <div class="carousel-inner">

                        <!-- BANNER 1 -->
                        <div class="carousel-item active">

                            <div class="welcome-banner banner-one">

                                <div class="banner-content">

                                    <span class="banner-tag">
                                        SPORTZONE OFFICIAL STORE
                                    </span>

                                    <h1>
                                        Find Your Best<br>
                                        Sports Equipment.
                                    </h1>

                                    <p>
                                        Temukan perlengkapan olahraga berkualitas
                                        untuk mendukung aktivitas dan performa terbaikmu.
                                    </p>

                                    <a href="#catalog" class="banner-button">
                                        Jelajahi Produk
                                        <i class="bi bi-arrow-right"></i>
                                    </a>

                                </div>

                                <div class="banner-decoration">
                                    <i class="bi bi-dribbble"></i>
                                </div>

                                <span class="banner-number">01 / 03</span>

                            </div>

                        </div>


                        <!-- BANNER 2 -->
                        <div class="carousel-item">

                            <div class="welcome-banner banner-two">

                                <div class="banner-content">

                                    <span class="banner-tag">
                                        COMPLETE YOUR PERFORMANCE
                                    </span>

                                    <h1>
                                        Upgrade Your<br>
                                        Sports Style.
                                    </h1>

                                    <p>
                                        Lengkapi kebutuhan olahraga dengan pilihan
                                        sepatu, pakaian, dan perlengkapan terbaik.
                                    </p>

                                    <a href="#catalog" class="banner-button">
                                        Lihat Koleksi
                                        <i class="bi bi-arrow-right"></i>
                                    </a>

                                </div>

                                <div class="banner-decoration">
                                    <i class="bi bi-lightning-charge-fill"></i>
                                </div>

                                <span class="banner-number">02 / 03</span>

                            </div>

                        </div>


                        <!-- BANNER 3 -->
                        <div class="carousel-item">

                            <div class="welcome-banner banner-three">

                                <div class="banner-content">

                                    <span class="banner-tag">
                                        YOUR SPORT, YOUR PASSION
                                    </span>

                                    <h1>
                                        Ready to Move.<br>
                                        Ready to Win.
                                    </h1>

                                    <p>
                                        Mulai perjalanan olahragamu dengan perlengkapan
                                        yang mendukung setiap langkah dan tantangan.
                                    </p>

                                    <a href="#catalog" class="banner-button">
                                        Temukan Produk
                                        <i class="bi bi-arrow-right"></i>
                                    </a>

                                </div>

                                <div class="banner-decoration">
                                    <i class="bi bi-trophy-fill"></i>
                                </div>

                                <span class="banner-number">03 / 03</span>

                            </div>

                        </div>

                    </div>


                    <!-- TOMBOL SEBELUMNYA -->
                    <button
                        class="carousel-control-prev"
                        type="button"
                        data-bs-target="#sportZoneBanner"
                        data-bs-slide="prev"
                        aria-label="Banner sebelumnya"
                    >
                        <span class="banner-control-icon">
                            <i class="bi bi-chevron-left"></i>
                        </span>
                    </button>


                    <!-- TOMBOL BERIKUTNYA -->
                    <button
                        class="carousel-control-next"
                        type="button"
                        data-bs-target="#sportZoneBanner"
                        data-bs-slide="next"
                        aria-label="Banner berikutnya"
                    >
                        <span class="banner-control-icon">
                            <i class="bi bi-chevron-right"></i>
                        </span>
                    </button>

                </div>


            </div>


            <!-- KATALOG -->
            <section class="catalog-section" id="catalog">

                <div class="catalog-header">

                    <div>

                        <span class="section-subtitle">
                            OUR COLLECTION
                        </span>

                        <h2>Temukan Produk</h2>

                        <p>
                            Pilihan perlengkapan olahraga untuk kebutuhanmu.
                        </p>

                    </div>


                    <!-- SORTING -->
                    <form
                        action="{{ route('home') }}#catalog"
                        method="GET"
                        class="sort-container"
                    >

                        @if(request('search'))
                            <input
                                type="hidden"
                                name="search"
                                value="{{ request('search') }}"
                            >
                        @endif

                        @if(request('category'))
                            <input
                                type="hidden"
                                name="category"
                                value="{{ request('category') }}"
                            >
                        @endif

                        <span>Urutkan:</span>

                        <select
                            name="sort"
                            class="sort-select"
                            onchange="this.form.submit()"
                        >

                            <option
                                value="newest"
                                {{ request('sort', 'newest') == 'newest' ? 'selected' : '' }}
                            >
                                Terbaru
                            </option>

                            <option
                                value="popular"
                                {{ request('sort') == 'popular' ? 'selected' : '' }}
                            >
                                Terpopuler
                            </option>

                            <option
                                value="price_low"
                                {{ request('sort') == 'price_low' ? 'selected' : '' }}
                            >
                                Harga Terendah
                            </option>

                            <option
                                value="price_high"
                                {{ request('sort') == 'price_high' ? 'selected' : '' }}
                            >
                                Harga Tertinggi
                            </option>

                        </select>

                    </form>

                </div>


                <!-- JUMLAH PRODUK -->
                <div class="product-count">

                    <span>
                        Menampilkan {{ $products->firstItem() ?? 0 }} -
                        {{ $products->lastItem() ?? 0 }}
                        dari {{ $products->total() }} produk
                    </span>

                    <div class="view-options">
                        <i class="bi bi-grid-3x3-gap-fill active"></i>
                        <i class="bi bi-list"></i>
                    </div>

                </div>


                <!-- DAFTAR PRODUK -->
                @if($products->count() > 0)

                    <div class="product-grid">

                        @foreach($products as $product)

                            <a
                                href="{{ route('products.show', $product->id) }}"
                                class="text-decoration-none text-reset"
                            >

                                <article class="product-card">

                                    <div class="product-image">

                                        @if($product->total_stok <= 0)
                                            <span class="product-badge sold-out">
                                                Stok Habis
                                            </span>
                                        @else
                                            <span class="product-badge">
                                                Tersedia
                                            </span>
                                        @endif

                                        @if($product->file_name)

                                            <img
                                                src="{{ asset('storage/' . $product->file_name) }}"
                                                alt="{{ $product->nama }}"
                                            >

                                        @else

                                            <i class="bi bi-image text-secondary fs-1"></i>

                                        @endif

                                    </div>


                                    <div class="product-info">

                                        <span class="product-category">
                                            {{ $product->nama_kategori }}
                                        </span>

                                        <h3>{{ $product->nama }}</h3>

                                        <div class="product-rating">

                                            <i class="bi bi-star-fill"></i>

                                            <span>
                                                {{ $product->terjual }} terjual
                                            </span>

                                        </div>

                                        <div class="product-bottom">

                                            <strong>
                                                Rp{{ number_format($product->harga_dasar, 0, ',', '.') }}
                                            </strong>

                                            <span class="add-button">
                                                <i class="bi bi-arrow-right"
                                                style="display: flex; align-items: center; justify-content: center; width: 100%; height: 100%;"></i>
                                            </span>
                                        </div>

                                    </div>

                                </article>

                            </a>

                        @endforeach

                    </div>


                    <!-- PAGINATION -->
                    <div class="mt-4">
                        {{ $products->appends(request()->query())->fragment('catalog')->links('pagination::bootstrap-5') }}
                    </div>


                @else

                    <div class="empty-message">

                        <i class="bi bi-search"></i>

                        <h4>Produk tidak ditemukan</h4>

                        <p>
                            Coba gunakan kata kunci atau kategori lainnya.
                        </p>

                        <a
                            href="{{ route('home') }}"
                            class="btn btn-primary btn-sm mt-2"
                        >
                            Tampilkan Semua Produk
                        </a>

                    </div>

                @endif

            </section>

        </section>

    </main>

</div>


<!-- =========================================
     JAVASCRIPT
========================================== -->

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>

<script>
    document.addEventListener('DOMContentLoaded', function () {

        /*
         * Scroll otomatis ke katalog apabila URL memiliki
         * hash #catalog.
         *
         * Berlaku untuk:
         * - Pencarian produk
         * - Pemilihan kategori
         * - Tombol Semua Kategori
         * - Pengurutan produk
         * - Pagination
         */

        if (window.location.hash === '#catalog') {

            const catalog = document.getElementById('catalog');

            if (catalog) {

                setTimeout(function () {

                    catalog.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });

                }, 150);

            }

        }

    });
</script>

</body>
</html>
