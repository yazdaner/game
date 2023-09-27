<?php

namespace Yazdan\Comment\App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Route;
use Yazdan\Comment\App\Models\Comment;
use Illuminate\Support\ServiceProvider;
use Yazdan\Comment\App\Policies\CommentPolicy;
use Yazdan\RolePermissions\Repositories\PermissionRepository;

class CommentServiceProvider extends ServiceProvider
{
    public function register()
    {
        Route::middleware('web')
        ->group(__DIR__ . '/../../Routes/comment_routes.php');
        $this->loadMigrationsFrom(__DIR__ . '/../../Database/migrations/');
        $this->loadViewsFrom(__DIR__ . '/../../Resources/views/', 'Comment');
        Gate::policy(Comment::class, CommentPolicy::class);
        $this->loadJsonTranslationsFrom(__DIR__ . "/../../Resources/Lang");
    }

    public function boot()
    {
        config()->set('sidebar.items.comments', [
            "icon" => "i-comments",
            "title" => "نظرات",
            "url" => route('admin.comments.index'),
            "permission" => PermissionRepository::PERMISSION_MANAGE_COMMENTS
        ]);
    }
}
