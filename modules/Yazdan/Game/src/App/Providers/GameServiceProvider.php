<?php

namespace Yazdan\Game\App\Providers;

use Carbon\Laravel\ServiceProvider;
use Illuminate\Support\Facades\Route;
use Yazdan\Game\Repositories\GameRepository;
use Yazdan\RolePermissions\Repositories\PermissionRepository;

class GameServiceProvider extends ServiceProvider
{

    public function register()
    {
        Route::middleware('web')->group(__DIR__ . '/../../Routes/game_routes.php');
        Route::middleware('web')->group(__DIR__ . '/../../Routes/group_routes.php');
        Route::middleware('web')->group(__DIR__ . '/../../Routes/level_routes.php');
        Route::middleware('web')->group(__DIR__ . '/../../Routes/record_routes.php');
        $this->loadMigrationsFrom(__DIR__ . '/../../Database/migrations/');
        $this->loadViewsFrom(__DIR__ . '/../../Resources/views/game', 'Game');
        $this->loadViewsFrom(__DIR__ . '/../../Resources/views/group', 'Group');
        $this->loadViewsFrom(__DIR__ . '/../../Resources/views/level', 'Level');
        $this->loadJsonTranslationsFrom(__DIR__ . '/../../Resources/Lang/');
    }



    public function boot()
    {
        config()->set('sidebar.items.game', [
            'icon' => 'i-games',
            'url' => route('admin.games.index'),
            'title' => 'بازی ها',
            'permission' => PermissionRepository::PERMISSION_MANAGE_USERS,
        ]);

        config()->set('sidebarHome.items.game', [
            'icon' => 'i-users',
            'url' => route('game.users.index'),
            'title' => 'بازی ها'
        ]);

        view()->composer('Front::sections.games', function ($view) {
            $games = GameRepository::getAll();
            $view->with(compact('games'));
        });
    }
}
