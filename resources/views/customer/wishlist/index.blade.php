<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Wishlist - SportZone</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css"
        rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css"
        rel="stylesheet">
</head>

<body class="bg-light">

<div class="container py-5">

    <!-- HEADER -->
    <div class="d-flex justify-content-between align-items-center flex-wrap gap-3 mb-4">

        <div>
            <h3 class="fw-bold mb-1">
                <i class="bi bi-heart-fill text-danger me-2"></i>
                Wishlist Saya
            </h3>

            <p class="text-secondary mb-0">
                Daftar produk favorit yang kamu simpan.
            </p>
        </div>

        <a href="{{ route('home') }}" class="btn btn-outline-primary">
            <i class="bi bi-arrow-left me-1"></i>
            Kembali ke Toko
        </a>

    </div>


    <!-- NOTIFIKASI -->
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show">
            <i class="bi bi-check-circle me-2"></i>
            {{ session('success') }}

            <button
                type="button"
                class="btn-close"
                data-bs-dismiss="alert"
            ></button>
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger alert-dismissible fade show">
            <i class="bi bi-exclamation-circle me-2"></i>
            {{ session('error') }}

            <button
                type="button"
                class="btn-close"
                data-bs-dismiss="alert"
            ></button>
        </div>
    @endif


    <!-- DAFTAR WISHLIST -->
    <div class="card border-0 shadow-sm">

        <div class="card-header bg-white py-3">

            <h5 class="fw-bold mb-0">
                Produk Favorit ({{ $products->count() }})
            </h5>

        </div>

        <div class="card-body">

            @if($products->count() > 0)

                <div class="row g-4">

                    @foreach($products as $product)

                        <div class="col-md-6 col-lg-4">

                            <div class="card h-100 border shadow-sm">

                                <!-- GAMBAR PRODUK -->
                                <div
                                    class="bg-light d-flex align-items-center justify-content-center"
                                    style="height: 220px;"
                                >

                                    @if($product->file_name)

                                        <img
                                            src="{{ asset('storage/' . $product->file_name) }}"
                                            alt="{{ $product->nama }}"
                                            class="img-fluid"
                                            style="max-height: 200px; max-width: 100%; object-fit: contain;"
                                        >

                                    @else

                                        <i class="bi bi-image text-secondary"
                                            style="font-size: 60px;"></i>

                                    @endif

                                </div>


                                <!-- INFORMASI PRODUK -->
                                <div class="card-body">

                                    <span class="badge bg-light text-primary mb-2">
                                        {{ $product->nama_kategori ?? 'Tanpa Kategori' }}
                                    </span>

                                    <h5 class="fw-bold">
                                        {{ $product->nama }}
                                    </h5>

                                    <p class="text-secondary small mb-2">
                                        Merek: {{ $product->merek ?? '-' }}
                                    </p>

                                    <h5 class="text-primary fw-bold">
                                        Rp{{ number_format($product->harga_dasar, 0, ',', '.') }}
                                    </h5>

                                    @if($product->status == 'aktif')

                                        <span class="badge bg-success">
                                            Produk Aktif
                                        </span>

                                    @else

                                        <span class="badge bg-secondary">
                                            Produk Nonaktif
                                        </span>

                                    @endif

                                </div>


                                <!-- TOMBOL AKSI -->
                                <div class="card-footer bg-white border-0 p-3">

                                    <div class="d-flex gap-2">

                                        <a
                                            href="{{ route('products.show', $product->id) }}"
                                            class="btn btn-primary flex-grow-1"
                                        >
                                            <i class="bi bi-eye me-1"></i>
                                            Detail
                                        </a>


                                        <form
                                            action="{{ route('customer.wishlist.destroy', $product->id) }}"
                                            method="POST"
                                            onsubmit="return confirm('Hapus produk ini dari wishlist?')"
                                        >

                                            @csrf
                                            @method('DELETE')

                                            <button
                                                type="submit"
                                                class="btn btn-outline-danger"
                                                title="Hapus dari Wishlist"
                                            >
                                                <i class="bi bi-trash"></i>
                                            </button>

                                        </form>

                                    </div>

                                </div>

                            </div>

                        </div>

                    @endforeach

                </div>

            @else

                <!-- WISHLIST KOSONG -->
                <div class="text-center py-5">

                    <i
                        class="bi bi-heart text-secondary"
                        style="font-size: 70px;"
                    ></i>

                    <h5 class="fw-bold mt-3">
                        Wishlist Masih Kosong
                    </h5>

                    <p class="text-secondary">
                        Kamu belum menyimpan produk favorit.
                    </p>

                    <a href="{{ route('home') }}" class="btn btn-primary mt-2">
                        <i class="bi bi-shop me-1"></i>
                        Jelajahi Produk
                    </a>

                </div>

            @endif

        </div>

    </div>

</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>