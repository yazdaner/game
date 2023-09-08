<?php

use Illuminate\Support\Facades\Route;
use Yazdan\Home\App\Http\Controllers\HomeController;

Route::group([
    'middleware' => [
        'auth',
        'verified'
    ],
],function(){

    Route::get('/home',[HomeController::class,'index'])->name('home');

});
