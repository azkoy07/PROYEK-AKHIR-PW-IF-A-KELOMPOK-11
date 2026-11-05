<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;

// Halaman utama
Route::get('/', [HomeController::class, 'index'])->name('home');

// Halaman Register
Route::get('/register', [AuthController::class, 'showRegister'])
    ->name('register');

Route::post('/register', [AuthController::class, 'register'])
    ->name('register.store');

// Halaman Login
Route::get('/login', [AuthController::class, 'showLogin'])
    ->name('login');

Route::post('/login', [AuthController::class, 'login'])
    ->name('login.process');

// Logout hanya untuk pengguna yang sudah login
Route::post('/logout', [AuthController::class, 'logout'])
    ->middleware('auth')
    ->name('logout');

// Halaman sementara untuk admin
Route::get('/admin/dashboard', function () {
    $user = Auth::user();

    if ($user->role !== 'admin') {
        abort(403);
    }

    return view('admin.dashboard');
})->middleware('auth')->name('admin.dashboard');