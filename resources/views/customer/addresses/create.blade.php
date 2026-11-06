
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Alamat - SportZone</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container py-5">

    <div class="card border-0 shadow-sm mx-auto" style="max-width: 700px;">

        <div class="card-body p-4">

            <h3 class="fw-bold mb-2">Tambah Alamat</h3>

            <p class="text-secondary mb-4">
                Masukkan informasi alamat pengiriman.
            </p>

            @if($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('customer.addresses.store') }}"
                  method="POST">

                @csrf

                <div class="mb-3">
                    <label class="form-label">Nama Penerima</label>

                    <input type="text"
                           name="penerima"
                           class="form-control"
                           value="{{ old('penerima') }}"
                           maxlength="100"
                           required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Nomor HP</label>

                    <input type="text"
                           name="no_hp"
                           class="form-control"
                           value="{{ old('no_hp') }}"
                           maxlength="20"
                           required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Alamat Lengkap</label>

                    <textarea name="alamat_lengkap"
                              class="form-control"
                              rows="4"
                              required>{{ old('alamat_lengkap') }}</textarea>
                </div>

                <div class="mb-3">
                    <label class="form-label">Kota</label>

                    <input type="text"
                           name="kota"
                           class="form-control"
                           value="{{ old('kota') }}"
                           maxlength="60">
                </div>

                <div class="mb-4">
                    <label class="form-label">Kode Pos</label>

                    <input type="text"
                           name="kode_pos"
                           class="form-control"
                           value="{{ old('kode_pos') }}"
                           maxlength="10">
                </div>

                <div class="d-flex gap-2">

                    <a href="{{ route('customer.addresses.index') }}"
                       class="btn btn-outline-secondary">
                        Batal
                    </a>

                    <button type="submit" class="btn btn-primary">
                        Simpan Alamat
                    </button>

                </div>

            </form>

        </div>
    </div>

</div>

</body>
</html>
