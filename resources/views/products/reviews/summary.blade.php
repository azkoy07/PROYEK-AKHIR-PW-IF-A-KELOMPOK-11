@php
    // Mengambil jumlah dan rata-rata rating produk
    $reviewSummary = \Illuminate\Support\Facades\DB::table('reviews')
        ->where('product_id', $product->id)
        ->selectRaw(
            'COUNT(*) as total_reviews,
             COALESCE(AVG(rating), 0) as average_rating'
        )
        ->first();

    $totalReviews = (int) $reviewSummary->total_reviews;

    $averageRating = round(
        (float) $reviewSummary->average_rating,
        1
    );

    $starCount = (int) round($averageRating);
@endphp

<div class="mt-3 mb-3">

    <div class="d-flex align-items-center flex-wrap gap-2">

        {{-- Tampilan bintang --}}
        <div class="text-warning fs-5">

            @for($i = 1; $i <= 5; $i++)

                @if($i <= $starCount)
                    ★
                @else
                    ☆
                @endif

            @endfor

        </div>

        {{-- Nilai rata-rata --}}
        <span class="fw-semibold">
            {{ number_format($averageRating, 1, ',', '.') }}/5
        </span>

        {{-- Jumlah ulasan --}}
        <span class="text-muted small">
            ({{ $totalReviews }} ulasan)
        </span>

    </div>

    {{-- Link melihat seluruh ulasan --}}
    <div class="mt-2">

        <a
            href="{{ route('products.reviews.index', $product->id) }}"
            class="text-decoration-none"
        >
            Lihat semua ulasan
        </a>

    </div>

</div>
