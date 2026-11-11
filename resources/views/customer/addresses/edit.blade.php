
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Alamat - SportZone</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css" rel="stylesheet">

    <style>
        * {
            font-family: 'Inter', sans-serif;
        }

        body {
            background: #f5f7fb;
            color: #172033;
        }

        .navbar {
            height: 72px;
            background: #fff;
            border-bottom: 1px solid #e8ebf1;
        }

        .brand {
            color: #172033;
            font-size: 21px;
            font-weight: 800;
            text-decoration: none;
        }

        .brand span {
            color: #2563eb;
        }

        .page-container {
            max-width: 760px;
            margin: 0 auto;
            padding: 45px 20px 70px;
        }

        .form-card {
            background: #fff;
            border: 1px solid #e9edf3;
            border-radius: 13px;
            padding: 34px;
        }

        .page-title {
            font-size: 24px;
            font-weight: 800;
            letter-spacing: -.6px;
        }

        .page-subtitle {
            color: #7b8495;
            font-size: 13px;
        }

        .form-label {
            font-size: 13px;
            font-weight: 600;
            margin-bottom: 8px;
        }

        .form-control {
            min-height: 44px;
            border: 1px solid #dfe4ec;
            border-radius: 8px;
            font-size: 13px;
            padding: 11px 13px;
        }

        textarea.form-control {
            min-height: 115px;
        }

        .form-control:focus {
            border-color: #2563eb;
            box-shadow: 0 0 0 3px rgba(37, 99, 235, .1);
        }

        .btn {
            border-radius: 8px;
            font-size: 13px;
            font-weight: 600;
            padding: 10px 17px;
        }

        .btn-primary {
            background: #2563eb;
            border-color: #2563eb;
        }

        .btn-primary:hover {
            background: #1d4ed8;
            border-color: #1d4ed8;
        }

        .back-link {
            color: #64748b;
            text-decoration: none;
            font-size: 13px;
            font-weight: 600;
        }

        .back-link:hover {
            color: #2563eb;
        }

        .section-label {
            font-size: 11px;
            color: #2563eb;
            font-weight: 700;
            letter-spacing: .8px;
            text-transform: uppercase;
            margin-bottom: 20px;
        }

        .alert {
            font-size: 13px;
            border-radius: 9px;
        }
    </style>
</head>

<body>

<nav class="navbar">
    <div class="container">
        <a href="{{ route('home') }}" class="brand">
            SPORT<span>ZONE</span>
        </a>

        <a href="{{ route('customer.addresses.index') }}" class="back-link">
            <i class="bi bi-arrow-left me-1"></i>
            Kembali ke Alamat
        </a>
    </div>
</nav>

<div class="page-container">

    <div class="form-card">

        <div class="mb-4">
            <div class="section-label">
                <i class="bi bi-pencil-square me-1"></i>
                Pengaturan Alamat
            </div>

            <h3 class="page-title mb-2">Edit Alamat</h3>

            <p class="page-subtitle mb-0">
                Perbarui informasi alamat pengiriman yang tersimpan.
            </p>
        </div>

        @if($errors->any())
            <div class="alert alert-danger">
                <div class="fw-bold mb-2">
                    <i class="bi bi-exclamation-circle me-1"></i>
                    Periksa kembali data yang dimasukkan.
                </div>

                <ul class="mb-0">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('customer.addresses.update', $address->id) }}"
              method="POST">

            @csrf
            @method('PUT')

            <div class="mb-3">
                <label class="form-label">Nama Penerima</label>

                <input type="text"
                       name="penerima"
                       class="form-control"
                       value="{{ old('penerima', $address->penerima) }}"
                       maxlength="100"
                       required>
            </div>

            <div class="mb-3">
                <label class="form-label">Nomor HP</label>

                <input type="text"
                       name="no_hp"
                       class="form-control"
                       value="{{ old('no_hp', $address->no_hp) }}"
                       maxlength="20"
                       required>
            </div>

            <div class="mb-3">
                <label class="form-label">Alamat Lengkap</label>

                <textarea name="alamat_lengkap"
                          class="form-control"
                          rows="4"
                          required>{{ old('alamat_lengkap', $address->alamat_lengkap) }}</textarea>
            </div>

            <div class="row">
                <div class="col-md-7 mb-3">
                    <label class="form-label">Kota</label>

                    <input type="text"
                           name="kota"
                           class="form-control"
                           value="{{ old('kota', $address->kota) }}"
                           maxlength="60">
                </div>

                <div class="col-md-5 mb-3">
                    <label class="form-label">Kode Pos</label>

                    <input type="text"
                           name="kode_pos"
                           class="form-control"
                           value="{{ old('kode_pos', $address->kode_pos) }}"
                           maxlength="10">
                </div>
            </div>

            <div class="d-flex justify-content-end gap-2 mt-4 pt-3 border-top">

                <a href="{{ route('customer.addresses.index') }}"
                   class="btn btn-outline-secondary">
                    Batal
                </a>

                <button type="submit" class="btn btn-primary">
                    <i class="bi bi-check-lg me-1"></i>
                    Simpan Perubahan
                </button>

            </div>

        </form>

    </div>

</div>

</body>
</html>
