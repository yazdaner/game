<?php

use Illuminate\Support\Facades\Route;
use Yazdan\Cart\App\Http\Controllers\CartController;


Route::prefix('users')->name('users.')->middleware(['auth', 'verified'])->group(function () {


    Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
    Route::post('/add-to-cart', [CartController::class, 'add'])->name('cart.add');
    Route::get('/removeFromCart/{rowId}', [CartController::class, 'remove'])->name('cart.remove');
    Route::put('/cart', [CartController::class, 'update'])->name('cart.update');
    Route::get('/clearCart', [CartController::class, 'clear'])->name('cart.clear');
   
    Route::get('/buy', [CartController::class, 'buy'])->name('cart.buy');


});
