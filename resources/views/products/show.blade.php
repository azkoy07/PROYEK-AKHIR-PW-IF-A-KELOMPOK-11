
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>{{ $product->nama }} - SportZone</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css" rel="stylesheet">
</head>

<body class="bg-light">

<div class="container py-5">

    <!-- Tombol Kembali -->
    <a href="{{ route('home') }}"
       class="btn btn-outline-secondary mb-4">
        <i class="bi bi-arrow-left"></i>
        Kembali ke Katalog
    </a>


    <!-- Notifikasi Error -->
    @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif


    <!-- Notifikasi Berhasil -->
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif


    <!-- Validasi Error -->
    @if($errors->any())
        <div class="alert alert-danger">
            @foreach($errors->all() as $error)
                <div>{{ $error }}</div>
            @endforeach
        </div>
    @endif


    <!-- DETAIL PRODUK -->
    <div class="card border-0 shadow-sm">

        <div class="card-body p-4">

            <div class="row g-4">


                <!-- GAMBAR PRODUK -->
                <div class="col-md-5">

                    <div
                        class="bg-light rounded d-flex align-items-center justify-content-center"
                        style="min-height: 350px;"
                    >

                        @if($image && $image->file_name)

                            <img
                                src="{{ asset('storage/' . $image->file_name) }}"
                                alt="{{ $product->nama }}"
                                class="img-fluid rounded"
                                style="max-height: 350px; object-fit: contain;"
                            >

                        @else

                            <i
                                class="bi bi-image text-secondary"
                                style="font-size: 100px;"
                            ></i>

                        @endif

                    </div>

                </div>


                <!-- INFORMASI PRODUK -->
                <div class="col-md-7">

                    <!-- Kategori -->
                    <span class="badge bg-primary mb-2">
                        {{ $product->nama_kategori ?? 'Tanpa Kategori' }}
                    </span>


                    <!-- Nama Produk -->
                    <h2 class="fw-bold">
                        {{ $product->nama }}
                    </h2>


                    <!-- Rating dan Ulasan -->
                    @include('products.reviews.summary', [
                        'product' => $product
                    ])


                    <!-- Merek -->
                    <p class="text-secondary mb-2">
                        Merek: {{ $product->merek ?? '-' }}
                    </p>


                    <!-- Harga -->
                    <h3 class="text-primary fw-bold mb-3">
                        Rp{{ number_format($product->harga_dasar, 0, ',', '.') }}
                    </h3>


                    <!-- Jumlah Terjual -->
                    <p>
                        <strong>Terjual:</strong>
                        {{ $product->terjual ?? 0 }} produk
                    </p>


                    <!-- Total Stok -->
                    <p>
                        <strong>Total Stok:</strong>
                        {{ $totalStok }}
                    </p>


                    <hr>


                    <!-- DESKRIPSI PRODUK -->
                    <h5 class="fw-bold">
                        Deskripsi Produk
                    </h5>

                    <p class="text-secondary">
                        {{ $product->deskripsi ?: 'Belum ada deskripsi produk.' }}
                    </p>


                    <hr>


                    <!-- =====================================
                         PEMERIKSAAN STOK PRODUK
                    ====================================== -->

                    @if($totalStok > 0)


                        <!-- =================================
                             CUSTOMER SUDAH LOGIN
                        ================================== -->

                        @if(auth()->check() && auth()->user()->role === 'customer')

                            <form
                                action="{{ route('cart.store') }}"
                                method="POST"
                            >

                                @csrf


                                <!-- ID PRODUK -->
                                <input
                                    type="hidden"
                                    name="product_id"
                                    value="{{ $product->id }}"
                                >


                                <!-- PILIHAN VARIASI -->
                                @if($product->jenis_produk == 'variasi')

                                    <div class="mb-3">

                                        <label
                                            for="variant_id"
                                            class="form-label fw-bold"
                                        >
                                            Pilih Ukuran / Warna
                                        </label>


                                        <select
                                            name="variant_id"
                                            id="variant_id"
                                            class="form-select"
                                            required
                                        >

                                            <option value="">
                                                Pilih variasi produk
                                            </option>


                                            @foreach($variants as $variant)

                                                @if($variant->stok > 0)

                                                    <option
                                                        value="{{ $variant->id }}"
                                                        {{ old('variant_id') == $variant->id ? 'selected' : '' }}
                                                    >

                                                        {{ $variant->ukuran ?: '-' }}
                                                        /
                                                        {{ $variant->warna ?: '-' }}

                                                        - Rp{{ number_format($variant->harga, 0, ',', '.') }}

                                                        (Stok: {{ $variant->stok }})

                                                    </option>

                                                @endif

                                            @endforeach

                                        </select>

                                    </div>


                                @else

                                    <!-- PRODUK TANPA VARIASI -->
                                    <input
                                        type="hidden"
                                        name="variant_id"
                                        value=""
                                    >

                                    <p class="text-success">

                                        <i class="bi bi-check-circle"></i>

                                        Produk tersedia:
                                        {{ $product->stok }} stok

                                    </p>

                                @endif


                                <!-- JUMLAH PEMBELIAN -->
                                <div class="mb-4">

                                    <label
                                        for="qty"
                                        class="form-label fw-bold"
                                    >
                                        Jumlah Pembelian
                                    </label>

                                    <input
                                        type="number"
                                        name="qty"
                                        id="qty"
                                        class="form-control"
                                        value="{{ old('qty', 1) }}"
                                        min="1"
                                        required
                                    >

                                </div>


                                <!-- TOMBOL PEMBELIAN -->
                                <div class="d-flex flex-wrap gap-2">


                                    <!-- TAMBAH KERANJANG -->
                                    <button
                                        type="submit"
                                        class="btn btn-outline-primary"
                                    >

                                        <i class="bi bi-cart-plus"></i>

                                        Tambah Keranjang

                                    </button>


                                    <!-- BELI SEKARANG -->
                                    <button
                                        type="submit"
                                        formaction="{{ route('checkout.buyNow') }}"
                                        class="btn btn-primary"
                                    >

                                        <i class="bi bi-bag-check"></i>

                                        Beli Sekarang

                                    </button>

                                </div>

                            </form>


                        <!-- =================================
                             PENGUNJUNG BELUM LOGIN
                        ================================== -->

                        @elseif(!auth()->check())

                            <div class="alert alert-warning mt-3">

                                <div class="d-flex align-items-start gap-2">

                                    <i class="bi bi-info-circle fs-5"></i>

                                    <div>

                                        <strong>
                                            Login diperlukan untuk berbelanja
                                        </strong>

                                        <p class="mb-0 mt-1">

                                            Kamu dapat melihat informasi produk,
                                            tetapi harus login atau membuat akun
                                            terlebih dahulu untuk menggunakan fitur
                                            Tambah ke Keranjang dan Beli Sekarang.

                                        </p>

                                    </div>

                                </div>

                            </div>


                            <!-- TOMBOL LOGIN DAN REGISTRASI -->
                            <div class="d-flex flex-wrap gap-2">

                                <a
                                    href="{{ route('login') }}"
                                    class="btn btn-primary"
                                >

                                    <i class="bi bi-box-arrow-in-right"></i>

                                    Login Sekarang

                                </a>


                                <a
                                    href="{{ route('register') }}"
                                    class="btn btn-outline-primary"
                                >

                                    <i class="bi bi-person-plus"></i>

                                    Buat Akun

                                </a>

                            </div>


                        <!-- =================================
                             ADMIN SUDAH LOGIN
                        ================================== -->

                        @else

                            <div class="alert alert-info mt-3">

                                <div class="d-flex align-items-start gap-2">

                                    <i class="bi bi-info-circle fs-5"></i>

                                    <div>

                                        <strong>
                                            Kamu sedang login sebagai Admin
                                        </strong>

                                        <p class="mb-2 mt-1">

                                            Admin dapat melihat informasi produk,
                                            tetapi fitur Tambah ke Keranjang dan
                                            Beli Sekarang hanya tersedia untuk customer.

                                        </p>

                                        <a
                                            href="{{ route('admin.dashboard') }}"
                                            class="btn btn-sm btn-outline-primary"
                                        >

                                            <i class="bi bi-shop me-1"></i>

                                            Toko Saya

                                        </a>

                                    </div>

                                </div>

                            </div>

                        @endif


                    <!-- =====================================
                         PRODUK HABIS
                    ====================================== -->

                    @else

                        <div class="alert alert-danger">

                            <i class="bi bi-exclamation-circle"></i>

                            Produk sedang habis.

                        </div>

                    @endif

                </div>

            </div>

        </div>

    </div>

</div>


<!-- JAVASCRIPT BOOTSTRAP -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
