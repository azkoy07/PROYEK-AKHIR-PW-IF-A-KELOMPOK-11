
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Produk - SportZone</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>

<div class="sz-product-page">
    <div class="sz-wrapper">

        <div class="mb-4">
            <a href="{{ route('admin.products.index') }}"
               class="btn btn-light mb-3">
                <i class="bi bi-arrow-left me-1"></i> Kembali ke Produk
            </a>

            <h2 class="sz-page-title">Edit Produk</h2>
            <p class="sz-page-subtitle">Perbarui informasi produk SportZone.</p>
        </div>

        <div class="sz-card">
            <div class="sz-card-header">
                <h5 class="sz-section-title mb-1">Formulir Edit Produk</h5>
                <p class="sz-help-text mb-0">
                    Perubahan akan diterapkan pada produk yang dipilih.
                </p>
            </div>

            <div class="sz-card-body">

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <strong><i class="bi bi-exclamation-circle me-1"></i> Periksa kembali data berikut:</strong>
                        <ul class="mb-0 mt-2">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('admin.products.update', $product->id) }}"
                      method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <h5 class="sz-section-title">
                        <i class="bi bi-info-circle text-primary me-2"></i>
                        Informasi Produk
                    </h5>

                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label">Nama Produk</label>
                            <input type="text" name="nama" class="form-control"
                                   value="{{ old('nama', $product->nama) }}" required>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Merek</label>
                            <input type="text" name="merek" class="form-control"
                                   value="{{ old('merek', $product->merek) }}" required>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Kategori</label>
                            <select name="category_id" class="form-select" required>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}"
                                        {{ old('category_id', $product->category_id) == $category->id ? 'selected' : '' }}>
                                        {{ $category->nama_kategori }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Harga Dasar (Rp)</label>
                            <input type="number" name="harga_dasar" class="form-control"
                                   value="{{ old('harga_dasar', $product->harga_dasar) }}"
                                   min="0" required>
                        </div>

                        <div class="col-12">
                            <label class="form-label">Deskripsi Produk</label>
                            <textarea name="deskripsi" class="form-control"
                                      rows="4">{{ old('deskripsi', $product->deskripsi) }}</textarea>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Status Produk</label>
                            <select name="status" class="form-select" required>
                                <option value="aktif"
                                    {{ old('status', $product->status) == 'aktif' ? 'selected' : '' }}>
                                    Aktif
                                </option>
                                <option value="nonaktif"
                                    {{ old('status', $product->status) == 'nonaktif' ? 'selected' : '' }}>
                                    Nonaktif
                                </option>
                            </select>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Gambar Produk</label>

                            @if ($image)
                                <div class="mb-3">
                                    <img src="{{ asset('storage/' . $image->file_name) }}"
                                         alt="{{ $product->nama }}"
                                         class="img-thumbnail"
                                         style="width: 130px; height: 130px; object-fit: cover;">
                                </div>
                            @endif

                            <input type="file" name="gambar" class="form-control"
                                   accept=".jpg,.jpeg,.png,.webp">

                            <small class="sz-help-text">
                                Kosongkan jika tidak ingin mengganti gambar.
                            </small>
                        </div>
                    </div>

                    <hr class="sz-form-divider">

                    <h5 class="sz-section-title">
                        <i class="bi bi-box-seam text-primary me-2"></i>
                        Pengaturan Stok dan Variasi
                    </h5>

                    <div class="mb-3">
                        <label class="form-label">Jenis Produk</label>
                        <select name="jenis_produk" id="jenisProduk"
                                class="form-select" required>
                            <option value="biasa"
                                {{ old('jenis_produk', $product->jenis_produk) == 'biasa' ? 'selected' : '' }}>
                                Produk tanpa variasi
                            </option>
                            <option value="variasi"
                                {{ old('jenis_produk', $product->jenis_produk) == 'variasi' ? 'selected' : '' }}>
                                Produk dengan variasi
                            </option>
                        </select>
                    </div>

                    <div id="stokBiasa" class="mb-4">
                        <label class="form-label">Jumlah Stok</label>
                        <input type="number" name="stok" id="inputStok"
                               class="form-control" min="0"
                               value="{{ old('stok', $product->stok) }}">
                        <small class="sz-help-text">
                            Digunakan untuk produk tanpa variasi.
                        </small>
                    </div>

                    <div id="bagianVariasi">
                        <div class="d-flex justify-content-between align-items-center flex-wrap gap-2 mb-3">
                            <div>
                                <h6 class="fw-bold mb-1">Daftar Variasi Produk</h6>
                                <small class="sz-help-text">
                                    Perbarui variasi yang sudah ada atau tambahkan variasi baru.
                                </small>
                            </div>

                            <button type="button" class="btn btn-outline-primary"
                                    id="tombolTambahVariasi">
                                <i class="bi bi-plus-lg me-1"></i> Tambah Variasi
                            </button>
                        </div>

                        <div id="daftarVariasi"
                             data-count="{{ $variations->count() }}">

                            @foreach ($variations as $index => $variasi)
                                <div class="sz-variant-item mb-3 variasi-item">

                                    <input type="hidden"
                                           name="variasi[{{ $index }}][id]"
                                           value="{{ $variasi->id }}">

                                    <div class="row g-3">
                                        <div class="col-md-3">
                                            <label class="form-label">Ukuran</label>
                                            <input type="text"
                                                   name="variasi[{{ $index }}][ukuran]"
                                                   class="form-control"
                                                   value="{{ old('variasi.' . $index . '.ukuran', $variasi->ukuran) }}">
                                        </div>

                                        <div class="col-md-3">
                                            <label class="form-label">Warna</label>
                                            <input type="text"
                                                   name="variasi[{{ $index }}][warna]"
                                                   class="form-control"
                                                   value="{{ old('variasi.' . $index . '.warna', $variasi->warna) }}">
                                        </div>

                                        <div class="col-md-3">
                                            <label class="form-label">Harga (Rp)</label>
                                            <input type="number"
                                                   name="variasi[{{ $index }}][harga]"
                                                   class="form-control"
                                                   value="{{ old('variasi.' . $index . '.harga', $variasi->harga) }}"
                                                   min="0">
                                        </div>

                                        <div class="col-md-3">
                                            <label class="form-label">Stok</label>
                                            <input type="number"
                                                   name="variasi[{{ $index }}][stok]"
                                                   class="form-control"
                                                   value="{{ old('variasi.' . $index . '.stok', $variasi->stok) }}"
                                                   min="0">
                                        </div>
                                    </div>

                                </div>
                            @endforeach

                        </div>
                    </div>

                    <hr class="sz-form-divider">

                    <div class="d-flex flex-wrap gap-2">
                        <button type="submit" class="btn btn-primary">
                            <i class="bi bi-check-lg me-1"></i> Simpan Perubahan
                        </button>

                        <a href="{{ route('admin.products.index') }}"
                           class="btn btn-light">
                            Batal
                        </a>
                    </div>
                </form>

            </div>
        </div>

    </div>
</div>

<script>
    const jenisProduk = document.getElementById('jenisProduk');
    const stokBiasa = document.getElementById('stokBiasa');
    const inputStok = document.getElementById('inputStok');
    const bagianVariasi = document.getElementById('bagianVariasi');
    const daftarVariasi = document.getElementById('daftarVariasi');
    const tombolTambahVariasi = document.getElementById('tombolTambahVariasi');

    let nomorVariasi = Number(daftarVariasi.dataset.count);

    function aturJenisProduk() {
        const biasa = jenisProduk.value === 'biasa';

        stokBiasa.classList.toggle('d-none', !biasa);
        bagianVariasi.classList.toggle('d-none', biasa);

        inputStok.required = biasa;

        daftarVariasi.querySelectorAll('input').forEach(input => {
            if (input.name.includes('[harga]') ||
                input.name.includes('[stok]')) {
                input.required = !biasa;
            }
        });
    }

    function tambahVariasi() {
        const html = `
            <div class="sz-variant-item mb-3 variasi-item">
                <div class="row g-3">
                    <div class="col-md-3">
                        <label class="form-label">Ukuran</label>
                        <input type="text"
                               name="variasi[${nomorVariasi}][ukuran]"
                               class="form-control">
                    </div>

                    <div class="col-md-3">
                        <label class="form-label">Warna</label>
                        <input type="text"
                               name="variasi[${nomorVariasi}][warna]"
                               class="form-control">
                    </div>

                    <div class="col-md-3">
                        <label class="form-label">Harga (Rp)</label>
                        <input type="number"
                               name="variasi[${nomorVariasi}][harga]"
                               class="form-control" min="0" required>
                    </div>

                    <div class="col-md-3">
                        <label class="form-label">Stok</label>
                        <input type="number"
                               name="variasi[${nomorVariasi}][stok]"
                               class="form-control" min="0" value="0" required>
                    </div>
                </div>

                <button type="button"
                        class="btn btn-sm btn-outline-danger mt-3"
                        onclick="this.closest('.variasi-item').remove()">
                    <i class="bi bi-trash me-1"></i> Hapus Baris Baru
                </button>
            </div>
        `;

        daftarVariasi.insertAdjacentHTML('beforeend', html);
        nomorVariasi++;
    }

    jenisProduk.addEventListener('change', aturJenisProduk);
    tombolTambahVariasi.addEventListener('click', tambahVariasi);

    aturJenisProduk();
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
