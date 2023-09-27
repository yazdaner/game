<?php

namespace Yazdan\Comment\Providers;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Route;
use Yazdan\App\Comment\Models\Comment;
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
    }

    public function boot()
    {
        config()->set('sidebar.items.comments', [
            "icon" => "i-comments",
            "title" => "نظرات",
            "url" => route('comments.index'),
            "permission" => PermissionRepository::PERMISSION_MANAGE_COMMENTS
        ]);
    }
}
