<?php

use Illuminate\Support\Facades\Route;
use Yazdan\Coupon\App\Http\Controllers\CouponController;
use Yazdan\Coupon\App\Http\Controllers\Home\HomeCouponController;


Route::prefix('admin-panel')->name('admin.')->middleware([
    'auth',
    'verified'
])->group(function () {
    providerGetRoute('/coupon',CouponController::class,'index','coupons.index');
    Route::post("/coupon", [CouponController::class,'store'])->name("coupons.store");
    Route::get("/coupon/{coupon}", [CouponController::class,'edit'])->name("coupons.edit");
    Route::put("/coupon/{coupon}", [CouponController::class,'update'])->name("coupons.update");
    Route::delete("/coupon/{coupon}", [CouponController::class,'destroy'])->name("coupons.destroy");
});



// Home Routes
Route::prefix('users')->name('user.')->middleware(['auth', 'verified'])->group(function () {

    providerGetRoute('/users/coupons/',HomeCouponController::class,'assetCoupon','coupons.index');

});



// Front Routes
Route::get("/coupons", [HomeCouponController::class,'index'])->name("coupons.index");


