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

    <a href="{{ route('home') }}"
       class="btn btn-outline-secondary mb-4">
        <i class="bi bi-arrow-left"></i>
        Kembali ke Katalog
    </a>

    @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    @if($errors->any())
        <div class="alert alert-danger">
            @foreach($errors->all() as $error)
                <div>{{ $error }}</div>
            @endforeach
        </div>
    @endif

    <div class="card border-0 shadow-sm">
        <div class="card-body p-4">

            <div class="row g-4">

                <!-- Gambar Produk -->
                <div class="col-md-5">

                    <div class="bg-light rounded d-flex align-items-center justify-content-center"
                         style="min-height: 350px;">

                        @if($image && $image->file_name)
                            <img
                                src="{{ asset('storage/' . $image->file_name) }}"
                                alt="{{ $product->nama }}"
                                class="img-fluid rounded"
                                style="max-height: 350px; object-fit: contain;"
                            >
                        @else
                            <i class="bi bi-image text-secondary"
                               style="font-size: 100px;"></i>
                        @endif

                    </div>

                </div>

                <!-- Informasi Produk -->
                <div class="col-md-7">

                    <span class="badge bg-primary mb-2">
                        {{ $product->nama_kategori ?? 'Tanpa Kategori' }}
                    </span>

                    <h2 class="fw-bold">
                        {{ $product->nama }}
                    </h2>

                    @include('products.reviews.summary', [
                    'product' => $product
                    ])

                    <p class="text-secondary mb-2">
                        Merek: {{ $product->merek }}
                    </p>

                    <h3 class="text-primary fw-bold mb-3">
                        Rp{{ number_format($product->harga_dasar, 0, ',', '.') }}
                    </h3>

                    <p>
                        <strong>Terjual:</strong>
                        {{ $product->terjual }}
                    </p>

                    <p>
                        <strong>Total Stok:</strong>
                        {{ $totalStok }}
                    </p>

                    <hr>

                    <h5 class="fw-bold">Deskripsi Produk</h5>

                    <p class="text-secondary">
                        {{ $product->deskripsi ?: 'Belum ada deskripsi produk.' }}
                    </p>

                    <hr>

                    @if($totalStok > 0)

                        <form action="{{ route('cart.store') }}"
                              method="POST">

                            @csrf

                            <input type="hidden"
                                   name="product_id"
                                   value="{{ $product->id }}">

                            <!-- Pilihan variasi -->
                            @if($product->jenis_produk == 'variasi')

                                <div class="mb-3">

                                    <label for="variant_id"
                                           class="form-label fw-bold">
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

                                                <option value="{{ $variant->id }}"
                                                        {{ old('variant_id') == $variant->id ? 'selected' : '' }}>

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

                                <input type="hidden"
                                       name="variant_id"
                                       value="">

                                <p class="text-success">
                                    <i class="bi bi-check-circle"></i>
                                    Produk tersedia: {{ $product->stok }} stok
                                </p>

                            @endif

                            <!-- Jumlah produk -->
                            <div class="mb-4">

                                <label for="qty"
                                       class="form-label fw-bold">
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

                            <!-- Tombol pembelian -->
                            <div class="d-flex flex-wrap gap-2">

                                <button
                                    type="submit"
                                    class="btn btn-outline-primary"
                                >
                                    <i class="bi bi-cart-plus"></i>
                                    Tambah Keranjang
                                </button>

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

                    @else

                        <div class="alert alert-danger">
                            Produk sedang habis.
                        </div>

                    @endif

                </div>

            </div>

        </div>
    </div>

</div>

</body>
</html>