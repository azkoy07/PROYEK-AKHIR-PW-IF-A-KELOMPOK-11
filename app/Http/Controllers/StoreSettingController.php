<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class StoreSettingController extends Controller
{
    // Menampilkan halaman pengaturan toko
    public function edit()
    {
        // Mengambil pengaturan toko dengan ID 1
        $settings = DB::table('store_settings')
            ->where('id', 1)
            ->first();

        // Membuat data awal jika tabel belum memiliki baris
        if (!$settings) {

            DB::table('store_settings')->insert([
                'id' => 1,
                'nama_toko' => 'SportZone Official Store',
                'deskripsi' => 'Toko perlengkapan olahraga.',
                'kota' => 'Bandung',
                'ongkir_flat' => 15000,
            ]);

            $settings = DB::table('store_settings')
                ->where('id', 1)
                ->first();
        }

        return view('admin.settings.edit', compact('settings'));
    }

    // Memperbarui pengaturan toko
    public function update(Request $request)
    {
        // Validasi data
        $validated = $request->validate([
            'nama_toko' => 'required|string|max:100',
            'deskripsi' => 'nullable|string',
            'logo' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'kota' => 'nullable|string|max:60',
            'no_wa' => 'nullable|string|max:20',
            'bank_nama' => 'nullable|string|max:30',
            'bank_rekening' => 'nullable|string|max:30',
            'bank_atas_nama' => 'nullable|string|max:80',
            'ongkir_flat' => 'required|integer|min:0',
            'hapus_logo' => 'nullable|boolean',
        ], [
            'nama_toko.required' => 'Nama toko wajib diisi.',
            'nama_toko.max' => 'Nama toko maksimal 100 karakter.',
            'logo.image' => 'File logo harus berupa gambar.',
            'logo.mimes' => 'Format logo harus JPG, JPEG, PNG, atau WEBP.',
            'logo.max' => 'Ukuran logo maksimal 2 MB.',
            'ongkir_flat.required' => 'Ongkir wajib diisi.',
            'ongkir_flat.integer' => 'Ongkir harus berupa angka.',
            'ongkir_flat.min' => 'Ongkir tidak boleh negatif.',
        ]);

        // Mengambil data pengaturan lama
        $settings = DB::table('store_settings')
            ->where('id', 1)
            ->first();

        $logoLama = $settings->logo ?? null;

        // Mengambil data yang akan diperbarui
        $data = [
            'nama_toko' => $validated['nama_toko'],
            'deskripsi' => $validated['deskripsi'] ?? null,
            'kota' => $validated['kota'] ?? null,
            'no_wa' => $validated['no_wa'] ?? null,
            'bank_nama' => $validated['bank_nama'] ?? null,
            'bank_rekening' => $validated['bank_rekening'] ?? null,
            'bank_atas_nama' => $validated['bank_atas_nama'] ?? null,
            'ongkir_flat' => $validated['ongkir_flat'],
        ];

        // Upload logo baru jika dipilih
        if ($request->hasFile('logo')) {

            $logoBaru = $request->file('logo')
                ->store('store', 'public');

            $data['logo'] = $logoBaru;

        } elseif ($request->boolean('hapus_logo')) {

            // Menghapus logo jika checkbox dipilih
            $data['logo'] = null;

        }

        // Memastikan baris pengaturan dengan ID 1 diperbarui
        DB::table('store_settings')->updateOrInsert(
            ['id' => 1],
            $data
        );

        // Menghapus logo lama setelah pembaruan berhasil
        if (
            $logoLama &&
            isset($data['logo']) &&
            $logoLama !== $data['logo']
        ) {
            Storage::disk('public')->delete($logoLama);
        }

        return redirect()
            ->route('admin.settings.edit')
            ->with('success', 'Pengaturan toko berhasil diperbarui.');
    }
}
