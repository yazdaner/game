<?php

namespace Yazdan\Payment\App\Providers;

use Yazdan\Coin\App\Listeners\GiveCoinToUser;
use Yazdan\Payment\App\Events\PaymentWasSuccessful;
use Yazdan\Course\App\Listeners\RegisterUserInTheCourse;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{

    protected $listen = [
        PaymentWasSuccessful::class => [
            GiveCoinToUser::class,
        ]
    ];

    public function boot()
    {
        //
    }
}
