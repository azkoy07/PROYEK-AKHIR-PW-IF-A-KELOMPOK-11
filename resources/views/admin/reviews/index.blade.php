
@extends('layouts.admin')

@section('title', 'Ulasan Pelanggan - SportZone')
@section('page_title', 'Ulasan Pelanggan')
@section('page_subtitle', 'Kelola dan pantau ulasan produk dari pelanggan.')

@section('content')

<style>
    .review-page {
        color: #202938;
    }

    .review-heading {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 24px;
    }

    .review-heading h4 {
        font-size: 19px;
        font-weight: 700;
        margin-bottom: 5px;
    }

    .review-heading p {
        color: #8993a2;
        font-size: 13px;
        margin: 0;
    }

    .review-stat {
        background: #fff;
        border: 1px solid #e9edf2;
        border-radius: 12px;
        padding: 21px;
        height: 100%;
    }

    .review-stat-label {
        color: #8993a2;
        font-size: 13px;
        margin-bottom: 10px;
    }

    .review-stat-value {
        font-size: 27px;
        font-weight: 750;
        color: #202938;
    }

    .review-stat-icon {
        width: 43px;
        height: 43px;
        border-radius: 11px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 19px;
        background: #edf4ff;
        color: #3478df;
    }

    .review-card {
        background: #fff;
        border: 1px solid #e9edf2;
        border-radius: 12px;
        overflow: hidden;
        margin-top: 24px;
    }

    .review-card-header {
        padding: 20px 22px;
        border-bottom: 1px solid #edf0f4;
    }

    .review-card-header h5 {
        font-size: 16px;
        font-weight: 700;
        margin: 0;
    }

    .review-card-header p {
        color: #8993a2;
        font-size: 12px;
        margin: 5px 0 0;
    }

    .review-table {
        margin: 0;
        vertical-align: middle;
    }

    .review-table thead th {
        background: #f8f9fb;
        color: #7c8797;
        font-size: 11px;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: .4px;
        padding: 15px 18px;
        border-bottom: 1px solid #edf0f4;
        white-space: nowrap;
    }

    .review-table tbody td {
        padding: 17px 18px;
        font-size: 13px;
        border-bottom: 1px solid #f0f2f5;
    }

    .review-table tbody tr:last-child td {
        border-bottom: none;
    }

    .review-customer {
        font-weight: 650;
        color: #263244;
    }

    .review-product {
        font-weight: 650;
        color: #263244;
        max-width: 190px;
    }

    .review-order {
        color: #7d8795;
        font-size: 12px;
        margin-top: 4px;
    }

    .review-stars {
        color: #f5a623;
        white-space: nowrap;
        font-size: 13px;
        letter-spacing: 1px;
    }

    .review-rating-number {
        color: #596579;
        font-size: 12px;
        margin-left: 5px;
    }

    .review-comment {
        color: #667085;
        max-width: 260px;
        line-height: 1.6;
        overflow-wrap: anywhere;
    }

    .review-date {
        color: #7d8795;
        font-size: 12px;
        white-space: nowrap;
    }

    .review-delete {
        width: 34px;
        height: 34px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        border: 1px solid #f0d7d7;
        border-radius: 8px;
        background: #fff;
        color: #d74747;
        transition: .2s;
    }

    .review-delete:hover {
        background: #fff0f0;
        border-color: #e8baba;
    }

    .review-empty {
        padding: 65px 20px;
        text-align: center;
    }

    .review-empty i {
        font-size: 38px;
        color: #b9c2ce;
    }

    .review-empty h6 {
        font-weight: 700;
        margin-top: 14px;
    }

    .review-empty p {
        color: #8993a2;
        font-size: 13px;
        margin: 5px 0 0;
    }

    .review-pagination {
        padding: 18px 22px;
        border-top: 1px solid #edf0f4;
    }

    .review-pagination svg {
        width: 16px !important;
        height: 16px !important;
    }

    .review-pagination nav {
        display: flex;
        justify-content: flex-end;
    }

    .review-pagination p {
        font-size: 12px;
        color: #8993a2;
    }
