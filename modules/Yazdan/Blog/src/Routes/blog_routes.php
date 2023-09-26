<?php

use Illuminate\Support\Facades\Route;
use Yazdan\Blog\App\Http\Controllers\BlogController;

Route::prefix('admin-panel')->name('admin.')->middleware([
    'auth',
    'verified'
])->group(function () {

    Route::resource('blogs', BlogController::class);

});
