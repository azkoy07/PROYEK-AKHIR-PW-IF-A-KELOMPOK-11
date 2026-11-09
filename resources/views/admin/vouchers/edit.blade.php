
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Voucher - SportZone</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css"
          rel="stylesheet">
</head>

<body class="bg-light">

<div class="container py-5">

    <div class="mb-4">
        <h2>Edit Voucher</h2>
        <p class="text-muted">Perbarui informasi voucher</p>
    </div>

    <div class="card shadow-sm">
        <div class="card-body">

            <form action="{{ route('admin.vouchers.update', $voucher->id) }}"
                  method="POST">

                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label class="form-label">Kode Voucher</label>

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

                <div class="mb-3">
                    <label class="form-label">Nominal Potongan (Rp)</label>

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

                <div class="mb-3">
                    <label class="form-label">Minimal Belanja (Rp)</label>

                    <input type="number"
                           name="min_belanja"
                           class="form-control @error('min_belanja') is-invalid @enderror"
                           value="{{ old('min_belanja', $voucher->min_belanja) }}"
                           min="0"
                           required>

                    @error('min_belanja')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">Kuota Voucher</label>

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

                <div class="mb-4">
                    <label class="form-label">Tanggal Kedaluwarsa</label>

                    <input type="date"
                           name="expired"
                           class="form-control @error('expired') is-invalid @enderror"
                           value="{{ old('expired', $voucher->expired) }}"
                           required>

                    @error('expired')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary">
                    Simpan Perubahan
                </button>

                <a href="{{ route('admin.vouchers.index') }}"
                   class="btn btn-secondary">
                    Batal
                </a>

            </form>

        </div>
    </div>

</div>

</body>
</html>
