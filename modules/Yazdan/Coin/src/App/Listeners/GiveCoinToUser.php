<?php

namespace Yazdan\Coin\App\Listeners;

use Yazdan\Coupon\App\Models\Coupon;
use Yazdan\User\App\Models\User;

class GiveCoinToUser
{

    public function __construct()
    {
        //
    }

    public function handle($event)
    {
        $user = User::find($event->payment->user_id);
        $quantity = $event->payment->quantity;

        if ($event->payment->paymentable_type == "Yazdan\Coin\App\Models\Coin") {
            $user->coin += $quantity;
            $user->save();
        }
        if ($event->payment->paymentable_type == "Yazdan\Coupon\App\Models\Coupon") {

            $coupon = Coupon::find($event->payment->paymentable_id);
            $couponOfUser = $user->coupons()->where('id', $coupon->id)->first();
            if ($couponOfUser) {
                $count = $couponOfUser->pivot->count;
                $count += $quantity;
                $user->coupons()->updateExistingPivot($coupon, [
                    'count' => $count
                ], false);
            } else {
                $user->coupons()->attach($coupon, [
                    'count' => $quantity
                ]);
            }
        }
    }
}
