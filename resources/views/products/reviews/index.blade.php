
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Ulasan Produk - SportZone</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css" rel="stylesheet">

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            background: #f5f7fb;
            color: #202938;
            font-family: 'Inter', sans-serif;
            font-size: 13px;
        }

        /* NAVBAR */

        .navbar {
            height: 72px;
            background: #fff;
            border-bottom: 1px solid #e9edf3;
        }

        .navbar-brand {
            font-size: 21px;
            font-weight: 800;
            letter-spacing: -0.7px;
            color: #172033;
        }

        .brand-icon {
            width: 36px;
            height: 36px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            background: #eaf2ff;
            color: #2563eb;
            border-radius: 10px;
            margin-right: 9px;
        }

        /* MAIN CONTENT */

        .page-container {
            max-width: 1050px;
            margin: 38px auto;
            padding: 0 20px;
        }

        .page-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 25px;
        }

        .page-title {
            font-size: 23px;
            font-weight: 800;
            letter-spacing: -0.7px;
            margin-bottom: 6px;
        }

        .page-subtitle {
            color: #8791a1;
            font-size: 12px;
            margin: 0;
        }

        .btn-back {
            border: 1px solid #dce2ea;
            background: #fff;
            color: #475569;
            padding: 9px 15px;
            border-radius: 8px;
            font-size: 12px;
            font-weight: 600;
            text-decoration: none;
            transition: .2s;
        }

        .btn-back:hover {
            background: #f1f5f9;
            color: #1e293b;
        }

        /* PRODUCT CARD */

        .product-card {
            background: #fff;
            border: 1px solid #e9edf3;
            border-radius: 12px;
            padding: 25px;
            margin-bottom: 20px;
        }

        .product-label {
            font-size: 10px;
            font-weight: 700;
            color: #2563eb;
            text-transform: uppercase;
            letter-spacing: .7px;
            margin-bottom: 10px;
        }

        .product-name {
            font-size: 19px;
            font-weight: 800;
            color: #202938;
            margin-bottom: 7px;
        }

        .product-brand {
            color: #94a3b8;
            font-size: 12px;
            margin-bottom: 0;
        }

        .rating-summary {
            min-width: 230px;
            padding: 17px 22px;
            background: #f8faff;
            border: 1px solid #e5edfa;
            border-radius: 11px;
            text-align: center;
        }

        .rating-number {
            font-size: 34px;
            line-height: 1.2;
            font-weight: 800;
            color: #202938;
        }

        .rating-stars {
            color: #f5a623;
            font-size: 21px;
            letter-spacing: 2px;
            margin: 5px 0;
        }

        .rating-caption {
            font-size: 11px;
            color: #94a3b8;
        }

        /* REVIEW LIST */

        .review-section {
            background: #fff;
            border: 1px solid #e9edf3;
            border-radius: 12px;
            overflow: hidden;
        }

        .review-header {
            padding: 19px 23px;
            border-bottom: 1px solid #edf0f5;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .review-heading {
            font-size: 15px;
            font-weight: 800;
            margin: 0;
        }

        .review-count {
            background: #eff6ff;
            color: #2563eb;
            font-size: 10px;
            font-weight: 700;
            padding: 6px 10px;
            border-radius: 20px;
        }

        .review-list {
            padding: 5px 23px;
        }

        .review-item {
            padding: 20px 0;
            border-bottom: 1px solid #edf0f5;
        }

        .review-item:last-child {
            border-bottom: none;
        }

        .customer-avatar {
            width: 40px;
            height: 40px;
            min-width: 40px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: #eaf2ff;
            color: #2563eb;
            border-radius: 50%;
            font-size: 16px;
            font-weight: 800;
        }

        .customer-name {
            font-size: 12px;
            font-weight: 700;
            color: #263246;
            margin-bottom: 5px;
        }

        .review-stars {
            color: #f5a623;
            font-size: 15px;
            letter-spacing: 1px;
        }

        .review-rating {
            color: #94a3b8;
            font-size: 10px;
            margin-left: 5px;
        }

        .review-comment {
            color: #475569;
            font-size: 12px;
            line-height: 1.8;
            margin: 11px 0 8px;
            white-space: pre-line;
        }

        .review-date {
            font-size: 10px;
            color: #94a3b8;
        }

        /* EMPTY STATE */

        .empty-state {
            text-align: center;
            padding: 65px 20px;
        }

        .empty-icon {
            width: 68px;
            height: 68px;
            margin: 0 auto 17px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: #f1f5f9;
            color: #94a3b8;
            border-radius: 20px;
            font-size: 29px;
        }

        .empty-title {
            font-size: 15px;
            font-weight: 800;
            margin-bottom: 7px;
        }

        .empty-description {
            color: #94a3b8;
            font-size: 12px;
            margin: 0;
        }

        /* FOOTER */

        .page-footer {
            text-align: center;
            color: #94a3b8;
            font-size: 10px;
            margin-top: 25px;
        }
    </style>
