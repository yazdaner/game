<?php

use Illuminate\Support\Facades\Route;
use Yazdan\Game\App\Http\Controllers\Level\LevelController;

// Admin Routes
Route::prefix('admin-panel')->name('admin.')->middleware([
    'auth',
    'verified'
])->group(function () {
    Route::get('/games/{game}/levels/',[LevelController::class,'create'])->name('levels.create');
    Route::post('/games/{game}/levels/',[LevelController::class,'store'])->name('levels.store');

    Route::delete('levels/{level}/delete',[LevelController::class,'destroy'])->name('levels.destroy');

    Route::get('games/levels/{level}/edit',[LevelController::class,'edit'])->name('levels.edit');
    Route::put('games/levels/{level}/update',[LevelController::class,'update'])->name('levels.update');

});


