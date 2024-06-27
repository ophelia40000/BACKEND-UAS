<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\CarouselController;


Route::get('/', [CarouselController::class, 'index'])->name('home');

Route::get('/login', function () {
    return view('login');
})->name('login');

Route::get('/detail', function () {
    return view('detail');
})->name('detail');


Route::get('/product/{productId}', [ProductController::class, 'show'])->name('product.show');


Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/register', [RegisteredUserController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisteredUserController::class, 'register']);

Route::get('/produk', [ProductController::class, 'index'])->name('produk');
Route::get('/produk/search', [SearchController::class, 'search'])->name('produk.search');
Route::middleware('auth:sanctum')->group(function () {
    Route::get('/cart', [CartController::class, 'index'])->name('cart');
    Route::delete('/cart/remove/{cart}', [CartController::class, 'remove'])->name('cart.remove');
    Route::get('/checkout', [CartController::class, 'checkout'])->name('cart.checkout');
});


Route::post('/cart/add/{productId}', [CartController::class, 'addToCart'])->name('cart.add');

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('/admin/users', [AdminController::class, 'showAllUsers'])->name('admin.users');
    Route::delete('/admin/user/delete/{id}', [AdminController::class, 'deleteUser'])->name('admin.user.delete');
    Route::get('/admin/products', [AdminController::class, 'index'])->name('admin.produk');
    Route::post('/admin/products', [AdminController::class, 'store'])->name('admin.products.store');
    Route::post('/admin/products/edit/{id}', [AdminController::class, 'update'])->name('admin.products.update');
    Route::delete('/admin/products/{id}', [AdminController::class, 'destroy'])->name('admin.products.destroy');
    Route::get('/admin/orders', [AdminController::class, 'showOrders'])->name('admin.orders');
    Route::post('/orders/{orderId}/approve', [AdminController::class, 'approveOrder'])->name('admin.orders.approve');
    Route::post('/orders/{orderId}/reject', [AdminController::class, 'rejectOrder'])->name('admin.orders.reject');

    // Routes for carousel management
    Route::get('/admin/carousel', [AdminController::class, 'showCarouselItems'])->name('admin.carousel');
    Route::post('/admin/carousel', [AdminController::class, 'storeCarouselItem'])->name('admin.carousel.store');
    Route::post('/admin/carousel/edit/{id}', [AdminController::class, 'updateCarouselItem'])->name('admin.carousel.update');
    Route::delete('/admin/carousel/{id}', [AdminController::class, 'deleteCarouselItem'])->name('admin.carousel.destroy');
});
Route::get('/profil', [ProfilController::class, 'index'])->name('profil');
require __DIR__.'/auth.php';

Route::post('/payment', [PaymentController::class, 'processPayment'])->name('payments.payment');

Route::get('/success', [PaymentController::class, 'checkout'])->name('payments/success');

Route::get('/balik', [PaymentController::class, 'home'])->name('balik');


Route::get('/success', function () {
    return view('payments/success');
})->name('payments/success');

Route::get('/cancel', function () {
    return view('payments/cancel');
})->name('payments/cancel');
