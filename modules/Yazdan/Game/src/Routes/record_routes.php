<?php

use Illuminate\Support\Facades\Route;
use Yazdan\Game\App\Http\Controllers\Record\RecordController;

// Admin Routes
Route::prefix('admin-panel')->name('admin.')->middleware([
    'auth',
    'verified'
])->group(function () {

    Route::delete('records/{record}/delete',[RecordController::class,'destroy'])->name('records.destroy');
    Route::patch('records/{record}/accepted',[RecordController::class,'accepted'])->name('records.accepted');
    Route::patch('records/{record}/rejected',[RecordController::class,'rejected'])->name('records.rejected');

});


// Home Routes
Route::middleware(['auth', 'verified'])->group(function () {

    Route::get('users/game/{game}/level',[RecordController::class,'index'])->name('home.records.index');
    Route::post('users/game/record',[RecordController::class,'sendRecord'])->name('home.records.send');

});
