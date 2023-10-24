<?php

namespace Yazdan\Slider\App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;
use Yazdan\RolePermissions\Repositories\PermissionRepository;
use Yazdan\Slider\App\Models\Slider;
use Yazdan\Slider\App\Policies\SliderPolicy;

class SliderServiceProvider extends ServiceProvider
{

    public function register()
    {
        Route::middleware('web')
            ->group(__DIR__ . '/../../Routes/slider_routes.php');
        $this->loadViewsFrom(__DIR__ . '/../../Resources/views/', 'Slider');
        $this->loadMigrationsFrom(__DIR__ . '/../../Database/migrations/');
        $this->loadJsonTranslationsFrom(__DIR__ . '/../../Resources/Lang/');

        Gate::policy(Slider::class, SliderPolicy::class);
    }

    public function boot()
    {
        $this->app->booted(function () {
            config()->set('sidebar.items.sliders', [
                'icon' => 'i-sliders',
                'url' => route('admin.sliders.index'),
                'title' => 'اسلایدر',
                'permission' => PermissionRepository::PERMISSION_MANAGE_SLIDER,
            ]);
        });
    }
}
