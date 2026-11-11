
@extends('layouts.admin')

@section('title', 'Kelola Voucher - SportZone')
@section('page_title', 'Kelola Voucher')
@section('page_subtitle', 'Kelola kode voucher dan potongan harga untuk pelanggan SportZone.')

@section('content')

<div class="w-100">

    <div class="d-flex justify-content-end mb-4">
        <a href="{{ route('admin.vouchers.create') }}" class="btn btn-primary px-3 py-2">
            <i class="bi bi-plus-lg me-1"></i>
            Tambah Voucher
        </a>
    </div>

    <div class="card border shadow-sm rounded-3 bg-white">

        <div class="card-body p-0">

            <div class="d-flex justify-content-between align-items-center px-4 py-3 border-bottom">
                <div>
                    <div class="fw-semibold">Data Voucher</div>
                    <small class="text-muted">
                        Daftar kode diskon, nominal potongan, kuota, dan masa berlaku.
                    </small>
                </div>

                <span class="badge bg-light text-dark border px-3 py-2">
                    {{ $vouchers->count() }} Voucher
                </span>
            </div>

            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">

                    <thead class="table-light">
                        <tr>
                            <th class="ps-4" width="70">No.</th>
                            <th>Kode Voucher</th>
                            <th>Potongan</th>
                            <th>Minimal Belanja</th>
                            <th>Kuota</th>
                            <th>Kedaluwarsa</th>
                            <th width="180">Aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse($vouchers as $voucher)
                            <tr>
                                <td class="ps-4">{{ $loop->iteration }}</td>

                                <td>
                                    <span class="fw-semibold text-primary">
                                        {{ $voucher->kode }}
                                    </span>
                                </td>

                                <td>
                                    Rp {{ number_format($voucher->potongan, 0, ',', '.') }}
                                </td>

                                <td>
                                    Rp {{ number_format($voucher->min_belanja, 0, ',', '.') }}
                                </td>

                                <td>{{ $voucher->kuota }}</td>

                                <td>
                                    {{ \Carbon\Carbon::parse($voucher->expired)->format('d-m-Y') }}
                                </td>

                                <td>
                                    <div class="d-flex gap-2">

                                        <a href="{{ route('admin.vouchers.edit', $voucher->id) }}"
                                           class="btn btn-sm btn-outline-primary">
                                            <i class="bi bi-pencil-square me-1"></i>
                                            Edit
                                        </a>

                                        <form action="{{ route('admin.vouchers.destroy', $voucher->id) }}"
                                              method="POST"
                                              onsubmit="return confirm('Yakin ingin menghapus voucher ini?')">
                                            @csrf
                                            @method('DELETE')

                                            <button type="submit" class="btn btn-sm btn-outline-danger">
                                                <i class="bi bi-trash me-1"></i>
                                                Hapus
                                            </button>
                                        </form>

                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="text-center py-5">
                                    <i class="bi bi-ticket-perforated fs-1 text-secondary d-block mb-3"></i>
                                    <div class="fw-semibold text-secondary">Belum Ada Voucher</div>
                                    <small class="text-muted">
                                        Tambahkan voucher baru untuk memberikan diskon kepada pelanggan.
                                    </small>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>

                </table>
            </div>

        </div>
    </div>

</div>

@endsection
