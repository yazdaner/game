<?php

use Illuminate\Support\Facades\Route;
use Yazdan\Slider\App\Http\Controllers\SliderController;

Route::prefix('admin-panel')->name('admin.')->middleware([
    'auth',
    'verified'
])->group(function () {

    Route::resource('sliders', SliderController::class)->except([
        'index'
    ]);
    providerGetRoute('/sliders',SliderController::class,'index','sliders.index');
});




