
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Ulasan Produk - SportZone</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

<div class="container py-5">

    {{-- Header --}}
    <div class="d-flex justify-content-between align-items-center mb-4">

        <h3>Ulasan Produk</h3>

        <a href="/" class="btn btn-outline-secondary">
            Kembali Belanja
        </a>

    </div>

    {{-- Informasi Produk --}}
    <div class="card shadow-sm mb-4">

        <div class="card-body">

            <h4>{{ $product->nama }}</h4>

            <p class="text-muted mb-2">
                {{ $product->merek ?? 'SportZone' }}
            </p>

            <h5 class="mb-1">
                {{ $averageRating }} / 5
            </h5>

            <div class="text-warning fs-4">

                @for($i = 1; $i <= 5; $i++)

                    {{ $i <= round($averageRating) ? '★' : '☆' }}

                @endfor

            </div>

            <p class="text-muted mb-0">
                Berdasarkan {{ $totalReviews }} ulasan
            </p>

        </div>

    </div>

    {{-- Daftar Ulasan --}}
    <div class="card shadow-sm">

        <div class="card-header">

            <h5 class="mb-0">
                Daftar Ulasan Customer
            </h5>

        </div>

        <div class="card-body">

            @forelse($reviews as $review)

                <div class="border-bottom pb-3 mb-3">

                    <h6 class="mb-1">
                        {{ $review->nama_customer }}
                    </h6>

                    {{-- Rating Bintang --}}
                    <div class="text-warning mb-2">

                        @for($i = 1; $i <= 5; $i++)

                            {{ $i <= $review->rating ? '★' : '☆' }}

                        @endfor

                        <span class="text-muted small">
                            ({{ $review->rating }}/5)
                        </span>

                    </div>

                    {{-- Komentar --}}
                    @if($review->komentar)

                        <p class="mb-2">
                            {{ $review->komentar }}
                        </p>

                    @else

                        <p class="text-muted mb-2">
                            Customer tidak menambahkan komentar.
                        </p>

                    @endif

                    <small class="text-muted">
                        {{ $review->created_at }}
                    </small>

                </div>

            @empty

                <div class="text-center py-4">

                    <h6>Belum Ada Ulasan</h6>

                    <p class="text-muted mb-0">
                        Produk ini belum memiliki ulasan dari customer.
                    </p>

                </div>

            @endforelse

        </div>

    </div>

</div>

</body>
</html>
