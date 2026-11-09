<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;

class AdminVoucherController extends Controller
{
    // Menampilkan daftar voucher
    public function index()
    {
        $vouchers = DB::table('vouchers')
            ->orderByDesc('id')
            ->get();

        return view('admin.vouchers.index', compact('vouchers'));
    }

    // Form tambah voucher
    public function create()
    {
        return view('admin.vouchers.create');
    }

    // Menyimpan voucher baru
    public function store(Request $request)
    {
        $validated = $request->validate([
            'kode' => [
                'required',
                'string',
                'max:30',
                'unique:vouchers,kode',
            ],
            'potongan' => 'required|integer|min:1',
            'min_belanja' => 'required|integer|min:0',
            'kuota' => 'required|integer|min:0',
            'expired' => 'required|date',
        ], [
            'kode.required' => 'Kode voucher wajib diisi.',
            'kode.unique' => 'Kode voucher sudah digunakan.',
            'potongan.required' => 'Nominal potongan wajib diisi.',
            'potongan.min' => 'Potongan harus lebih dari 0.',
            'min_belanja.required' => 'Minimal belanja wajib diisi.',
            'kuota.required' => 'Kuota wajib diisi.',
            'expired.required' => 'Tanggal kedaluwarsa wajib diisi.',
        ]);

        $validated['kode'] = strtoupper(trim($validated['kode']));

        DB::table('vouchers')->insert($validated);

        return redirect()
            ->route('admin.vouchers.index')
            ->with('success', 'Voucher berhasil ditambahkan.');
    }

    // Form edit voucher
    public function edit($id)
    {
        $voucher = DB::table('vouchers')
            ->where('id', $id)
            ->first();

        if (!$voucher) {
            abort(404, 'Voucher tidak ditemukan.');
        }

        return view('admin.vouchers.edit', compact('voucher'));
    }

    // Memperbarui voucher
    public function update(Request $request, $id)
    {
        $voucher = DB::table('vouchers')
            ->where('id', $id)
            ->first();

        if (!$voucher) {
            abort(404, 'Voucher tidak ditemukan.');
        }

        $validated = $request->validate([
            'kode' => [
                'required',
                'string',
                'max:30',
                Rule::unique('vouchers', 'kode')->ignore($id),
            ],
            'potongan' => 'required|integer|min:1',
            'min_belanja' => 'required|integer|min:0',
            'kuota' => 'required|integer|min:0',
            'expired' => 'required|date',
        ], [
            'kode.required' => 'Kode voucher wajib diisi.',
            'kode.unique' => 'Kode voucher sudah digunakan.',
            'potongan.required' => 'Nominal potongan wajib diisi.',
            'potongan.min' => 'Potongan harus lebih dari 0.',
            'min_belanja.required' => 'Minimal belanja wajib diisi.',
            'kuota.required' => 'Kuota wajib diisi.',
            'expired.required' => 'Tanggal kedaluwarsa wajib diisi.',
        ]);

        $validated['kode'] = strtoupper(trim($validated['kode']));

        DB::table('vouchers')
            ->where('id', $id)
            ->update($validated);

        return redirect()
            ->route('admin.vouchers.index')
            ->with('success', 'Voucher berhasil diperbarui.');
    }

    // Menghapus voucher
    public function destroy($id)
    {
        $voucher = DB::table('vouchers')
            ->where('id', $id)
            ->first();

        if (!$voucher) {
            return redirect()
                ->route('admin.vouchers.index')
                ->with('error', 'Voucher tidak ditemukan.');
        }

        // Voucher tidak boleh dihapus jika sudah digunakan pesanan
        $sudahDigunakan = DB::table('orders')
            ->where('voucher_id', $id)
            ->exists();

        if ($sudahDigunakan) {
            return redirect()
                ->route('admin.vouchers.index')
                ->with('error', 'Voucher tidak dapat dihapus karena sudah digunakan dalam pesanan.');
        }

        DB::table('vouchers')
            ->where('id', $id)
            ->delete();

        return redirect()
            ->route('admin.vouchers.index')
            ->with('success', 'Voucher berhasil dihapus.');
    }
}
