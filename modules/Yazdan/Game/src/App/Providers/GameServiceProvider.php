<?php

namespace Yazdan\Game\App\Providers;

use Carbon\Laravel\ServiceProvider;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Route;
use Yazdan\Game\App\Models\Game;
use Yazdan\Game\App\Models\Group;
use Yazdan\Game\App\Models\Level;
use Yazdan\Game\App\Models\Record;
use Yazdan\Game\App\Policies\GamePolicy;
use Yazdan\Game\App\Policies\GroupPolicy;
use Yazdan\Game\App\Policies\LevelPolicy;
use Yazdan\Game\App\Policies\RecordPolicy;
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

        Gate::policy(Game::class, GamePolicy::class);
        Gate::policy(Group::class, GroupPolicy::class);
        Gate::policy(Level::class, LevelPolicy::class);
        Gate::policy(Record::class, RecordPolicy::class);

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
            'title' => 'ارسال رکورد'
        ]);
    }
}
