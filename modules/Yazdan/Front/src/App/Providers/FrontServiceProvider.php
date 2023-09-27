<?php

namespace Yazdan\Front\App\Providers;

use Closure;
use Yazdan\Coin\App\Models\Coin;
use Illuminate\Support\Facades\View;
use Yazdan\Coupon\App\Models\Coupon;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;
use Yazdan\Blog\App\Models\Blog;
use Yazdan\Course\Repositories\CourseRepository;
use Yazdan\Category\Repositories\CategoryRepository;

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

        view()->composer('Front::sections.products', function ($view) {
            $coupons = Coupon::latest()->paginate();
            $view->with(compact('coupons'));
        });

        view()->composer('Front::sections.blog', function ($view) {
            $blogs = Blog::latest()->get()->take(5);
            $view->with(compact('blogs'));
        });
    }
}
