<?php

use Illuminate\Support\Facades\Route;
use Yazdan\Coin\App\Http\Controllers\CoinController;
use Yazdan\Coin\App\Http\Controllers\Home\HomeCoinController;


Route::prefix('admin-panel')->name('admin.')->middleware([
    'auth',
    'verified'
])->group(function () {
    providerGetRoute('/coin',CoinController::class,'edit','coin.edit');
    Route::put("/coin/{coin}", [CoinController::class,'update'])->name("coin.update");
});


// Home Routes
Route::prefix('users')->name('user.')->middleware(['auth', 'verified'])->group(function () {

    providerGetRoute('/coin',HomeCoinController::class,'index','coin.index');

});
