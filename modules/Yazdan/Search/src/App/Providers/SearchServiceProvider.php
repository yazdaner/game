<?php

namespace Yazdan\Search\App\Providers;

use Carbon\Laravel\ServiceProvider;
use Illuminate\Support\Facades\Route;

class SearchServiceProvider extends ServiceProvider
{
    public function register()
    {
        Route::middleware('web')->group(__DIR__ . '/../../Routes/search_routes.php');
        $this->loadViewsFrom(__DIR__ . '/../../Resources/views/', 'Search');
    }
}
