<?php

use Illuminate\Support\Facades\Route;
use Yazdan\Regulation\App\Http\Controllers\RegulationController;


Route::prefix('admin-panel')->name('admin.')->middleware([
    'auth',
    'verified'
])->group(function () {
    providerGetRoute('/regulation',RegulationController::class,'edit','regulation.edit');
    Route::put("/regulation/{regulation}", [RegulationController::class,'update'])->name("regulation.update");
});

Route::get('/regulation', [RegulationController::class, 'regulation'])->name('regulation');
