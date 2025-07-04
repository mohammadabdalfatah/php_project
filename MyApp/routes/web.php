<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\FrontProductController;
use App\Http\Controllers\FrontHomeController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;


Route::get('/', [FrontHomeController::class, 'index'])->name('home');

Route::get('/products', [FrontProductController::class, 'index'])->name('front.products.index');
Route::get('/products/{id}', [FrontProductController::class, 'show'])->name('front.products.show');

// Dashboard للمستخدم المسجل
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// ملفات البروفايل
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
    Route::delete('/cart/{id}', [CartController::class, 'destroy'])->name('cart.destroy');
     Route::post('/cart', [CartController::class, 'store'])->name('cart.store');
    Route::put('/cart/{id}', [CartController::class, 'update'])->name('cart.update');
    Route::get('/checkout', [OrderController::class, 'checkout'])->name('checkout.index');
    Route::post('/checkout/place', [OrderController::class, 'placeOrder'])->name('checkout.place');
    Route::post('/checkout', [CheckoutController::class, 'store'])->name('checkout.store');
     Route::get('/orders', [OrderController::class, 'index'])->name('orders.index');
     Route::get('/orders/{order}', [OrderController::class, 'show'])->name('orders.show');

});

// لوحة تحكم المشرف
Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'index'])->name('dashboard');
    Route::resource('/products', ProductController::class);
    
    Route::get('/orders', [OrderController::class, 'adminIndex'])->name('orders.index');

    Route::get('/users', [AdminController::class, 'users'])->name('users.index');
});




require __DIR__.'/auth.php';
