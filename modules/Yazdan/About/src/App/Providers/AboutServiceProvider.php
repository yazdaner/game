<?php

namespace Yazdan\About\App\Providers;

use Yazdan\About\App\Policies\AboutPolicy;
use Yazdan\About\App\Models\About;
use Carbon\Laravel\ServiceProvider;
use Database\Seeders\DatabaseSeeder;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Route;
use Yazdan\About\Database\Seeders\AboutSeeder;
use Yazdan\RolePermissions\Repositories\PermissionRepository;

class AboutServiceProvider extends ServiceProvider
{
    public function register()
    {
        Route::middleware('web')->group(__DIR__ . '/../../Routes/about_routes.php');
        $this->loadMigrationsFrom(__DIR__ . '/../../Database/migrations/');
        $this->loadViewsFrom(__DIR__ . '/../../Resources/views/', 'About');
        $this->loadJsonTranslationsFrom(__DIR__ . '/../../Resources/Lang/');
        DatabaseSeeder::$seeders[] = AboutSeeder::class;
        Gate::policy(About::class, AboutPolicy::class);
    }

    public function boot()
    {
        config()->set('sidebar.items.about', [
            'icon' => 'i-about',
            'url' => route('admin.about.edit'),
            'title' => 'درباره ما',
            'permission' => PermissionRepository::PERMISSION_MANAGE_ABOUT,
        ]);

    }
}
