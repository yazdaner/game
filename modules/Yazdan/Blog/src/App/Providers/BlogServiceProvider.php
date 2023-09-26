<?php

namespace Yazdan\Blog\App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;
use Yazdan\Blog\App\Models\Blog;
use Yazdan\Blog\App\Policies\BlogPolicy;
use Yazdan\RolePermissions\Repositories\PermissionRepository;

class BlogServiceProvider extends ServiceProvider
{

    public function register()
    {
        Route::middleware('web')
            ->group(__DIR__ . '/../../Routes/blog_routes.php');
        $this->loadViewsFrom(__DIR__ . '/../../Resources/views/', 'Blog');
        $this->loadMigrationsFrom(__DIR__ . '/../../Database/migrations/');

        Gate::policy(Blog::class, BlogPolicy::class);
    }

    public function boot()
    {
        $this->app->booted(function () {
            config()->set('sidebar.items.blogs', [
                'icon' => 'i-blogs',
                'url' => route('admin.blogs.index'),
                'title' => 'بلاگ',
                'permission' => PermissionRepository::PERMISSION_MANAGE_BLOG,
            ]);
        });
    }
}
