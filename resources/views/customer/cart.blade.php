
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Keranjang Belanja - SportZone</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css" rel="stylesheet">
</head>
<body class="bg-light">

    {{-- Navbar --}}
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand fw-bold" href="{{ route('home') }}">
                SportZone
            </a>

            <div class="d-flex align-items-center gap-3">
                <a href="{{ route('home') }}" class="text-white text-decoration-none">
                    <i class="bi bi-house"></i> Beranda
                </a>

                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-outline-light btn-sm">
                        Logout
                    </button>
                </form>
            </div>
        </div>
    </nav>

    {{-- Konten --}}
    <div class="container py-5">

        <div class="mb-4">
            <h3 class="fw-bold">Keranjang Belanja</h3>
            <p class="text-secondary">
                Periksa kembali produk sebelum melanjutkan checkout.
            </p>
        </div>

        {{-- Pesan berhasil --}}
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        {{-- Pesan error --}}
        @if(session('error'))
            <div class="alert alert-danger alert-dismissible fade show">
                {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        {{-- Validasi --}}
        @if($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @if($items->isEmpty())

            {{-- Keranjang kosong --}}
            <div class="card border-0 shadow-sm">
                <div class="card-body text-center py-5">

                    <i class="bi bi-cart-x display-1 text-secondary"></i>

                    <h5 class="mt-3 fw-bold">
                        Keranjang Masih Kosong
                    </h5>

                    <p class="text-secondary">
                        Kamu belum menambahkan produk ke keranjang.
                    </p>

                    <a href="{{ route('home') }}" class="btn btn-primary">
                        <i class="bi bi-shop"></i>
                        Mulai Belanja
                    </a>

                </div>
            </div>

        @else

            <div class="row g-4">

                {{-- Daftar produk --}}
                <div class="col-lg-8">

                    <div class="card border-0 shadow-sm">
                        <div class="card-body">

                            <h5 class="fw-bold mb-4">
                                Produk dalam Keranjang ({{ $items->count() }})
                            </h5>

                            @foreach($items as $item)

                                <div class="row align-items-center g-3 py-3 border-bottom">

                                    {{-- Gambar produk --}}
                                    <div class="col-4 col-md-2">

                                        @if($item->file_name)
                                            <img
                                                src="{{ asset('storage/' . $item->file_name) }}"
                                                alt="{{ $item->nama }}"
                                                class="img-fluid rounded"
                                                style="width: 100%; height: 100px; object-fit: contain;"
                                            >
                                        @else
                                            <div class="bg-light rounded d-flex align-items-center justify-content-center"
                                                 style="height: 100px;">
                                                <i class="bi bi-image fs-1 text-secondary"></i>
                                            </div>
                                        @endif

                                    </div>

                                    {{-- Informasi produk --}}
                                    <div class="col-8 col-md-4">

                                        <a
                                            href="{{ route('products.show', $item->product_id) }}"
                                            class="text-decoration-none text-dark"
                                        >
                                            <h6 class="fw-bold mb-1">
                                                {{ $item->nama }}
                                            </h6>
                                        </a>

                                        @if($item->variant_id)
                                            <small class="text-secondary">
                                                @if($item->ukuran)
                                                    Ukuran: {{ $item->ukuran }}
                                                @endif

                                                @if($item->warna)
                                                    | Warna: {{ $item->warna }}
                                                @endif
                                            </small>
                                        @else
                                            <small class="text-secondary">
                                                Produk tanpa variasi
                                            </small>
                                        @endif

                                        <div class="fw-semibold text-primary mt-2">
                                            Rp {{ number_format($item->harga_satuan, 0, ',', '.') }}
                                        </div>

                                    </div>

                                    {{-- Ubah jumlah --}}
                                    <div class="col-7 col-md-3">

                                        <form
                                            action="{{ route('cart.update', $item->id) }}"
                                            method="POST"
                                        >
                                            @csrf
                                            @method('PATCH')

                                            <label class="form-label small text-secondary">
                                                Jumlah
                                            </label>

                                            <div class="input-group input-group-sm">

                                                <input
                                                    type="number"
                                                    name="qty"
                                                    class="form-control"
                                                    value="{{ $item->qty }}"
                                                    min="1"
                                                    max="{{ $item->variant_id ? $item->stok_varian : $item->stok_produk }}"
                                                    required
                                                >

                                                <button
                                                    type="submit"
                                                    class="btn btn-outline-primary"
                                                    title="Perbarui jumlah"
                                                >
                                                    <i class="bi bi-arrow-repeat"></i>
                                                </button>

                                            </div>

                                            <small class="text-secondary">
                                                Stok:
                                                {{ $item->variant_id ? $item->stok_varian : $item->stok_produk }}
                                            </small>

                                        </form>

                                    </div>

                                    {{-- Subtotal dan hapus --}}
                                    <div class="col-5 col-md-3 text-end">

                                        <div class="fw-bold mb-2">
                                            Rp {{ number_format($item->harga_satuan * $item->qty, 0, ',', '.') }}
                                        </div>

                                        <form
                                            action="{{ route('cart.destroy', $item->id) }}"
                                            method="POST"
                                            onsubmit="return confirm('Yakin ingin menghapus produk ini dari keranjang?')"
                                        >
                                            @csrf
                                            @method('DELETE')

                                            <button type="submit" class="btn btn-sm btn-outline-danger">
                                                <i class="bi bi-trash"></i>
                                                Hapus
                                            </button>

                                        </form>

                                    </div>

                                </div>

                            @endforeach

                        </div>
                    </div>

                    <div class="mt-3">
                        <a href="{{ route('home') }}" class="btn btn-outline-secondary">
                            <i class="bi bi-arrow-left"></i>
                            Lanjut Belanja
                        </a>
                    </div>

                </div>

                {{-- Ringkasan belanja --}}
                <div class="col-lg-4">

                    <div class="card border-0 shadow-sm">
                        <div class="card-body">

                            <h5 class="fw-bold mb-4">
                                Ringkasan Belanja
                            </h5>

                            <div class="d-flex justify-content-between mb-3">
                                <span class="text-secondary">
                                    Total Produk
                                </span>

                                <span>
                                    {{ $items->sum('qty') }} item
                                </span>
                            </div>

                            <div class="d-flex justify-content-between mb-3">
                                <span class="text-secondary">
                                    Subtotal
                                </span>

                                <span>
                                    Rp {{ number_format($total, 0, ',', '.') }}
                                </span>
                            </div>

                            <hr>

                            <div class="d-flex justify-content-between fw-bold mb-4">
                                <span>Total</span>

                                <span class="text-primary">
                                    Rp {{ number_format($total, 0, ',', '.') }}
                                </span>
                            </div>

                            <a
                                href="{{ route('checkout.index') }}"
                                class="btn btn-primary w-100"
                            >
                                <i class="bi bi-credit-card"></i>
                                Lanjut ke Checkout
                            </a>

                            <p class="text-secondary small text-center mt-3 mb-0">
                                Biaya pengiriman dan diskon akan dihitung pada halaman checkout.
                            </p>

                        </div>
                    </div>

                </div>

            </div>

        @endif

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
