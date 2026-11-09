<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Pengaturan Toko - SportZone</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css" rel="stylesheet">
</head>

<body class="bg-light">

<div class="container py-5">

    <!-- HEADER -->
    <div class="d-flex justify-content-between align-items-center flex-wrap gap-3 mb-4">

        <div>
            <h3 class="fw-bold mb-1">
                Pengaturan Toko
            </h3>

            <p class="text-secondary mb-0">
                Kelola informasi dan identitas toko SportZone.
            </p>
        </div>

        <a
            href="{{ route('admin.dashboard') }}"
            class="btn btn-outline-secondary"
        >
            <i class="bi bi-arrow-left me-1"></i>
            Kembali ke Dashboard
        </a>

    </div>


    <!-- NOTIFIKASI BERHASIL -->
    @if(session('success'))

        <div class="alert alert-success alert-dismissible fade show">

            <i class="bi bi-check-circle me-1"></i>

            {{ session('success') }}

            <button
                type="button"
                class="btn-close"
                data-bs-dismiss="alert"
            ></button>

        </div>

    @endif


    <!-- NOTIFIKASI VALIDASI -->
    @if($errors->any())

        <div class="alert alert-danger">

            <strong>Terjadi kesalahan:</strong>

            <ul class="mb-0 mt-2">

                @foreach($errors->all() as $error)

                    <li>{{ $error }}</li>

                @endforeach

            </ul>

        </div>

    @endif


    <!-- FORM PENGATURAN TOKO -->
    <form
        action="{{ route('admin.settings.update') }}"
        method="POST"
        enctype="multipart/form-data"
    >

        @csrf
        @method('PUT')


        <!-- IDENTITAS TOKO -->
        <div class="card border-0 shadow-sm mb-4">

            <div class="card-header bg-white py-3">

                <h5 class="mb-0 fw-bold">
                    <i class="bi bi-shop me-2"></i>
                    Identitas Toko
                </h5>

            </div>

            <div class="card-body p-4">

                <!-- Nama Toko -->
                <div class="mb-3">

                    <label for="nama_toko" class="form-label fw-semibold">
                        Nama Toko
                    </label>

                    <input
                        type="text"
                        name="nama_toko"
                        id="nama_toko"
                        class="form-control @error('nama_toko') is-invalid @enderror"
                        value="{{ old('nama_toko', $settings->nama_toko) }}"
                        maxlength="100"
                        required
                    >

                    @error('nama_toko')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror

                </div>


                <!-- Deskripsi -->
                <div class="mb-3">

                    <label for="deskripsi" class="form-label fw-semibold">
                        Deskripsi Toko
                    </label>

                    <textarea
                        name="deskripsi"
                        id="deskripsi"
                        class="form-control @error('deskripsi') is-invalid @enderror"
                        rows="4"
                        placeholder="Masukkan deskripsi toko..."
                    >{{ old('deskripsi', $settings->deskripsi) }}</textarea>

                    @error('deskripsi')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror

                </div>


                <!-- Logo Toko -->
                <div class="mb-3">

                    <label for="logo" class="form-label fw-semibold">
                        Logo Toko
                    </label>

                    <div class="mb-3">

                        @if($settings->logo)

                            <img
                                id="logoPreview"
                                src="{{ asset('storage/' . $settings->logo) }}"
                                alt="Logo SportZone"
                                class="border rounded p-2 bg-white"
                                style="width: 150px; height: 120px; object-fit: contain;"
                            >

                        @else

                            <div
                                id="logoPlaceholder"
                                class="border rounded bg-light d-flex align-items-center justify-content-center"
                                style="width: 150px; height: 120px;"
                            >
                                <i class="bi bi-image text-secondary fs-1"></i>
                            </div>

                            <img
                                id="logoPreview"
                                src=""
                                alt="Preview Logo"
                                class="border rounded p-2 bg-white d-none"
                                style="width: 150px; height: 120px; object-fit: contain;"
                            >

                        @endif

                    </div>


                    <input
                        type="file"
                        name="logo"
                        id="logo"
                        class="form-control @error('logo') is-invalid @enderror"
                        accept=".jpg,.jpeg,.png,.webp"
                    >

                    @error('logo')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror

                    <small class="text-secondary">
                        Format JPG, JPEG, PNG, atau WEBP. Maksimal 2 MB.
                    </small>

                </div>


                <!-- Hapus Logo -->
                @if($settings->logo)

                    <div class="form-check">

                        <input
                            type="checkbox"
                            name="hapus_logo"
                            value="1"
                            id="hapus_logo"
                            class="form-check-input"
                        >

                        <label for="hapus_logo" class="form-check-label text-danger">
                            Hapus logo saat pengaturan disimpan
                        </label>

                    </div>

                @endif

            </div>

        </div>


        <!-- INFORMASI TOKO -->
        <div class="card border-0 shadow-sm mb-4">

            <div class="card-header bg-white py-3">

                <h5 class="mb-0 fw-bold">
                    <i class="bi bi-geo-alt me-2"></i>
                    Informasi Toko
                </h5>

            </div>

            <div class="card-body p-4">

                <!-- Kota -->
                <div class="mb-3">

                    <label for="kota" class="form-label fw-semibold">
                        Kota Asal Toko
                    </label>

                    <input
                        type="text"
                        name="kota"
                        id="kota"
                        class="form-control @error('kota') is-invalid @enderror"
                        value="{{ old('kota', $settings->kota) }}"
                        maxlength="60"
                        placeholder="Contoh: Bandung"
                    >

                    @error('kota')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror

                </div>


                <!-- WhatsApp -->
                <div class="mb-3">

                    <label for="no_wa" class="form-label fw-semibold">
                        Nomor WhatsApp Toko
                    </label>

                    <input
                        type="text"
                        name="no_wa"
                        id="no_wa"
                        class="form-control @error('no_wa') is-invalid @enderror"
                        value="{{ old('no_wa', $settings->no_wa) }}"
                        maxlength="20"
                        placeholder="Contoh: 081234567890"
                    >

                    @error('no_wa')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror

                </div>


                <!-- Ongkir -->
                <div class="mb-3">

                    <label for="ongkir_flat" class="form-label fw-semibold">
                        Ongkos Kirim Tetap (Rp)
                    </label>

                    <input
                        type="number"
                        name="ongkir_flat"
                        id="ongkir_flat"
                        class="form-control @error('ongkir_flat') is-invalid @enderror"
                        value="{{ old('ongkir_flat', $settings->ongkir_flat) }}"
                        min="0"
                        required
                    >

                    @error('ongkir_flat')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror

                </div>

            </div>

        </div>


        <!-- INFORMASI PEMBAYARAN -->
        <div class="card border-0 shadow-sm mb-4">

            <div class="card-header bg-white py-3">

                <h5 class="mb-0 fw-bold">
                    <i class="bi bi-bank me-2"></i>
                    Informasi Rekening Pembayaran
                </h5>

            </div>

            <div class="card-body p-4">

                <!-- Nama Bank -->
                <div class="mb-3">

                    <label for="bank_nama" class="form-label fw-semibold">
                        Nama Bank
                    </label>

                    <input
                        type="text"
                        name="bank_nama"
                        id="bank_nama"
                        class="form-control @error('bank_nama') is-invalid @enderror"
                        value="{{ old('bank_nama', $settings->bank_nama) }}"
                        maxlength="30"
                        placeholder="Contoh: BCA"
                    >

                    @error('bank_nama')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror

                </div>


                <!-- Nomor Rekening -->
                <div class="mb-3">

                    <label for="bank_rekening" class="form-label fw-semibold">
                        Nomor Rekening
                    </label>

                    <input
                        type="text"
                        name="bank_rekening"
                        id="bank_rekening"
                        class="form-control @error('bank_rekening') is-invalid @enderror"
                        value="{{ old('bank_rekening', $settings->bank_rekening) }}"
                        maxlength="30"
                        placeholder="Masukkan nomor rekening"
                    >

                    @error('bank_rekening')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror

                </div>


                <!-- Atas Nama -->
                <div class="mb-3">

                    <label for="bank_atas_nama" class="form-label fw-semibold">
                        Atas Nama
                    </label>

                    <input
                        type="text"
                        name="bank_atas_nama"
                        id="bank_atas_nama"
                        class="form-control @error('bank_atas_nama') is-invalid @enderror"
                        value="{{ old('bank_atas_nama', $settings->bank_atas_nama) }}"
                        maxlength="80"
                        placeholder="Nama pemilik rekening"
                    >

                    @error('bank_atas_nama')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror

                </div>

            </div>

        </div>


        <!-- TOMBOL SIMPAN -->
        <div class="d-flex justify-content-end gap-2 mb-5">

            <a
                href="{{ route('admin.dashboard') }}"
                class="btn btn-outline-secondary"
            >
                Batal
            </a>

            <button
                type="submit"
                class="btn btn-primary"
            >
                <i class="bi bi-save me-1"></i>
                Simpan Pengaturan
            </button>

        </div>

    </form>

</div>


<!-- JAVASCRIPT PREVIEW LOGO -->
<script>

    const inputLogo = document.getElementById('logo');
    const previewLogo = document.getElementById('logoPreview');
    const placeholderLogo = document.getElementById('logoPlaceholder');

    inputLogo.addEventListener('change', function () {

        const file = this.files[0];

        if (file) {

            const reader = new FileReader();

            reader.onload = function (event) {

                previewLogo.src = event.target.result;
                previewLogo.classList.remove('d-none');

                if (placeholderLogo) {
                    placeholderLogo.classList.add('d-none');
                }

            };

            reader.readAsDataURL(file);

        }

    });

</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
