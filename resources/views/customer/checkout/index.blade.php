<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Checkout - SportZone</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css" rel="stylesheet">
</head>

<body class="bg-light">

<div class="container py-5">

    <a href="{{ $direct ? route('home') : route('cart.index') }}"
       class="btn btn-outline-secondary mb-4">
        <i class="bi bi-arrow-left"></i>
        Kembali
    </a>

    <h2 class="fw-bold mb-4">Checkout</h2>

    @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @if($addresses->isEmpty())

        <div class="card border-0 shadow-sm">
            <div class="card-body text-center p-5">
                <i class="bi bi-geo-alt text-secondary fs-1"></i>

                <h5 class="fw-bold mt-3">
                    Alamat pengiriman belum tersedia
                </h5>

                <p class="text-secondary">
                    Tambahkan alamat terlebih dahulu sebelum checkout.
                </p>

                <a href="{{ route('customer.addresses.index') }}"
                   class="btn btn-primary">
                    Tambah Alamat
                </a>
            </div>
        </div>

    @else

        {{-- FORM CHECKOUT UTAMA --}}
        {{-- Form ditutup di sini agar tidak bersarang dengan form voucher --}}
        <form id="checkoutForm"
              action="{{ route('checkout.store') }}"
              method="POST">
            @csrf
        </form>

        <div class="row g-4">

            <!-- Alamat Pengiriman -->
            <div class="col-lg-7">

                <div class="card border-0 shadow-sm mb-4">
                    <div class="card-body p-4">

                        <h5 class="fw-bold mb-3">
                            <i class="bi bi-geo-alt"></i>
                            Alamat Pengiriman
                        </h5>

                        @foreach($addresses as $address)

                            <div class="border rounded p-3 mb-3">

                                <div class="form-check">

                                    <input
                                        class="form-check-input"
                                        type="radio"
                                        name="address_id"
                                        id="address{{ $address->id }}"
                                        value="{{ $address->id }}"
                                        form="checkoutForm"
                                        {{ old('address_id', $addresses->firstWhere('is_utama', 1)->id ?? $addresses->first()->id) == $address->id ? 'checked' : '' }}
                                        required
                                    >

                                    <label
                                        class="form-check-label w-100"
                                        for="address{{ $address->id }}"
                                    >

                                        <strong>
                                            {{ $address->penerima }}
                                        </strong>

                                        @if($address->is_utama)
                                            <span class="badge bg-primary">
                                                Alamat Utama
                                            </span>
                                        @endif

                                        <p class="mb-1 mt-2">
                                            {{ $address->no_hp }}
                                        </p>

                                        <p class="text-secondary mb-0">
                                            {{ $address->alamat_lengkap }}
                                            <br>

                                            {{ $address->kota }}
                                            {{ $address->kode_pos }}
                                        </p>

                                    </label>

                                </div>

                            </div>

                        @endforeach

                        <a href="{{ route('customer.addresses.index') }}"
                           class="btn btn-outline-primary btn-sm">
                            Kelola Alamat
                        </a>

                    </div>
                </div>

                <!-- Metode Pembayaran -->
                <div class="card border-0 shadow-sm">
                    <div class="card-body p-4">

                        <h5 class="fw-bold mb-3">
                            <i class="bi bi-credit-card"></i>
                            Metode Pembayaran
                        </h5>

                        <div class="form-check mb-3">

                            <input
                                class="form-check-input"
                                type="radio"
                                name="metode_bayar"
                                id="transfer"
                                value="transfer"
                                form="checkoutForm"
                                {{ old('metode_bayar', 'transfer') == 'transfer' ? 'checked' : '' }}
                                required
                            >

                            <label class="form-check-label" for="transfer">
                                Transfer Bank
                            </label>

                        </div>

                        <div class="form-check mb-3">

                            <input
                                class="form-check-input"
                                type="radio"
                                name="metode_bayar"
                                id="cod"
                                value="cod"
                                form="checkoutForm"
                                {{ old('metode_bayar') == 'cod' ? 'checked' : '' }}
                            >

                            <label class="form-check-label" for="cod">
                                Cash on Delivery (COD)
                            </label>

                        </div>

                        <div class="form-check">

                            <input
                                class="form-check-input"
                                type="radio"
                                name="metode_bayar"
                                id="ewallet"
                                value="ewallet"
                                form="checkoutForm"
                                {{ old('metode_bayar') == 'ewallet' ? 'checked' : '' }}
                            >

                            <label class="form-check-label" for="ewallet">
                                E-Wallet
                            </label>

                        </div>

                    </div>
                </div>

            </div>

            <!-- Ringkasan Pesanan -->
            <div class="col-lg-5">

                <div class="card border-0 shadow-sm">
                    <div class="card-body p-4">

                        <h5 class="fw-bold mb-3">
                            Ringkasan Pesanan
                        </h5>

                        <!-- FORM VOUCHER TERPISAH -->
                        <div class="border rounded p-3 mb-4">

                            <h6 class="fw-bold mb-3">
                                <i class="bi bi-ticket-perforated"></i>
                                Gunakan Voucher
                            </h6>

                            @if($voucher)

                                <div class="alert alert-success mb-2">

                                    <strong>
                                        <i class="bi bi-check-circle"></i>
                                        {{ $voucher->kode }}
                                    </strong>

                                    <br>

                                    Voucher berhasil digunakan.

                                    <br>

                                    <small>
                                        Potongan:
                                        Rp{{ number_format($diskon, 0, ',', '.') }}
                                    </small>

                                </div>

                                <form action="{{ route('checkout.voucher.remove') }}"
                                      method="POST">

                                    @csrf
                                    @method('DELETE')

                                    <button type="submit"
                                            class="btn btn-outline-danger btn-sm">
                                        <i class="bi bi-x-circle"></i>
                                        Lepaskan Voucher
                                    </button>

                                </form>

                            @else

                                <form action="{{ route('checkout.voucher.apply') }}"
                                      method="POST">

                                    @csrf

                                    <div class="input-group">

                                        <input
                                            type="text"
                                            name="kode"
                                            class="form-control"
                                            placeholder="Masukkan kode voucher"
                                            maxlength="30"
                                            required
                                        >

                                        <button type="submit"
                                                class="btn btn-primary">
                                            Gunakan
                                        </button>

                                    </div>

                                </form>

                            @endif

                        </div>

                        <!-- Daftar Produk -->
                        @foreach($items as $item)

                            <div class="d-flex gap-3 mb-3">

                                <div style="width: 75px; height: 75px;"
                                     class="bg-light rounded d-flex align-items-center justify-content-center">

                                    @if($item->file_name)

                                        <img
                                            src="{{ asset('storage/' . $item->file_name) }}"
                                            alt="{{ $item->nama }}"
                                            class="img-fluid rounded"
                                            style="max-height: 75px; object-fit: contain;"
                                        >

                                    @else

                                        <i class="bi bi-image fs-2 text-secondary"></i>

                                    @endif

                                </div>

                                <div class="flex-grow-1">

                                    <strong>
                                        {{ $item->nama }}
                                    </strong>

                                    @if($item->ukuran || $item->warna)

                                        <p class="text-secondary small mb-1">
                                            {{ $item->ukuran }}
                                            {{ $item->warna }}
                                        </p>

                                    @endif

                                    <p class="small mb-1">
                                        {{ $item->qty }} x
                                        Rp{{ number_format($item->harga_satuan, 0, ',', '.') }}
                                    </p>

                                    <strong>
                                        Rp{{ number_format($item->harga_satuan * $item->qty, 0, ',', '.') }}
                                    </strong>

                                </div>

                            </div>

                        @endforeach

                        <hr>

                        <!-- Perhitungan Pembayaran -->

                        <div class="d-flex justify-content-between mb-2">

                            <span>Subtotal</span>

                            <strong>
                                Rp{{ number_format($total, 0, ',', '.') }}
                            </strong>

                        </div>

                        <div class="d-flex justify-content-between mb-2">

                            <span>Diskon Voucher</span>

                            <strong class="text-success">
                                - Rp{{ number_format($diskon, 0, ',', '.') }}
                            </strong>

                        </div>

                        <div class="d-flex justify-content-between mb-2">

                            <span>Ongkir</span>

                            <span>Rp0</span>

                        </div>

                        <hr>

                        <div class="d-flex justify-content-between align-items-center mb-3">

                            <strong>Total Pembayaran</strong>

                            <h5 class="text-primary fw-bold mb-0">
                                Rp{{ number_format($totalBayar, 0, ',', '.') }}
                            </h5>

                        </div>

                        <!-- Tombol Checkout -->
                        <button type="submit"
                                form="checkoutForm"
                                class="btn btn-primary w-100">

                            <i class="bi bi-bag-check"></i>
                            Buat Pesanan

                        </button>

                    </div>
                </div>

            </div>

        </div>

    @endif

</div>

</body>
</html>
