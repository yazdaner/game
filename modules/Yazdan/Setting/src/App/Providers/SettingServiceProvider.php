<?php

namespace Yazdan\Setting\App\Providers;

use Yazdan\Setting\App\Policies\SettingPolicy;
use Yazdan\Setting\App\Models\Setting;
use Carbon\Laravel\ServiceProvider;
use Database\Seeders\DatabaseSeeder;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Route;
use Yazdan\Setting\Database\Seeders\SettingSeeder;
use Yazdan\RolePermissions\Repositories\PermissionRepository;

class SettingServiceProvider extends ServiceProvider
{
    public function register()
    {
        Route::middleware('web')->group(__DIR__ . '/../../Routes/setting_routes.php');
        $this->loadMigrationsFrom(__DIR__ . '/../../Database/migrations/');
        $this->loadViewsFrom(__DIR__ . '/../../Resources/views/', 'Setting');
        $this->loadJsonTranslationsFrom(__DIR__ . '/../../Resources/Lang/');
        DatabaseSeeder::$seeders[] = SettingSeeder::class;
        Gate::policy(Setting::class, SettingPolicy::class);
    }

    public function boot()
    {
        config()->set('sidebar.items.setting', [
            'icon' => 'i-setting',
            'url' => route('admin.setting.edit'),
            'title' => 'تنظیمات',
            'permission' => PermissionRepository::PERMISSION_MANAGE_SETTING,
        ]);

    }
}
