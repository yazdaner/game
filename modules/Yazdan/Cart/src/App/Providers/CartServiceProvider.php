<?php

namespace Yazdan\Cart\App\Providers;

use Carbon\Laravel\ServiceProvider;
use Illuminate\Support\Facades\Route;

class CartServiceProvider extends ServiceProvider
{

    public function register()
    {
        Route::middleware('web')->group(__DIR__ . '/../../Routes/cart_routes.php');
        $this->loadViewsFrom(__DIR__ . '/../../Resources/views/', 'Cart');
    }


}
