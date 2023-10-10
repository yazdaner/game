<?php

use Yazdan\User\App\Models\User;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
use Yazdan\Discount\App\Models\Discount;
use Yazdan\Game\App\Models\Game;
use Yazdan\Game\Repositories\RecordRepository;
use Yazdan\RolePermissions\Repositories\RoleRepository;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/d',function(){
    // get game
    $game = Game::first();
    // get last level of game
    $level = $game->levels->sortByDesc('priority')->first();
    dd($level->records->where('status',RecordRepository::STATUS_ACCEPTED)->sortByDesc('claimRecord'));
});
