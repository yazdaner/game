<?php

use Illuminate\Support\Facades\Route;
use Yazdan\Front\App\Http\Controllers\FrontController;

Route::get('/', [FrontController::class, 'index']);
