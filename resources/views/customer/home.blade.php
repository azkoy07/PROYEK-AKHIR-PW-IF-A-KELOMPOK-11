
@extends('layouts.app')

@section('title', 'Beranda - SportZone')

@section('content')

<!-- Hero Section -->
<section class="hero">
    <div class="container">

        <h1>Selamat Datang di SportZone</h1>

        <p>
            Temukan perlengkapan olahraga terbaik
            untuk mendukung aktivitasmu.
        </p>

        <a href="/produk" class="btn btn-primary mt-3">
            Lihat Produk
        </a>

    </div>
</section>

<!-- Kategori -->
<section class="container py-5">

    <h2 class="section-title text-center">
        Kategori Olahraga
    </h2>

    <div class="row g-3">

        <div class="col-md-4">
            <div class="card p-4 text-center">
                <i class="bi bi-dribbble fs-1"></i>
                <h5 class="mt-3">Basket</h5>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card p-4 text-center">
                <i class="bi bi-trophy fs-1"></i>
                <h5 class="mt-3">Sepak Bola</h5>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card p-4 text-center">
                <i class="bi bi-bicycle fs-1"></i>
                <h5 class="mt-3">Fitness</h5>
            </div>
        </div>

    </div>

</section>

@endsection
