<?php

namespace Yazdan\LiderBoard\App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;
use Yazdan\LiderBoard\App\Models\LiderBoard;
use Yazdan\LiderBoard\App\Policies\LiderBoardPolicy;
use Yazdan\RolePermissions\Repositories\PermissionRepository;

class LiderBoardServiceProvider extends ServiceProvider
{

    public function register()
    {
        Route::middleware('web')
            ->group(__DIR__ . '/../../Routes/LiderBoard_routes.php');
        $this->loadViewsFrom(__DIR__ . '/../../Resources/views/', 'LiderBoard');
        $this->loadMigrationsFrom(__DIR__ . '/../../Database/migrations/');

        Gate::policy(LiderBoard::class, LiderBoardPolicy::class);
    }

    public function boot()
    {
        $this->app->booted(function () {
            config()->set('sidebar.items.categories', [
                'icon' => 'i-categories',
                'url' => route('admin.categories.index'),
                'title' => 'دسته بندی',
                'permission' => PermissionRepository::PERMISSION_MANAGE_LIDER_BOARD,
            ]);
        });
    }
}
