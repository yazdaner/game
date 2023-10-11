<?php

namespace Yazdan\Faq\App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;
use Yazdan\Faq\App\Models\Faq;
use Yazdan\Faq\App\Policies\FaqPolicy;
use Yazdan\RolePermissions\Repositories\PermissionRepository;

class FaqServiceProvider extends ServiceProvider
{

    public function register()
    {
        Route::middleware('web')
            ->group(__DIR__ . '/../../Routes/faq_routes.php');
        $this->loadViewsFrom(__DIR__ . '/../../Resources/views/', 'Faq');
        $this->loadMigrationsFrom(__DIR__ . '/../../Database/migrations/');

        Gate::policy(Faq::class, FaqPolicy::class);
    }

    public function boot()
    {
        $this->app->booted(function () {
            config()->set('sidebar.items.faqs', [
                'icon' => 'i-faqs',
                'url' => route('admin.faqs.index'),
                'title' => 'سوالات متداول',
                'permission' => PermissionRepository::PERMISSION_MANAGE_FAQ,
            ]);
        });
    }
}
