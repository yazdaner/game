<?php

use Illuminate\Support\Facades\Route;
use Yazdan\About\App\Http\Controllers\AboutController;


Route::prefix('admin-panel')->name('admin.')->middleware([
    'auth',
    'verified'
])->group(function () {
    providerGetRoute('/about',AboutController::class,'edit','about.edit');
    Route::put("/about/{about}", [AboutController::class,'update'])->name("about.update");
});

Route::get('/about', [AboutController::class, 'about'])->name('about');