</style>

<div class="review-page">

    <!-- JUDUL HALAMAN -->
    <div class="review-heading">
        <div>
            <h4>Daftar Ulasan Pelanggan</h4>
            <p>Lihat penilaian dan komentar pelanggan terhadap produk SportZone.</p>
        </div>
    </div>

    <!-- STATISTIK -->
    <div class="row g-3">

        <div class="col-md-6">
            <div class="review-stat">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <div class="review-stat-label">Total Ulasan</div>
                        <div class="review-stat-value">
                            {{ number_format($totalReviews, 0, ',', '.') }}
                        </div>
                    </div>

                    <div class="review-stat-icon">
                        <i class="bi bi-chat-square-text"></i>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="review-stat">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <div class="review-stat-label">Rata-rata Rating</div>
                        <div class="review-stat-value">
                            {{ number_format($averageRating, 1, ',', '.') }}
                            <span style="font-size: 15px; color: #f5a623;">
                                <i class="bi bi-star-fill"></i>
                            </span>
                        </div>
                    </div>

                    <div class="review-stat-icon">
                        <i class="bi bi-star-half"></i>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- TABEL ULASAN -->
    <div class="review-card">

        <div class="review-card-header">
            <h5>Semua Ulasan</h5>
            <p>Daftar ulasan yang diberikan oleh pelanggan.</p>
        </div>

        @if($reviews->count() > 0)

            <div class="table-responsive">
                <table class="table review-table">

                    <thead>
                        <tr>
                            <th style="width: 55px;">No.</th>
                            <th>Pelanggan</th>
                            <th>Produk</th>
                            <th>Rating</th>
                            <th>Komentar</th>
                            <th>Tanggal</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($reviews as $index => $review)

                            <tr>
                                <td class="text-muted">
                                    {{ $reviews->firstItem() + $index }}
                                </td>

                                <td>
                                    <div class="review-customer">
                                        {{ $review->nama_customer }}
                                    </div>
                                </td>

                                <td>
                                    <div class="review-product">
                                        {{ $review->nama_produk }}
                                    </div>

                                    <div class="review-order">
                                        Pesanan:
                                        {{ $review->kode_order ?? '-' }}
                                    </div>
                                </td>

                                <td>
                                    <div class="review-stars">
                                        @for($i = 1; $i <= 5; $i++)
                                            @if($i <= $review->rating)
                                                <i class="bi bi-star-fill"></i>
                                            @else
                                                <i class="bi bi-star"></i>
                                            @endif
                                        @endfor

                                        <span class="review-rating-number">
                                            {{ $review->rating }}/5
                                        </span>
                                    </div>
                                </td>

                                <td>
                                    <div class="review-comment">
                                        {{ $review->komentar ?: 'Tidak ada komentar.' }}
                                    </div>
                                </td>

                                <td>
                                    <div class="review-date">
                                        {{ \Carbon\Carbon::parse($review->created_at)->translatedFormat('d M Y') }}
                                    </div>
                                </td>

                                <td class="text-center">
                                    <form
                                        action="{{ route('admin.reviews.destroy', $review->id) }}"
                                        method="POST"
                                        onsubmit="return confirm('Apakah kamu yakin ingin menghapus ulasan ini?');"
                                    >
                                        @csrf
                                        @method('DELETE')

                                        <button
                                            type="submit"
                                            class="review-delete"
                                            title="Hapus ulasan"
                                        >
                                            <i class="bi bi-trash3"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>

                        @endforeach
                    </tbody>

                </table>
            </div>

            <!-- PAGINATION -->
            @if($reviews->hasPages())
                <div class="review-pagination">
                    {{ $reviews->links('pagination::bootstrap-5') }}
                </div>
            @endif

        @else

            <div class="review-empty">
                <i class="bi bi-chat-square-text"></i>
                <h6>Belum Ada Ulasan</h6>
                <p>Ulasan pelanggan akan muncul di halaman ini setelah diberikan.</p>
            </div>

        @endif

    </div>

</div>

@endsection
