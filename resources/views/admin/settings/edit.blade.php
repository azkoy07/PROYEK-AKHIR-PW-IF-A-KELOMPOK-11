
@extends('layouts.admin')

@section('title', 'Pengaturan Toko - SportZone')
@section('page_title', 'Pengaturan Toko')
@section('page_subtitle', 'Kelola informasi, identitas, dan pengaturan operasional toko SportZone.')

@section('content')

<div class="w-100">

    <form action="{{ route('admin.settings.update') }}"
          method="POST"
          enctype="multipart/form-data">

        @csrf
        @method('PUT')

        {{-- Identitas Toko --}}
        <div class="card border shadow-sm rounded-3 bg-white mb-4">

            <div class="card-header bg-white p-4">
                <h5 class="fw-semibold mb-1">
                    <i class="bi bi-shop me-2 text-primary"></i>
                    Identitas Toko
                </h5>
                <small class="text-muted">
                    Atur nama, deskripsi, dan logo toko.
                </small>
            </div>

            <div class="card-body p-4">

                <div class="row g-4">

                    <div class="col-md-6">
                        <label class="form-label fw-semibold">
                            Nama Toko <span class="text-danger">*</span>
                        </label>

                        <input type="text"
                               name="nama_toko"
                               class="form-control @error('nama_toko') is-invalid @enderror"
                               value="{{ old('nama_toko', $settings->nama_toko ?? '') }}"
                               maxlength="100"
                               placeholder="Masukkan nama toko"
                               required>

                        @error('nama_toko')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-6">
                        <label class="form-label fw-semibold">
                            Deskripsi Toko
                        </label>

                        <textarea name="deskripsi"
                                  rows="3"
                                  class="form-control @error('deskripsi') is-invalid @enderror"
                                  placeholder="Masukkan deskripsi singkat toko">{{ old('deskripsi', $settings->deskripsi ?? '') }}</textarea>

                        @error('deskripsi')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-12">
                        <label class="form-label fw-semibold">
                            Logo Toko
                        </label>

                        <div class="row g-4 align-items-center">

                            <div class="col-md-3">
                                <div class="border rounded-3 p-3 text-center bg-light">

                                    <div class="small text-muted mb-2">
                                        Preview Logo
                                    </div>

                                    @if(!empty($settings->logo))
                                        <img id="logoPreview"
                                             src="{{ asset('storage/' . $settings->logo) }}"
                                             alt="Logo Toko"
                                             class="img-fluid"
                                             style="max-height: 120px; max-width: 100%; object-fit: contain;">
                                    @else
                                        <div id="logoPlaceholder" class="py-4 text-muted">
                                            <i class="bi bi-image fs-1 d-block mb-2"></i>
                                            <small>Belum ada logo</small>
                                        </div>

                                        <img id="logoPreview"
                                             src=""
                                             alt="Preview Logo Baru"
                                             class="img-fluid d-none"
                                             style="max-height: 120px; max-width: 100%; object-fit: contain;">
                                    @endif

                                </div>
                            </div>

                            <div class="col-md-9">

                                <input type="file"
                                       name="logo"
                                       id="logoInput"
                                       accept=".jpg,.jpeg,.png,.webp"
                                       class="form-control @error('logo') is-invalid @enderror">

                                @error('logo')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror

                                <div class="form-text">
                                    Format JPG, JPEG, PNG, atau WEBP. Ukuran maksimal 2 MB.
                                </div>

                                @if(!empty($settings->logo))
                                    <div class="form-check mt-3">
                                        <input class="form-check-input"
                                               type="checkbox"
                                               name="hapus_logo"
                                               value="1"
                                               id="hapusLogo"
                                               {{ old('hapus_logo') ? 'checked' : '' }}>

                                        <label class="form-check-label text-danger"
                                               for="hapusLogo">
                                            Hapus logo toko saat ini
                                        </label>
                                    </div>
                                @endif

                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>

        {{-- Informasi Kontak --}}
        <div class="card border shadow-sm rounded-3 bg-white mb-4">

            <div class="card-header bg-white p-4">
                <h5 class="fw-semibold mb-1">
                    <i class="bi bi-telephone me-2 text-primary"></i>
                    Informasi Kontak
                </h5>
                <small class="text-muted">
                    Atur lokasi dan informasi kontak toko.
                </small>
            </div>

            <div class="card-body p-4">

                <div class="row g-4">

                    <div class="col-md-6">
                        <label class="form-label fw-semibold">Kota</label>

                        <input type="text"
                               name="kota"
                               class="form-control @error('kota') is-invalid @enderror"
                               value="{{ old('kota', $settings->kota ?? '') }}"
                               maxlength="60"
                               placeholder="Contoh: Yogyakarta">

                        @error('kota')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-6">
                        <label class="form-label fw-semibold">Nomor WhatsApp</label>

                        <input type="text"
                               name="no_wa"
                               class="form-control @error('no_wa') is-invalid @enderror"
                               value="{{ old('no_wa', $settings->no_wa ?? '') }}"
                               maxlength="20"
                               placeholder="Contoh: 081234567890">

                        @error('no_wa')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                </div>

            </div>
        </div>

        {{-- Pengaturan Pengiriman --}}
        <div class="card border shadow-sm rounded-3 bg-white mb-4">

            <div class="card-header bg-white p-4">
                <h5 class="fw-semibold mb-1">
                    <i class="bi bi-truck me-2 text-primary"></i>
                    Pengaturan Pengiriman
                </h5>
                <small class="text-muted">
                    Atur biaya pengiriman yang digunakan dalam transaksi.
                </small>
            </div>

            <div class="card-body p-4">

                <div class="row g-4">
                    <div class="col-md-6">
                        <label class="form-label fw-semibold">
                            Ongkos Kirim Tetap (Rp) <span class="text-danger">*</span>
                        </label>

                        <input type="number"
                               name="ongkir_flat"
                               class="form-control @error('ongkir_flat') is-invalid @enderror"
                               value="{{ old('ongkir_flat', $settings->ongkir_flat ?? 0) }}"
                               min="0"
                               required>

                        @error('ongkir_flat')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror

                        <div class="form-text">
                            Nominal ongkos kirim yang digunakan untuk setiap pesanan.
                        </div>
                    </div>
                </div>

            </div>
        </div>

        {{-- Informasi Pembayaran --}}
        <div class="card border shadow-sm rounded-3 bg-white mb-4">

            <div class="card-header bg-white p-4">
                <h5 class="fw-semibold mb-1">
                    <i class="bi bi-bank me-2 text-primary"></i>
                    Informasi Pembayaran
                </h5>
                <small class="text-muted">
                    Atur informasi rekening bank untuk pembayaran pelanggan.
                </small>
            </div>

            <div class="card-body p-4">

                <div class="row g-4">

                    <div class="col-md-6">
                        <label class="form-label fw-semibold">Nama Bank</label>

                        <input type="text"
                               name="bank_nama"
                               class="form-control @error('bank_nama') is-invalid @enderror"
                               value="{{ old('bank_nama', $settings->bank_nama ?? '') }}"
                               maxlength="30"
                               placeholder="Contoh: BCA">

                        @error('bank_nama')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-6">
                        <label class="form-label fw-semibold">Nomor Rekening</label>

                        <input type="text"
                               name="bank_rekening"
                               class="form-control @error('bank_rekening') is-invalid @enderror"
                               value="{{ old('bank_rekening', $settings->bank_rekening ?? '') }}"
                               maxlength="30"
                               placeholder="Masukkan nomor rekening">

                        @error('bank_rekening')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-6">
                        <label class="form-label fw-semibold">Atas Nama Rekening</label>

                        <input type="text"
                               name="bank_atas_nama"
                               class="form-control @error('bank_atas_nama') is-invalid @enderror"
                               value="{{ old('bank_atas_nama', $settings->bank_atas_nama ?? '') }}"
                               maxlength="80"
                               placeholder="Masukkan nama pemilik rekening">

                        @error('bank_atas_nama')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                </div>

            </div>
        </div>

        {{-- Tombol Simpan --}}
        <div class="card border shadow-sm rounded-3 bg-white mb-4">
            <div class="card-body p-4 d-flex justify-content-end gap-2">

                <a href="{{ route('admin.dashboard') }}"
                   class="btn btn-outline-secondary px-4">
                    Batal
                </a>

                <button type="submit" class="btn btn-primary px-4">
                    <i class="bi bi-check-lg me-1"></i>
                    Simpan Pengaturan
                </button>

            </div>
        </div>

    </form>

</div>

@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function () {

    const logoInput = document.getElementById('logoInput');
    const logoPreview = document.getElementById('logoPreview');
    const logoPlaceholder = document.getElementById('logoPlaceholder');
    const hapusLogo = document.getElementById('hapusLogo');

    if (logoInput) {
        logoInput.addEventListener('change', function (event) {

            const file = event.target.files[0];

            if (!file) {
                return;
            }

            const reader = new FileReader();

            reader.onload = function (e) {
                logoPreview.src = e.target.result;
                logoPreview.classList.remove('d-none');

                if (logoPlaceholder) {
                    logoPlaceholder.classList.add('d-none');
                }

                if (hapusLogo) {
                    hapusLogo.checked = false;
                }
            };

            reader.readAsDataURL(file);
        });
    }

    if (hapusLogo) {
        hapusLogo.addEventListener('change', function () {

            if (this.checked) {
                const konfirmasi = confirm(
                    'Apakah kamu yakin ingin menghapus logo toko?'
                );

                if (!konfirmasi) {
                    this.checked = false;
                }
            }

        });
    }

});
</script>
@endpush
