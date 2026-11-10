<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductDetailController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\AddressController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\AdminOrderController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ProductReviewController;
use App\Http\Controllers\StoreSettingController;
use App\Http\Controllers\AdminStockLogController;
use App\Http\Controllers\WishlistController;
use App\Http\Controllers\AdminVoucherController;
use App\Http\Controllers\AdminReportController;
use App\Http\Controllers\NotificationController;

// Halaman utama
Route::get('/', [HomeController::class, 'index'])->name('home');

// Detail produk
Route::get('/products/{id}', [ProductDetailController::class, 'show'])
    ->name('products.show');

// Register
Route::get('/register', [AuthController::class, 'showRegister'])
    ->name('register');

Route::post('/register', [AuthController::class, 'register'])
    ->name('register.store');

// Login
Route::get('/login', [AuthController::class, 'showLogin'])
    ->name('login');

// Menampilkan ulasan produk
Route::get(
    '/produk/{productId}/ulasan',
    [ProductReviewController::class, 'index']
)->name('products.reviews.index');

Route::post('/login', [AuthController::class, 'login'])
    ->name('login.process');

    // ==========================================
// NOTIFIKASI ADMIN, CUSTOMER, DAN GUEST
// ==========================================

Route::get('/notifications', [NotificationController::class, 'index'])
    ->name('notifications.index');

Route::get('/notifications/{id}/read', [NotificationController::class, 'read'])
    ->name('notifications.read');

Route::post('/notifications/read-all', [NotificationController::class, 'readAll'])
    ->name('notifications.read-all');


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
    
    // CRUD Kategori
    Route::get('/admin/categories', [CategoryController::class, 'index'])
        ->name('admin.categories.index');

    Route::get('/admin/categories/create', [CategoryController::class, 'create'])
        ->name('admin.categories.create');

    Route::post('/admin/categories', [CategoryController::class, 'store'])
        ->name('admin.categories.store');

    Route::get('/admin/categories/{id}/edit', [CategoryController::class, 'edit'])
        ->name('admin.categories.edit');

    Route::put('/admin/categories/{id}', [CategoryController::class, 'update'])
        ->name('admin.categories.update');

    Route::delete('/admin/categories/{id}', [CategoryController::class, 'destroy'])
        ->name('admin.categories.destroy');
    
    // Pengelolaan pesanan
    Route::get('/admin/orders', [AdminOrderController::class, 'index'])
        ->name('admin.orders.index');

    Route::get('/admin/orders/{id}', [AdminOrderController::class, 'show'])
        ->name('admin.orders.show');

    Route::patch('/admin/orders/{id}/approve', [AdminOrderController::class, 'approve'])
        ->name('admin.orders.approve');

    Route::patch('/admin/orders/{id}/reject', [AdminOrderController::class, 'reject'])
        ->name('admin.orders.reject');

    Route::patch('/admin/orders/{id}/ship', [AdminOrderController::class, 'ship'])
        ->name('admin.orders.ship');
    
    // PENGATURAN TOKO
    Route::get('/admin/settings', [StoreSettingController::class, 'edit'])
        ->name('admin.settings.edit');

    Route::put('/admin/settings', [StoreSettingController::class, 'update'])
        ->name('admin.settings.update');

    // Riwayat perubahan stok
    Route::get('/admin/stock-logs', [AdminStockLogController::class, 'index'])
        ->name('admin.stock-logs.index');

    // CRUD Voucher
    Route::get('/admin/vouchers', [AdminVoucherController::class, 'index'])
        ->name('admin.vouchers.index');

    Route::get('/admin/vouchers/create', [AdminVoucherController::class, 'create'])
        ->name('admin.vouchers.create');

    Route::post('/admin/vouchers', [AdminVoucherController::class, 'store'])
        ->name('admin.vouchers.store');

    Route::get('/admin/vouchers/{id}/edit', [AdminVoucherController::class, 'edit'])
        ->name('admin.vouchers.edit');

    Route::put('/admin/vouchers/{id}', [AdminVoucherController::class, 'update'])
        ->name('admin.vouchers.update');

    Route::delete('/admin/vouchers/{id}', [AdminVoucherController::class, 'destroy'])
        ->name('admin.vouchers.destroy');

    // Laporan Penjualan
    Route::get('/admin/reports', [AdminReportController::class, 'index'])
        ->name('admin.reports.index');

});

