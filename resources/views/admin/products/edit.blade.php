
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Produk - SportZone</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container py-5">

    <h2>Edit Produk</h2>
    <p class="text-muted">Perbarui informasi produk SportZone.</p>

    <div class="card shadow-sm">
        <div class="card-body">

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
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

                <h5 class="mb-3">Informasi Produk</h5>

                <div class="mb-3">
                    <label class="form-label">Nama Produk</label>
                    <input type="text" name="nama" class="form-control"
                           value="{{ old('nama', $product->nama) }}" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Merek</label>
                    <input type="text" name="merek" class="form-control"
                           value="{{ old('merek', $product->merek) }}" required>
                </div>

                <div class="mb-3">
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

                <div class="mb-3">
                    <label class="form-label">Deskripsi</label>
                    <textarea name="deskripsi" class="form-control"
                              rows="4">{{ old('deskripsi', $product->deskripsi) }}</textarea>
                </div>

                <div class="mb-3">
                    <label class="form-label">Harga Dasar</label>
                    <input type="number" name="harga_dasar" class="form-control"
                           value="{{ old('harga_dasar', $product->harga_dasar) }}"
                           min="0" required>
                </div>

                <div class="mb-3">
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

                <div class="mb-4">
                    <label class="form-label">Gambar Produk</label>

                    @if ($image)
                        <div class="mb-2">
                            <img src="{{ asset('storage/' . $image->file_name) }}"
                                 alt="{{ $product->nama }}"
                                 width="130" class="img-thumbnail">
                        </div>
                    @endif

                    <input type="file" name="gambar" class="form-control"
                           accept=".jpg,.jpeg,.png,.webp">
                    <small class="text-muted">
                        Kosongkan jika tidak ingin mengganti gambar.
                    </small>
                </div>

                <hr>

                <h5 class="mb-3">Jenis Produk</h5>

                <div class="mb-3">
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
                </div>

                <div id="bagianVariasi">

                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h5>Variasi Produk</h5>
                        <button type="button" class="btn btn-success btn-sm"
                                id="tombolTambahVariasi">
                            + Tambah Variasi
                        </button>
                    </div>

                    <div id="daftarVariasi"
                         data-count="{{ $variations->count() }}">

                        @foreach ($variations as $index => $variasi)
                            <div class="border rounded p-3 mb-3 variasi-item">

                                <input type="hidden"
                                       name="variasi[{{ $index }}][id]"
                                       value="{{ $variasi->id }}">

                                <div class="row g-3">

                                    <div class="col-md-3">
                                        <label class="form-label">Ukuran</label>
                                        <input type="text"
                                               name="variasi[{{ $index }}][ukuran]"
                                               class="form-control"
                                               value="{{ $variasi->ukuran }}">
                                    </div>

                                    <div class="col-md-3">
                                        <label class="form-label">Warna</label>
                                        <input type="text"
                                               name="variasi[{{ $index }}][warna]"
                                               class="form-control"
                                               value="{{ $variasi->warna }}">
                                    </div>

                                    <div class="col-md-3">
                                        <label class="form-label">Harga</label>
                                        <input type="number"
                                               name="variasi[{{ $index }}][harga]"
                                               class="form-control"
                                               value="{{ $variasi->harga }}"
                                               min="0" required>
                                    </div>

                                    <div class="col-md-3">
                                        <label class="form-label">Stok</label>
                                        <input type="number"
                                               name="variasi[{{ $index }}][stok]"
                                               class="form-control"
                                               value="{{ $variasi->stok }}"
                                               min="0" required>
                                    </div>

                                </div>
                            </div>
                        @endforeach

                    </div>
                </div>

                <button type="submit" class="btn btn-primary">
                    Simpan Perubahan
                </button>

                <a href="{{ route('admin.products.index') }}"
                   class="btn btn-secondary">Batal</a>

            </form>
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
            <div class="border rounded p-3 mb-3 variasi-item">

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
                        <label class="form-label">Harga</label>
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
                        class="btn btn-danger btn-sm mt-3"
                        onclick="this.closest('.variasi-item').remove()">
                    Hapus Baris Baru
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

</body>
</html>
