<?php

use Illuminate\Support\Facades\Route;
use Yazdan\Game\App\Http\Controllers\Game\GameController;
use Yazdan\Game\App\Http\Controllers\Game\HomeGameController;


// Admin Routes
Route::prefix('admin-panel')->name('admin.')->middleware([
    'auth',
    'verified'
])->group(function () {

    Route::resource('games', GameController::class);
    Route::get('games/{game}/details',[GameController::class,'details'])->name('games.details');
    Route::get('games/{game}/records',[GameController::class,'records'])->name('games.records');


});


// Home Routes
Route::middleware(['auth', 'verified'])->group(function () {

    providerGetRoute('/users/game/',HomeGameController::class,'index','game.users.index');

});



// Front Routes

Route::get('/games',[HomeGameController::class,'games'])->name('games');
Route::get('/games/{game}',[HomeGameController::class,'show'])->name('games.show');