// Halaman khusus customer
Route::middleware(['auth', 'role:customer'])->group(function () {

    Route::get('/customer/dashboard', [HomeController::class, 'index'])
        ->name('customer.dashboard');

    // Keranjang Belanja
    Route::get('/cart', [CartController::class, 'index'])
        ->name('cart.index');

    Route::post('/cart', [CartController::class, 'store'])
        ->name('cart.store');

    Route::patch('/cart/{id}', [CartController::class, 'update'])
        ->name('cart.update');

    Route::delete('/cart/{id}', [CartController::class, 'destroy'])
        ->name('cart.destroy');

    // CRUD Alamat Customer
    Route::get('/customer/addresses', [AddressController::class, 'index'])
        ->name('customer.addresses.index');

    Route::get('/customer/addresses/create', [AddressController::class, 'create'])
        ->name('customer.addresses.create');

    Route::post('/customer/addresses', [AddressController::class, 'store'])
        ->name('customer.addresses.store');

    Route::get('/customer/addresses/{id}/edit', [AddressController::class, 'edit'])
        ->name('customer.addresses.edit');

    Route::put('/customer/addresses/{id}', [AddressController::class, 'update'])
        ->name('customer.addresses.update');

    Route::patch('/customer/addresses/{id}/primary', [AddressController::class, 'setPrimary'])
        ->name('customer.addresses.primary');

    Route::delete('/customer/addresses/{id}', [AddressController::class, 'destroy'])
        ->name('customer.addresses.destroy');

    // Checkout
    Route::get('/checkout', [CheckoutController::class, 'index'])
        ->name('checkout.index');

    Route::post('/checkout/buy-now', [CheckoutController::class, 'buyNow'])
        ->name('checkout.buyNow');

    Route::post('/checkout', [CheckoutController::class, 'store'])
        ->name('checkout.store');

    Route::get('/checkout/success/{id}', [CheckoutController::class, 'success'])
        ->name('checkout.success');

        // Pesanan pelanggan
    Route::get('/customer/orders', [PaymentController::class, 'index'])
        ->name('customer.orders.index');

    Route::get('/customer/orders/{id}', [PaymentController::class, 'show'])
        ->name('customer.orders.show');

    // Upload bukti pembayaran
    Route::post('/customer/orders/{id}/payment', [PaymentController::class, 'upload'])
        ->name('customer.orders.payment.upload');

    // Konfirmasi pesanan telah diterima
    Route::patch(
        '/customer/orders/{id}/received',
        [PaymentController::class, 'confirmReceived']
    )->name('customer.orders.received');

    // Menyimpan ulasan produk
    Route::post(
        '/customer/orders/{orderId}/reviews/{productId}',
        [ProductReviewController::class, 'store']
    )->name('customer.orders.reviews.store');

    // WISHLIST
    Route::get('/customer/wishlist', [WishlistController::class, 'index'])
        ->name('customer.wishlist.index');

    Route::post('/customer/wishlist/{productId}', [WishlistController::class, 'store'])
        ->name('customer.wishlist.store');

    Route::delete('/customer/wishlist/{productId}', [WishlistController::class, 'destroy'])
        ->name('customer.wishlist.destroy');

    // Penggunaan Voucher saat Checkout
    Route::post('/checkout/voucher', [CheckoutController::class, 'applyVoucher'])
        ->name('checkout.voucher.apply');

    Route::delete('/checkout/voucher', [CheckoutController::class, 'removeVoucher'])
        ->name('checkout.voucher.remove');


});
