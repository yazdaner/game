<?php

namespace Yazdan\Front\App\Providers;

use Closure;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;
use Yazdan\Course\Repositories\CourseRepository;
use Yazdan\Category\Repositories\CategoryRepository;
use Yazdan\Coin\App\Models\Coin;

class FrontServiceProvider extends ServiceProvider
{
    public function register()
    {
        Route::middleware('web')
                ->group(__DIR__ . '/../../Routes/front_routes.php');

        $this->loadViewsFrom(__DIR__ . '/../../Resources/views/', 'Front');

        // view()->composer('Front::layouts.sections.header', function ($view) {
        //     $categories = CategoryRepository::tree();
        //     $view->with(compact('categories'));
        // });

          view()->composer('Front::sections.navbar', function ($view) {
            $coin = Coin::first();
            $view->with(compact('coin'));
        });
    }
}