</head>

<body>

{{-- NAVBAR --}}

<nav class="navbar">
    <div class="container">

        <a href="{{ route('home') }}"
           class="navbar-brand text-decoration-none">

            <span class="brand-icon">
                <i class="bi bi-basket2-fill"></i>
            </span>

            SportZone

        </a>

        <a href="{{ route('home') }}" class="btn-back">
            <i class="bi bi-arrow-left me-1"></i>
            Kembali Belanja
        </a>

    </div>
</nav>


{{-- MAIN CONTENT --}}

<div class="page-container">

    {{-- HEADER --}}

    <div class="page-header">

        <div>
            <h4 class="page-title">
                Ulasan Produk
            </h4>

            <p class="page-subtitle">
                Lihat pengalaman dan penilaian pelanggan terhadap produk ini.
            </p>
        </div>

    </div>


    {{-- PRODUCT INFORMATION --}}

    <div class="product-card">

        <div class="d-flex justify-content-between align-items-center gap-4">

            <div class="flex-grow-1">

                <div class="product-label">
                    Informasi Produk
                </div>

                <h4 class="product-name">
                    {{ $product->nama }}
                </h4>

                <p class="product-brand">
                    <i class="bi bi-tag me-1"></i>
                    {{ $product->merek ?? 'SportZone' }}
                </p>

            </div>


            {{-- RATING SUMMARY --}}

            <div class="rating-summary">

                <div class="rating-number">
                    {{ number_format((float) $averageRating, 1) }}
                    <span class="fs-6 text-muted">/ 5</span>
                </div>

                <div class="rating-stars">

                    @for($i = 1; $i <= 5; $i++)
                        {{ $i <= round($averageRating) ? '★' : '☆' }}
                    @endfor

                </div>

                <div class="rating-caption">
                    Berdasarkan {{ $totalReviews }} ulasan
                </div>

            </div>

        </div>

    </div>


    {{-- REVIEW LIST --}}

    <div class="review-section">

        <div class="review-header">

            <h5 class="review-heading">
                <i class="bi bi-chat-square-text me-2 text-primary"></i>
                Daftar Ulasan Pelanggan
            </h5>

            <span class="review-count">
                {{ $totalReviews }} Ulasan
            </span>

        </div>


        <div class="review-list">

            @forelse($reviews as $review)

                <div class="review-item">

                    <div class="d-flex gap-3 align-items-start">

                        {{-- CUSTOMER AVATAR --}}

                        <div class="customer-avatar">

                            {{ strtoupper(substr($review->nama_customer ?? 'C', 0, 1)) }}

                        </div>


                        {{-- REVIEW CONTENT --}}

                        <div class="flex-grow-1">

                            <div class="customer-name">
                                {{ $review->nama_customer }}
                            </div>


                            {{-- RATING STARS --}}

                            <div>

                                <span class="review-stars">

                                    @for($i = 1; $i <= 5; $i++)

                                        {{ $i <= $review->rating ? '★' : '☆' }}

                                    @endfor

                                </span>

                                <span class="review-rating">
                                    ({{ $review->rating }}/5)
                                </span>

                            </div>


                            {{-- COMMENT --}}

                            @if($review->komentar)

                                <p class="review-comment">
                                    {{ $review->komentar }}
                                </p>

                            @else

                                <p class="review-comment text-muted">
                                    Customer tidak menambahkan komentar.
                                </p>

                            @endif


                            {{-- DATE --}}

                            <div class="review-date">

                                <i class="bi bi-clock me-1"></i>

                                {{ \Carbon\Carbon::parse($review->created_at)->translatedFormat('d F Y, H:i') }}

                            </div>

                        </div>

                    </div>

                </div>

            @empty

                {{-- EMPTY REVIEW --}}

                <div class="empty-state">

                    <div class="empty-icon">
                        <i class="bi bi-chat-square-text"></i>
                    </div>

                    <h6 class="empty-title">
                        Belum Ada Ulasan
                    </h6>

                    <p class="empty-description">
                        Produk ini belum memiliki ulasan dari pelanggan.
                        Jadilah pelanggan pertama yang memberikan penilaian.
                    </p>

                </div>

            @endforelse

        </div>

    </div>


    <div class="page-footer">
        © {{ date('Y') }} SportZone. Semua hak dilindungi.
    </div>

</div>

</body>
</html>