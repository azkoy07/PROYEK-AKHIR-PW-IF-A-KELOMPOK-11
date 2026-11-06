<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Schema;

class ProductController extends Controller
{
    // Menampilkan daftar produk
    public function index()
    {
        $stock = DB::table('product_variants')
            ->select('product_id')
            ->selectRaw('SUM(stok) as total_stok')
            ->groupBy('product_id');

        $products = DB::table('products')
            ->leftJoin('categories', 'products.category_id', '=', 'categories.id')
            ->leftJoinSub($stock, 'variant_stock', function ($join) {
                $join->on('products.id', '=', 'variant_stock.product_id');
            })
            ->select(
                'products.id',
                'products.nama',
                'products.merek',
                'products.harga_dasar',
                'products.jenis_produk',
                'products.stok',
                'products.status',
                'categories.nama_kategori'
            )
            ->selectRaw("
                CASE
                    WHEN products.jenis_produk = 'biasa'
                    THEN products.stok
                    ELSE COALESCE(variant_stock.total_stok, 0)
                END AS total_stok
            ")
            ->orderBy('products.created_at', 'desc')
            ->get();

        return view('admin.products.index', compact('products'));
    }

    // Form tambah produk
    public function create()
    {
        $categories = DB::table('categories')
            ->orderBy('nama_kategori')
            ->get();

        return view('admin.products.create', compact('categories'));
    }

    // Menyimpan produk baru
    public function store(Request $request)
    {
        $rules = [
            'nama' => 'required|string|max:150',
            'merek' => 'required|string|max:100',
            'category_id' => 'required|exists:categories,id',
            'deskripsi' => 'nullable|string',
            'harga_dasar' => 'required|integer|min:0',
            'jenis_produk' => 'required|in:biasa,variasi',
            'status' => 'required|in:aktif,nonaktif',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ];

        if ($request->jenis_produk === 'biasa') {
            $rules['stok'] = 'required|integer|min:0';
        } else {
            $rules['variasi'] = 'required|array|min:1';
            $rules['variasi.*.ukuran'] = 'nullable|string|max:20';
            $rules['variasi.*.warna'] = 'nullable|string|max:30';
            $rules['variasi.*.harga'] = 'required|integer|min:0';
            $rules['variasi.*.stok'] = 'required|integer|min:0';
        }

        $validated = $request->validate($rules);

        DB::transaction(function () use ($request, $validated) {

            $productId = DB::table('products')->insertGetId([
                'nama' => $validated['nama'],
                'merek' => $validated['merek'],
                'category_id' => $validated['category_id'],
                'deskripsi' => $validated['deskripsi'] ?? null,
                'harga_dasar' => $validated['harga_dasar'],
                'jenis_produk' => $validated['jenis_produk'],
                'stok' => $validated['jenis_produk'] === 'biasa'
                    ? $validated['stok']
                    : 0,
                'terjual' => 0,
                'status' => $validated['status'],
                'created_at' => now(),
            ]);

            // Simpan variasi hanya jika produk bervariasi
            if ($validated['jenis_produk'] === 'variasi') {
                foreach ($validated['variasi'] as $variasi) {
                    DB::table('product_variants')->insert([
                        'product_id' => $productId,
                        'ukuran' => $variasi['ukuran'] ?: null,
                        'warna' => $variasi['warna'] ?: null,
                        'harga' => $variasi['harga'],
                        'stok' => $variasi['stok'],
                    ]);
                }
            }

            // Simpan gambar produk
            if ($request->hasFile('gambar')) {
                $fileName = $request->file('gambar')
                    ->store('products', 'public');

                DB::table('product_images')->insert([
                    'product_id' => $productId,
                    'file_name' => $fileName,
                    'is_utama' => 1,
                ]);
            }
        });

        return redirect()
            ->route('admin.products.index')
            ->with('success', 'Produk berhasil ditambahkan.');
    }

    // Form edit produk
    public function edit($id)
    {
        $product = DB::table('products')
            ->where('id', $id)
            ->first();

        if (!$product) {
            abort(404, 'Produk tidak ditemukan.');
        }

        $categories = DB::table('categories')
            ->orderBy('nama_kategori')
            ->get();

        $variations = DB::table('product_variants')
            ->where('product_id', $id)
            ->orderBy('id')
            ->get();

        $image = DB::table('product_images')
            ->where('product_id', $id)
            ->where('is_utama', 1)
            ->first();

        return view('admin.products.edit', compact(
            'product',
            'categories',
            'variations',
            'image'
        ));
    }

    // Memperbarui produk
    public function update(Request $request, $id)
    {
        $product = DB::table('products')
            ->where('id', $id)
            ->first();

        if (!$product) {
            abort(404, 'Produk tidak ditemukan.');
        }

        $rules = [
            'nama' => 'required|string|max:150',
            'merek' => 'required|string|max:100',
            'category_id' => 'required|exists:categories,id',
            'deskripsi' => 'nullable|string',
            'harga_dasar' => 'required|integer|min:0',
            'jenis_produk' => 'required|in:biasa,variasi',
            'status' => 'required|in:aktif,nonaktif',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ];

        if ($request->jenis_produk === 'biasa') {
            $rules['stok'] = 'required|integer|min:0';
        } else {
            $rules['variasi'] = 'required|array|min:1';
            $rules['variasi.*.id'] = 'nullable|integer';
            $rules['variasi.*.ukuran'] = 'nullable|string|max:20';
            $rules['variasi.*.warna'] = 'nullable|string|max:30';
            $rules['variasi.*.harga'] = 'required|integer|min:0';
            $rules['variasi.*.stok'] = 'required|integer|min:0';
        }

        $validated = $request->validate($rules);

        DB::transaction(function () use ($request, $validated, $id) {

            DB::table('products')
                ->where('id', $id)
                ->update([
                    'nama' => $validated['nama'],
                    'merek' => $validated['merek'],
                    'category_id' => $validated['category_id'],
                    'deskripsi' => $validated['deskripsi'] ?? null,
                    'harga_dasar' => $validated['harga_dasar'],
                    'jenis_produk' => $validated['jenis_produk'],
                    'stok' => $validated['jenis_produk'] === 'biasa'
                        ? $validated['stok']
                        : 0,
                    'status' => $validated['status'],
                ]);

            // Perbarui variasi jika jenis produk adalah variasi
            if ($validated['jenis_produk'] === 'variasi') {

                foreach ($validated['variasi'] as $variasi) {

                    $data = [
                        'ukuran' => $variasi['ukuran'] ?: null,
                        'warna' => $variasi['warna'] ?: null,
                        'harga' => $variasi['harga'],
                        'stok' => $variasi['stok'],
                    ];

                    if (!empty($variasi['id'])) {

                        $variant = DB::table('product_variants')
                            ->where('id', $variasi['id'])
                            ->where('product_id', $id)
                            ->first();

                        if (!$variant) {
                            abort(404, 'Variasi produk tidak ditemukan.');
                        }

                        DB::table('product_variants')
                            ->where('id', $variasi['id'])
                            ->where('product_id', $id)
                            ->update($data);

                    } else {

                        $data['product_id'] = $id;

                        DB::table('product_variants')->insert($data);
                    }
                }
            }

            // Ganti gambar jika ada gambar baru
            if ($request->hasFile('gambar')) {

                $oldImage = DB::table('product_images')
                    ->where('product_id', $id)
                    ->where('is_utama', 1)
                    ->first();

                $newFileName = $request->file('gambar')
                    ->store('products', 'public');

                if ($oldImage) {

                    DB::table('product_images')
                        ->where('id', $oldImage->id)
                        ->update([
                            'file_name' => $newFileName,
                        ]);

                    Storage::disk('public')->delete($oldImage->file_name);

                } else {

                    DB::table('product_images')->insert([
                        'product_id' => $id,
                        'file_name' => $newFileName,
                        'is_utama' => 1,
                    ]);
                }
            }
        });

        return redirect()
            ->route('admin.products.index')
            ->with('success', 'Produk berhasil diperbarui.');
    }
    public function destroy($id){
        // Cari produk
        $product = DB::table('products')
            ->where('id', $id)
            ->first();

        if (!$product) {
            return redirect()
                ->route('admin.products.index')
                ->with('error', 'Produk tidak ditemukan.');
        }

        // Ambil ID variasi produk
        $variantIds = DB::table('product_variants')
            ->where('product_id', $id)
            ->pluck('id');

        // Periksa apakah produk sudah digunakan dalam pesanan
        $adaPesanan = false;

        if (Schema::hasColumn('order_items', 'product_id')) {
            $adaPesanan = DB::table('order_items')
                ->where('product_id', $id)
                ->exists();
        }

        if (!$adaPesanan && Schema::hasColumn('order_items', 'variant_id')) {
            $adaPesanan = DB::table('order_items')
                ->whereIn('variant_id', $variantIds)
                ->exists();
        }

        if ($adaPesanan) {
            return redirect()
                ->route('admin.products.index')
                ->with('error', 'Produk tidak dapat dihapus karena sudah digunakan dalam pesanan.');
        }

        // Periksa apakah variasi memiliki riwayat stok
        if (
            $variantIds->isNotEmpty() &&
            Schema::hasColumn('stock_logs', 'variant_id')
        ) {
            $adaRiwayatStok = DB::table('stock_logs')
                ->whereIn('variant_id', $variantIds)
                ->exists();

            if ($adaRiwayatStok) {
                return redirect()
                    ->route('admin.products.index')
                    ->with('error', 'Produk tidak dapat dihapus karena memiliki riwayat stok.');
            }
        }

        // Ambil data gambar sebelum data database dihapus
        $images = DB::table('product_images')
            ->where('product_id', $id)
            ->pluck('file_name');

        try {
            DB::transaction(function () use ($id, $variantIds) {

                // Hapus data gambar dari database
                DB::table('product_images')
                    ->where('product_id', $id)
                    ->delete();

                // Hapus data variasi produk
                DB::table('product_variants')
                    ->where('product_id', $id)
                    ->delete();

                // Hapus data produk
                DB::table('products')
                    ->where('id', $id)
                    ->delete();
            });

            // Hapus file gambar dari storage setelah transaksi database berhasil
            foreach ($images as $fileName) {
                if ($fileName) {
                    Storage::disk('public')->delete($fileName);
                }
            }

            return redirect()
                ->route('admin.products.index')
                ->with('success', 'Produk berhasil dihapus.');

        } catch (\Throwable $e) {

            return redirect()
                ->route('admin.products.index')
                ->with('error', 'Produk gagal dihapus. Periksa hubungan data produk terlebih dahulu.');
        }
    }
}
