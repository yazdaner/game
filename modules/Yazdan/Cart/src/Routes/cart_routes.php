<?php

use Illuminate\Support\Facades\Route;
use Yazdan\Cart\App\Http\Controllers\CartController;


Route::prefix('users')->name('users.')->middleware(['auth', 'verified'])->group(function () {


    Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
    Route::post('/add-to-cart/{productModel}/{productId}', [CartController::class, 'add'])->name('cart.add');
    // Route::get('/remove-from-cart/{rowId}', [CartController::class, 'remove'])->name('cart.remove');
    // Route::put('/cart', [CartController::class, 'update'])->name('cart.update');
    // Route::get('/clear-cart', [CartController::class, 'clear'])->name('cart.clear');
    // Route::post('/check-coupon', [CartController::class, 'checkCoupon'])->name('coupons.check');
    // Route::get('/checkout', [CartController::class, 'checkout'])->name('orders.checkout');


});
