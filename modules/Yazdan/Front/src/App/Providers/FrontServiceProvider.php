<?php

namespace Yazdan\Front\App\Providers;

use Closure;
use Yazdan\Blog\App\Models\Blog;
use Yazdan\Coin\App\Models\Coin;
use Illuminate\Support\Facades\View;
use Yazdan\Coupon\App\Models\Coupon;
use Yazdan\Slider\App\Models\Slider;
use Illuminate\Support\Facades\Route;
use Yazdan\Setting\App\Models\Setting;
use Illuminate\Support\ServiceProvider;
use Yazdan\Game\Repositories\GameRepository;
use Yazdan\Course\Repositories\CourseRepository;
use Yazdan\Slider\Repositories\SliderRepository;
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

        view()->composer('Front::sections.CTA', function ($view) {
            $cta = Slider::where('type',SliderRepository::TYPE_CTA)->where('status',true)->orderBy('priority')->first();
            $view->with(compact('cta'));
        });

        view()->composer('Front::sections.mainBanner', function ($view) {
            $mainBanners = Slider::where('type',SliderRepository::TYPE_MAIN)->where('status',true)->orderBy('priority')->get();
            $view->with(compact('mainBanners'));
        });

        view()->composer(['Front::sections.footer','Front::sections.social','Contact::front.contact'], function ($view) {
            $setting = Setting::first();
            $view->with(compact('setting'));
        });

        view()->composer(['Front::sections.games'], function ($view) {
            $games = GameRepository::getAll();
            $view->with(compact('games'));
        });
    }
}
