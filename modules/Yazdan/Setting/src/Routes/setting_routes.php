<?php

use Illuminate\Support\Facades\Route;
use Yazdan\Setting\App\Http\Controllers\SettingController;


Route::prefix('admin-panel')->name('admin.')->middleware([
    'auth',
    'verified'
])->group(function () {
    providerGetRoute('/setting',SettingController::class,'edit','setting.edit');
    Route::put("/setting/{setting}", [SettingController::class,'update'])->name("setting.update");
});
