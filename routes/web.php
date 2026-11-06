<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProductController;

// Halaman utama
Route::get('/', [HomeController::class, 'index'])->name('home');

// Register
Route::get('/register', [AuthController::class, 'showRegister'])
    ->name('register');

Route::post('/register', [AuthController::class, 'register'])
    ->name('register.store');

// Login
Route::get('/login', [AuthController::class, 'showLogin'])
    ->name('login');

Route::post('/login', [AuthController::class, 'login'])
    ->name('login.process');

// Logout
Route::post('/logout', [AuthController::class, 'logout'])
    ->middleware('auth')
    ->name('logout');

// Halaman khusus admin
Route::middleware(['auth', 'role:admin'])->group(function () {

    Route::get('/admin/dashboard', [AdminController::class, 'index'])
        ->name('admin.dashboard');

    // Menampilkan daftar produk
    Route::get('/admin/products', [ProductController::class, 'index'])
        ->name('admin.products.index');

    // Menampilkan formulir tambah produk
    Route::get('/admin/products/create', [ProductController::class, 'create'])
        ->name('admin.products.create');

    // Menyimpan produk
    Route::post('/admin/products', [ProductController::class, 'store'])
        ->name('admin.products.store');

    // Menampilkan formulir edit produk
    Route::get('/admin/products/{id}/edit', [ProductController::class, 'edit'])
        ->name('admin.products.edit');

    // Memperbarui produk
    Route::put('/admin/products/{id}', [ProductController::class, 'update'])
        ->name('admin.products.update');

    Route::delete('/admin/products/{id}', [ProductController::class, 'destroy'])
        ->name('admin.products.destroy');
});

// Halaman khusus customer
Route::middleware(['auth', 'role:customer'])->group(function () {

    Route::get('/customer/dashboard', function () {
        return view('customer.dashboard');
    })->name('customer.dashboard');

});
