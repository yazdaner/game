<?php

namespace Yazdan\Payment\App\Providers;

use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Yazdan\Coin\App\Listeners\GiveCoinToUser;
use Yazdan\Payment\App\Events\PaymentWasSuccessful;

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
