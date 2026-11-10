
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
    color: white;

    font-size: 9px;
    font-weight: 600;
    line-height: 1;

    border-radius: 50px;
    border: 1px solid white;
}

.notification-item {
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


/* Titik untuk notifikasi yang belum dibaca */
.notification-unread-dot {
    width: 7px;
    height: 7px;
    min-width: 7px;
    margin-top: 5px;
    background: #0d6efd;
    border-radius: 50%;
}

/* Dropdown notifikasi */
.notification-item {
    white-space: normal;
    transition: background-color .2s ease;
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

    <!-- SIDEBAR KIRI -->
    <aside class="sidebar" id="sidebar">

        <div class="brand">
            <div class="brand-icon">
                <i class="bi bi-dribbble"></i>
            </div>

            <span>SPORT<span class="brand-blue">ZONE</span></span>
        </div>

        <div class="sidebar-label">MENU UTAMA</div>

        <nav class="sidebar-navigation">

            <!-- Dashboard -->
            <a href="{{ route('home') }}" class="side-link active">
                <i class="bi bi-house-door"></i>
                Dashboard
            </a>

            <!-- Semua Produk -->
            <a href="#catalog" class="side-link">
                <i class="bi bi-grid"></i>
                Semua Produk
            </a>

            <!-- Keranjang -->
            @if(!auth()->check() || auth()->user()->role == 'customer')

                <a
                    href="{{ auth()->check() ? route('cart.index') : route('login') }}"
                    class="side-link"
                >
                    <i class="bi bi-cart3"></i>
                    Keranjang

                    <span class="nav-count">
                        {{ $jumlahKeranjang }}
                    </span>
                </a>

                <!-- Wishlist -->
                <a
                    href="{{ auth()->check() ? route('customer.wishlist.index') : route('login') }}"
                    class="side-link"
                >
                    <i class="bi bi-heart"></i>
                    Wishlist
                </a>
                <!-- Pesanan Saya -->
                @auth
                    <a href="{{ route('customer.orders.index') }}" class="side-link">
                        <i class="bi bi-receipt"></i>
                        Pesanan Saya
                    </a>
                @else
                    <a href="{{ route('login') }}" class="side-link">
                        <i class="bi bi-receipt"></i>
                        Pesanan Saya
                    </a>
                @endauth

            @endif

        </nav>

        <div class="sidebar-divider"></div>

        <div class="sidebar-label">KATEGORI PRODUK</div>

        <div class="sidebar-navigation">

            <a
                href="{{ route('home') }}"
                class="category-link {{ request('category') ? '' : 'active' }}"
            >
                Semua Kategori
            </a>

            @foreach($categories as $category)

                <a
                    href="{{ route('home', array_merge(request()->query(), [
                        'category' => $category->slug,
                        'page' => 1
                    ])) }}"
                    class="category-link {{ request('category') == $category->slug ? 'active' : '' }}"
                >
                    {{ $category->nama_kategori }}
                </a>

            @endforeach

        </div>

        <div class="sidebar-bottom">

            <div class="help-card">
                <i class="bi bi-headset"></i>

                <div>
                    <strong>Butuh Bantuan?</strong>
                    <small>Hubungi layanan pelanggan</small>
                </div>
            </div>

        </div>

    </aside>


    <!-- KONTEN UTAMA -->
    <main class="main-content">

        <!-- TOPBAR -->
        <header class="topbar">

            <button type="button" class="mobile-menu" id="menuButton">
                <i class="bi bi-list"></i>
            </button>

            <div class="mobile-brand">
                <strong>SPORT<span>ZONE</span></strong>
            </div>

            <!-- PENCARIAN -->
            <form action="{{ route('home') }}" method="GET" class="search-box">

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


            <!-- AKSI TOPBAR -->
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

                    <div class="dropdown-menu dropdown-menu-end p-0 shadow border-0"
                         style="width: 330px; max-width: 90vw; border-radius: 12px;">

                        <!-- HEADER NOTIFIKASI -->
                        <div class="d-flex justify-content-between align-items-center p-3 border-bottom">
                            <div>
                                <h6 class="mb-0 fw-bold">Notifikasi</h6>
                                <small class="text-muted">
                                    {{ $jumlahNotifikasi }} belum dibaca
                                </small>
                            </div>
                            <i class="bi bi-bell text-primary"></i>
                        </div>

                        <!-- DAFTAR NOTIFIKASI -->
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

                        <!-- FOOTER NOTIFIKASI -->
                        <div class="p-2 border-top">
                            @if($jumlahNotifikasi > 0)
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


                <!-- Ikon Keranjang -->
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


                <!-- DROPDOWN INFORMASI AKUN -->
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

                                <strong>
                                    {{ auth()->user()->nama }}
                                </strong>

                                <small>
                                    {{ auth()->user()->email }}
                                </small>

                            @else

                                <strong>Pengunjung</strong>

                                <small>Belum login</small>

                            @endauth

                        </div>

                        <i class="bi bi-chevron-down account-arrow"></i>

                    </button>


                    <!-- ISI DROPDOWN -->
                    <ul
                        class="dropdown-menu dropdown-menu-end account-dropdown-menu"
                        aria-labelledby="accountDropdown"
                    >

                        @auth

                            <!-- INFORMASI AKUN -->
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

                                            <strong>
                                                {{ auth()->user()->nama }}
                                            </strong>

                                            <small>
                                                {{ auth()->user()->email }}
                                            </small>

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


                            <!-- LINK DASHBOARD ADMIN -->
                            
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



                            <!-- LOGOUT -->
                            <li class="px-2 pb-2">

                                <form
                                    action="{{ route('logout') }}"
                                    method="POST"
                                >

                                    @csrf

                                    <button
                                        type="submit"
                                        class="dropdown-item text-danger"
                                    >
                                        <i class="bi bi-box-arrow-right me-2"></i>
                                        Logout
                                    </button>

                                </form>

                            </li>


                        @else

                            <!-- PENGUNJUNG BELUM LOGIN -->
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

                                <a
                                    href="{{ route('login') }}"
                                    class="dropdown-item"
                                >
                                    <i class="bi bi-box-arrow-in-right me-2"></i>
                                    Login
                                </a>

                            </li>

                            <li class="px-2 pb-2">

                                <a
                                    href="{{ route('register') }}"
                                    class="dropdown-item"
                                >
                                    <i class="bi bi-person-plus me-2"></i>
                                    Buat Akun
                                </a>

                            </li>

                        @endauth

                    </ul>

                </div>

            </div>

        </header>


        <!-- AREA HALAMAN -->
        <section class="content-area">

            <!-- BANNER -->
            <div class="welcome-banner">

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
                        action="{{ route('home') }}"
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
                                                <i class="bi bi-arrow-right"></i>
                                            </span>

                                        </div>

                                    </div>

                                </article>

                            </a>

                        @endforeach

                    </div>


                    <!-- PAGINATION -->
                    <div class="mt-4">

                        {{ $products->links('pagination::bootstrap-5') }}

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

    <!-- PANEL KANAN DIHILANGKAN -->

</div>


<!-- BOOTSTRAP JAVASCRIPT -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
