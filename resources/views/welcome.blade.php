
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
</head>

<body>

<div class="store-container">

    <!-- SIDEBAR -->
    <aside class="sidebar" id="sidebar">

        <div class="brand">
            <div class="brand-icon">
                <i class="bi bi-dribbble"></i>
            </div>

            <span>SPORT<span class="brand-blue">ZONE</span></span>
        </div>

        <div class="sidebar-label">MENU UTAMA</div>

        <nav class="sidebar-navigation">

            <a href="{{ route('home') }}" class="side-link active">
                <i class="bi bi-house-door"></i>
                Dashboard
            </a>

            <a href="#catalog" class="side-link">
                <i class="bi bi-grid"></i>
                Semua Produk
            </a>

            <a href="#" class="side-link">
                <i class="bi bi-cart3"></i>
                Keranjang
                <span class="nav-count">0</span>
            </a>

            <a href="#" class="side-link">
                <i class="bi bi-heart"></i>
                Wishlist
            </a>

            <a href="#" class="side-link">
                <i class="bi bi-receipt"></i>
                Pesanan Saya
            </a>

        </nav>

        <div class="sidebar-divider"></div>

        <div class="sidebar-label">KATEGORI PRODUK</div>

        <div class="sidebar-navigation">

            <a href="{{ route('home') }}"
               class="category-link {{ request('category') ? '' : 'active' }}">
                Semua Kategori
            </a>

            @foreach($categories as $category)
                <a
                    href="{{ route('home', array_merge(request()->query(), ['category' => $category->slug, 'page' => 1])) }}"
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

            <button class="mobile-menu" id="menuButton">
                <i class="bi bi-list"></i>
            </button>

            <div class="mobile-brand">
                <strong>SPORT<span>ZONE</span></strong>
            </div>

            <form action="{{ route('home') }}" method="GET" class="search-box">

                @if(request('category'))
                    <input type="hidden" name="category" value="{{ request('category') }}">
                @endif

                @if(request('sort'))
                    <input type="hidden" name="sort" value="{{ request('sort') }}">
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

                <button class="icon-button">
                    <i class="bi bi-bell"></i>
                    <span class="notification-dot"></span>
                </button>

                <button class="icon-button">
                    <i class="bi bi-bag"></i>
                    <span class="cart-dot">0</span>
                </button>

                <div class="account-area">

                    <div class="account-avatar">
                        <i class="bi bi-person"></i>
                    </div>

                    <div class="account-info">
                        <strong>Pengunjung</strong>
                        <small>Belum login</small>
                    </div>

                    <i class="bi bi-chevron-down account-arrow"></i>

                </div>

            </div>

        </header>


        <!-- AREA HALAMAN -->
        <section class="content-area">

            <!-- BANNER -->
            <div class="welcome-banner">

                <div class="banner-content">

                    <span class="banner-tag">SPORTZONE OFFICIAL STORE</span>

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
                        <span class="section-subtitle">OUR COLLECTION</span>

                        <h2>Temukan Produk</h2>

                        <p>
                            Pilihan perlengkapan olahraga untuk kebutuhanmu.
                        </p>
                    </div>

                    <form action="{{ route('home') }}" method="GET" class="sort-container">

                        @if(request('search'))
                            <input type="hidden" name="search" value="{{ request('search') }}">
                        @endif

                        @if(request('category'))
                            <input type="hidden" name="category" value="{{ request('category') }}">
                        @endif

                        <span>Urutkan:</span>

                        <select name="sort" class="sort-select" onchange="this.form.submit()">

                            <option value="newest" {{ request('sort', 'newest') == 'newest' ? 'selected' : '' }}>
                                Terbaru
                            </option>

                            <option value="popular" {{ request('sort') == 'popular' ? 'selected' : '' }}>
                                Terpopuler
                            </option>

                            <option value="price_low" {{ request('sort') == 'price_low' ? 'selected' : '' }}>
                                Harga Terendah
                            </option>

                            <option value="price_high" {{ request('sort') == 'price_high' ? 'selected' : '' }}>
                                Harga Tertinggi
                            </option>

                        </select>

                    </form>

                </div>


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

                            <a href="{{ route('products.show', $product->id) }}"
                            class="text-decoration-none text-reset">

                                <article class="product-card">

                                    <div class="product-image">

                                        @if($product->total_stok <= 0)
                                            <span class="product-badge sold-out">Stok Habis</span>
                                        @else
                                            <span class="product-badge">Tersedia</span>
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
                                            <span>{{ $product->terjual }} terjual</span>
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

                        <p>Coba gunakan kata kunci atau kategori lainnya.</p>

                        <a href="{{ route('home') }}" class="btn btn-primary btn-sm mt-2">
                            Tampilkan Semua Produk
                        </a>

                    </div>

                @endif

            </section>

        </section>

    </main>


    <!-- PANEL KANAN -->
    <aside class="detail-panel">

        <div class="detail-heading">
            <div>
                <span class="section-subtitle">YOUR ACCOUNT</span>
                <h3>Informasi Akun</h3>
            </div>
        </div>

        <div class="detail-image">
            <i class="bi bi-person-circle text-secondary" style="font-size: 90px;"></i>
        </div>

        <div class="detail-product-heading">
            <h2>Selamat Datang!</h2>
        </div>

        <p class="text-secondary small mt-2">
            Masuk ke akunmu untuk menikmati seluruh fitur SportZone.
        </p>

        <div class="detail-divider"></div>

        <a href="#" class="detail-cart-button d-block text-center text-decoration-none">
            <i class="bi bi-box-arrow-in-right me-2"></i>
            Login
        </a>

        <a href="#" class="detail-wishlist-button d-block text-center text-decoration-none">
            Buat Akun
        </a>

        <div class="detail-footer">

            <span>
                <i class="bi bi-shield-check"></i>
                Belanja dengan nyaman
            </span>

            <span>
                <i class="bi bi-truck"></i>
                Informasi pengiriman
            </span>

            <span>
                <i class="bi bi-headset"></i>
                Layanan pelanggan
            </span>

        </div>

    </aside>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
