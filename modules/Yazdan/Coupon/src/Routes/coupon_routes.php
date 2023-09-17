<?php

use Illuminate\Support\Facades\Route;
use Yazdan\Coupon\App\Http\Controllers\CouponController;
use Yazdan\Coupon\App\Http\Controllers\Home\HomeCouponController;


Route::prefix('admin-panel')->name('admin.')->middleware([
    'auth',
    'verified'
])->group(function () {
    providerGetRoute('/coupon',CouponController::class,'edit','coupon.edit');
    Route::put("/coupon/{coupon}", [CouponController::class,'update'])->name("coupon.update");
});


// Home Routes
Route::prefix('users')->name('user.')->middleware(['auth', 'verified'])->group(function () {

    providerGetRoute('/users/coupon/',HomeCouponController::class,'index','coupon.index');

});
