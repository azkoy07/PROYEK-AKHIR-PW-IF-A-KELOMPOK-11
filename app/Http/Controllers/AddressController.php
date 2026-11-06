<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class AddressController extends Controller
{
    // 1. Menampilkan seluruh alamat milik customer
    public function index()
    {
        $addresses = DB::table('addresses')
            ->where('user_id', Auth::id())
            ->orderByDesc('is_utama')
            ->orderByDesc('id')
            ->get();

        return view('customer.addresses.index', compact('addresses'));
    }

    // 2. Menampilkan form tambah alamat
    public function create()
    {
        return view('customer.addresses.create');
    }

    // 3. Menyimpan alamat baru
    public function store(Request $request)
    {
        $request->validate([
            'penerima' => 'required|string|max:100',
            'no_hp' => 'required|string|max:20',
            'alamat_lengkap' => 'required|string',
            'kota' => 'nullable|string|max:60',
            'kode_pos' => 'nullable|string|max:10',
        ]);

        $jumlahAlamat = DB::table('addresses')
            ->where('user_id', Auth::id())
            ->count();

        // Alamat pertama otomatis menjadi alamat utama
        $isUtama = $jumlahAlamat == 0 ? 1 : 0;

        DB::table('addresses')->insert([
            'user_id' => Auth::id(),
            'penerima' => $request->penerima,
            'no_hp' => $request->no_hp,
            'alamat_lengkap' => $request->alamat_lengkap,
            'kota' => $request->kota,
            'kode_pos' => $request->kode_pos,
            'is_utama' => $isUtama,
        ]);

        return redirect()
            ->route('customer.addresses.index')
            ->with('success', 'Alamat berhasil ditambahkan.');
    }

    // 4. Menampilkan form edit alamat
    public function edit($id)
    {
        $address = DB::table('addresses')
            ->where('id', $id)
            ->where('user_id', Auth::id())
            ->first();

        if (!$address) {
            abort(404);
        }

        return view('customer.addresses.edit', compact('address'));
    }

    // 5. Memperbarui alamat
    public function update(Request $request, $id)
    {
        $request->validate([
            'penerima' => 'required|string|max:100',
            'no_hp' => 'required|string|max:20',
            'alamat_lengkap' => 'required|string',
            'kota' => 'nullable|string|max:60',
            'kode_pos' => 'nullable|string|max:10',
        ]);

        $address = DB::table('addresses')
            ->where('id', $id)
            ->where('user_id', Auth::id())
            ->first();

        if (!$address) {
            abort(404);
        }

        DB::table('addresses')
            ->where('id', $id)
            ->where('user_id', Auth::id())
            ->update([
                'penerima' => $request->penerima,
                'no_hp' => $request->no_hp,
                'alamat_lengkap' => $request->alamat_lengkap,
                'kota' => $request->kota,
                'kode_pos' => $request->kode_pos,
            ]);

        return redirect()
            ->route('customer.addresses.index')
            ->with('success', 'Alamat berhasil diperbarui.');
    }

    // 6. Menjadikan alamat sebagai alamat utama
    public function setPrimary($id)
    {
        $address = DB::table('addresses')
            ->where('id', $id)
            ->where('user_id', Auth::id())
            ->first();

        if (!$address) {
            abort(404);
        }

        $userId = Auth::id();

        DB::transaction(function () use ($id, $userId) {

            // Menghapus status utama dari semua alamat customer
            DB::table('addresses')
                ->where('user_id', $userId)
                ->update(['is_utama' => 0]);

            // Menjadikan alamat yang dipilih sebagai alamat utama
            DB::table('addresses')
                ->where('id', $id)
                ->where('user_id', $userId)
                ->update(['is_utama' => 1]);
        });

        return redirect()
            ->route('customer.addresses.index')
            ->with('success', 'Alamat utama berhasil diperbarui.');
    }

    // 7. Menghapus alamat
    public function destroy($id)
    {
        $userId = Auth::id();

        $address = DB::table('addresses')
            ->where('id', $id)
            ->where('user_id', $userId)
            ->first();

        if (!$address) {
            abort(404);
        }

        // Alamat yang sudah digunakan untuk pesanan tidak boleh dihapus
        $sudahDigunakan = DB::table('orders')
            ->where('address_id', $id)
            ->exists();

        if ($sudahDigunakan) {
            return redirect()
                ->route('customer.addresses.index')
                ->with('error', 'Alamat sudah digunakan dalam pesanan dan tidak dapat dihapus.');
        }

        DB::transaction(function () use ($id, $userId, $address) {

            // Menghapus alamat
            DB::table('addresses')
                ->where('id', $id)
                ->where('user_id', $userId)
                ->delete();

            // Jika alamat utama dihapus, pilih alamat lain sebagai utama
            if ($address->is_utama) {

                $alamatBerikutnya = DB::table('addresses')
                    ->where('user_id', $userId)
                    ->orderBy('id')
                    ->first();

                if ($alamatBerikutnya) {
                    DB::table('addresses')
                        ->where('id', $alamatBerikutnya->id)
                        ->update(['is_utama' => 1]);
                }
            }
        });

        return redirect()
            ->route('customer.addresses.index')
            ->with('success', 'Alamat berhasil dihapus.');
    }
}
