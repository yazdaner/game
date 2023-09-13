<?php

namespace Yazdan\Coin\App\Providers;

use Yazdan\Coin\App\Policies\CoinPolicy;
use Yazdan\Coin\App\Models\Coin;
use Carbon\Laravel\ServiceProvider;
use Database\Seeders\DatabaseSeeder;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Route;
use Yazdan\Coin\Database\Seeders\CoinSeeder;
use Yazdan\RolePermissions\Repositories\PermissionRepository;

class CoinServiceProvider extends ServiceProvider
{
    public function register()
    {
        Route::middleware('web')->group(__DIR__ . '/../../Routes/coin_routes.php');
        $this->loadMigrationsFrom(__DIR__ . '/../../Database/migrations/');
        $this->loadViewsFrom(__DIR__ . '/../../Resources/views/', 'Coin');
        $this->loadJsonTranslationsFrom(__DIR__ . '/../../Resources/Lang/');
        DatabaseSeeder::$seeders[] = CoinSeeder::class;
        Gate::policy(Coin::class, CoinPolicy::class);
    }

    public function boot()
    {
        config()->set('sidebar.items.coin', [
            'icon' => 'i-coin',
            'url' => route('admin.coin.edit'),
            'title' => 'سکه',
            'permission' => PermissionRepository::PERMISSION_MANAGE_COIN,
        ]);

        config()->set('sidebarHome.items.coins', [
            'icon' => 'i-coin',
            'url' =>  route('user.coin.index'),
            'title' => 'سکه ها'
        ]);
    }
}
