<?php

namespace Yazdan\Coupon\App\Providers;

use Carbon\Laravel\ServiceProvider;
use Database\Seeders\DatabaseSeeder;
use Illuminate\Support\Facades\Gate;
use Yazdan\Coupon\App\Models\Coupon;
use Illuminate\Support\Facades\Route;
use Yazdan\Coupon\App\Policies\CouponPolicy;
use Yazdan\Coupon\Database\Seeders\CouponSeeder;
use Yazdan\RolePermissions\Repositories\PermissionRepository;

class CouponServiceProvider extends ServiceProvider
{
    public function register()
    {
        Route::middleware('web')->group(__DIR__ . '/../../Routes/coupon_routes.php');
        $this->loadMigrationsFrom(__DIR__ . '/../../Database/migrations/');
        $this->loadViewsFrom(__DIR__ . '/../../Resources/views/', 'Coupon');
        $this->loadJsonTranslationsFrom(__DIR__ . '/../../Resources/Lang/');
        DatabaseSeeder::$seeders[] = CouponSeeder::class;
        Gate::policy(Coupon::class, CouponPolicy::class);
    }

    public function boot()
    {
        config()->set('sidebar.items.coupon', [
            'icon' => 'i-coupon',
            'url' => route('admin.coupons.index'),
            'title' => 'کوپن ها',
            'permission' => PermissionRepository::PERMISSION_MANAGE_COUPON,
        ]);
    }
}
