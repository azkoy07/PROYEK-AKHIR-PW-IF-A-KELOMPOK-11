<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    // Membuat slug yang unik
    private function buatSlugUnik($nama, $ignoreId = null)
    {
        $slugDasar = Str::slug($nama);

        if ($slugDasar === '') {
            $slugDasar = 'kategori';
        }

        $slug = $slugDasar;
        $nomor = 1;

        while (true) {
            $query = DB::table('categories')
                ->where('slug', $slug);

            if ($ignoreId !== null) {
                $query->where('id', '!=', $ignoreId);
            }

            if (!$query->exists()) {
                break;
            }

            $slug = $slugDasar . '-' . $nomor;
            $nomor++;
        }

        return $slug;
    }

    // READ: Menampilkan seluruh kategori
    public function index()
    {
        $categories = DB::table('categories')
            ->orderBy('id', 'desc')
            ->get();

        return view('admin.categories.index', compact('categories'));
    }

    // Menampilkan halaman tambah kategori
    public function create()
    {
        return view('admin.categories.create');
    }

    // CREATE: Menyimpan kategori baru
    public function store(Request $request)
    {
        $request->validate([
            'nama_kategori' => 'required|string|max:100|unique:categories,nama_kategori',
        ], [
            'nama_kategori.required' => 'Nama kategori wajib diisi.',
            'nama_kategori.unique' => 'Nama kategori sudah tersedia.',
            'nama_kategori.max' => 'Nama kategori maksimal 100 karakter.',
        ]);

        DB::table('categories')->insert([
            'nama_kategori' => $request->nama_kategori,
            'slug' => $this->buatSlugUnik($request->nama_kategori),
        ]);

        return redirect()
            ->route('admin.categories.index')
            ->with('success', 'Kategori berhasil ditambahkan.');
    }

    // Menampilkan halaman edit kategori
    public function edit($id)
    {
        $category = DB::table('categories')
            ->where('id', $id)
            ->first();

        if (!$category) {
            abort(404);
        }

        return view('admin.categories.edit', compact('category'));
    }

    // UPDATE: Memperbarui kategori
    public function update(Request $request, $id)
    {
        $category = DB::table('categories')
            ->where('id', $id)
            ->first();

        if (!$category) {
            abort(404);
        }

        $request->validate([
            'nama_kategori' => 'required|string|max:100|unique:categories,nama_kategori,' . $id,
        ], [
            'nama_kategori.required' => 'Nama kategori wajib diisi.',
            'nama_kategori.unique' => 'Nama kategori sudah digunakan.',
            'nama_kategori.max' => 'Nama kategori maksimal 100 karakter.',
        ]);

        DB::table('categories')
            ->where('id', $id)
            ->update([
                'nama_kategori' => $request->nama_kategori,
                'slug' => $this->buatSlugUnik($request->nama_kategori, $id),
            ]);

        return redirect()
            ->route('admin.categories.index')
            ->with('success', 'Kategori berhasil diperbarui.');
    }

    // DELETE: Menghapus kategori
    public function destroy($id)
    {
        $category = DB::table('categories')
            ->where('id', $id)
            ->first();

        if (!$category) {
            abort(404);
        }

        // Periksa apakah kategori masih digunakan produk
        $jumlahProduk = DB::table('products')
            ->where('category_id', $id)
            ->count();

        if ($jumlahProduk > 0) {
            return redirect()
                ->route('admin.categories.index')
                ->with('error', 'Kategori tidak dapat dihapus karena masih digunakan oleh produk.');
        }

        DB::table('categories')
            ->where('id', $id)
            ->delete();

        return redirect()
            ->route('admin.categories.index')
            ->with('success', 'Kategori berhasil dihapus.');
    }
}
