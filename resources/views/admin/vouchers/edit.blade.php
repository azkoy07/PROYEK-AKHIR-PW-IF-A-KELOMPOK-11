
@extends('layouts.admin')

@section('title', 'Edit Voucher - SportZone')
@section('page_title', 'Edit Voucher')
@section('page_subtitle', 'Perbarui informasi dan ketentuan voucher SportZone.')

@section('content')

<div class="w-100">

    <div class="card border shadow-sm rounded-3 bg-white">

        <div class="card-body p-4">

            <form action="{{ route('admin.vouchers.update', $voucher->id) }}"
                  method="POST">

                @csrf
                @method('PUT')

                <div class="row g-4">

                    <div class="col-md-6">
                        <label class="form-label fw-semibold">
                            Kode Voucher <span class="text-danger">*</span>
                        </label>

                        <input type="text"
                               name="kode"
                               class="form-control @error('kode') is-invalid @enderror"
                               value="{{ old('kode', $voucher->kode) }}"
                               maxlength="30"
                               required>

                        @error('kode')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-6">
                        <label class="form-label fw-semibold">
                            Nominal Potongan (Rp) <span class="text-danger">*</span>
                        </label>

                        <input type="number"
                               name="potongan"
                               class="form-control @error('potongan') is-invalid @enderror"
                               value="{{ old('potongan', $voucher->potongan) }}"
                               min="1"
                               required>

                        @error('potongan')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-6">
                        <label class="form-label fw-semibold">
                            Minimal Belanja (Rp) <span class="text-danger">*</span>
                        </label>

                        <input type="number"
                               name="min_belanja"
                               class="form-control @error('min_belanja') is-invalid @enderror"
                               value="{{ old('min_belanja', $voucher->min_belanja) }}"
                               min="0"
                               required>

                        @error('min_belanja')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror

                        <div class="form-text">
                            Isi 0 jika voucher tidak memiliki minimal belanja.
                        </div>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label fw-semibold">
                            Kuota Voucher <span class="text-danger">*</span>
                        </label>

                        <input type="number"
                               name="kuota"
                               class="form-control @error('kuota') is-invalid @enderror"
                               value="{{ old('kuota', $voucher->kuota) }}"
                               min="0"
                               required>

                        @error('kuota')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-6">
                        <label class="form-label fw-semibold">
                            Tanggal Kedaluwarsa <span class="text-danger">*</span>
                        </label>

                        <input type="date"
                               name="expired"
                               class="form-control @error('expired') is-invalid @enderror"
                               value="{{ old('expired', \Carbon\Carbon::parse($voucher->expired)->format('Y-m-d')) }}"
                               required>

                        @error('expired')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                </div>

                <hr class="my-4">

                <div class="d-flex justify-content-end gap-2">
                    <a href="{{ route('admin.vouchers.index') }}"
                       class="btn btn-outline-secondary px-4">
                        Batal
                    </a>

                    <button type="submit" class="btn btn-primary px-4">
                        <i class="bi bi-check-lg me-1"></i>
                        Simpan Perubahan
                    </button>
                </div>

            </form>

        </div>
    </div>

</div>

@endsection
