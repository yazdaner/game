<?php

namespace Yazdan\Regulation\App\Providers;

use Carbon\Laravel\ServiceProvider;
use Database\Seeders\DatabaseSeeder;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Route;
use Yazdan\Regulation\App\Models\Regulation;
use Yazdan\Regulation\App\Policies\RegulationPolicy;
use Yazdan\Regulation\Database\Seeders\RegulationSeeder;
use Yazdan\RolePermissions\Repositories\PermissionRepository;

class RegulationServiceProvider extends ServiceProvider
{
    public function register()
    {
        Route::middleware('web')->group(__DIR__ . '/../../Routes/regulation_routes.php');
        $this->loadMigrationsFrom(__DIR__ . '/../../Database/migrations/');
        $this->loadViewsFrom(__DIR__ . '/../../Resources/views/', 'Regulation');
        $this->loadJsonTranslationsFrom(__DIR__ . '/../../Resources/Lang/');
        DatabaseSeeder::$seeders[] = RegulationSeeder::class;
        Gate::policy(Regulation::class, RegulationPolicy::class);
    }

    public function boot()
    {
        config()->set('sidebar.items.regulation', [
            'icon' => 'i-regulation',
            'url' => route('admin.regulation.edit'),
            'title' => 'شرایط و قوانین ',
            'permission' => PermissionRepository::PERMISSION_MANAGE_REGULATION,
        ]);

    }
}
