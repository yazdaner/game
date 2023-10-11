<?php

use Illuminate\Support\Facades\Route;
use Yazdan\LiderBoard\App\Http\Controllers\LiderBoardController;

Route::prefix('admin-panel')->name('admin.')->middleware([
    'auth',
    'verified'
])->group(function () {

    Route::resource('liderBoards', LiderBoardController::class)->except([
        'create', 'show'
    ]);
});

Route::get('/lider-boards',[LiderBoardController::class,'show'])->name('liderBoards');
