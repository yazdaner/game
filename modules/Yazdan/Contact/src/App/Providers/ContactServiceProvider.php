<?php

namespace Yazdan\Contact\App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;
use Yazdan\Contact\App\Models\Contact;
use Yazdan\Contact\App\Policies\ContactPolicy;
use Yazdan\RolePermissions\Repositories\PermissionRepository;

class ContactServiceProvider extends ServiceProvider
{

    public function register()
    {
        Route::middleware('web')
            ->group(__DIR__ . '/../../Routes/contact_routes.php');
        $this->loadViewsFrom(__DIR__ . '/../../Resources/views/', 'Contact');
        $this->loadMigrationsFrom(__DIR__ . '/../../Database/migrations/');

        Gate::policy(Contact::class, ContactPolicy::class);
    }

    public function boot()
    {
        $this->app->booted(function () {
            config()->set('sidebar.items.contacts', [
                'icon' => 'i-contacts',
                'url' => route('admin.contacts.index'),
                'title' => 'تماس با ما',
                'permission' => PermissionRepository::PERMISSION_MANAGE_CONTACT,
            ]);
        });
    }
}
