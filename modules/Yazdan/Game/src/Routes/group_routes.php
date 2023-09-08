<?php

use Illuminate\Support\Facades\Route;
use Yazdan\Game\App\Http\Controllers\Group\GroupController;


// Admin Routes
Route::prefix('admin-panel')->name('admin.')->middleware([
    'auth',
    'verified'
])->group(function () {

    Route::post('groups/{game}/store',[GroupController::class,'store'])->name('groups.store');

    Route::delete('groups/{group}',[GroupController::class,'destroy'])->name('groups.destroy');
    Route::get('games/{group}/groups',[GroupController::class,'edit'])->name('groups.edit');
    Route::patch('groups/{group}',[GroupController::class,'update'])->name('groups.update');

});


// Home Routes
Route::middleware(['auth', 'verified'])->group(function () {

    Route::post('groups/{group}/subscribe',[GroupController::class,'subscribe'])->name('groups.subscribe');

});
