<?php

namespace Yazdan\Coupon\Database\Seeders;

use Illuminate\Database\Seeder;
use Yazdan\Coupon\App\Models\Coupon;
use Yazdan\Coupon\Repositories\CouponRepository;

class CouponSeeder extends Seeder
{

    public function run()
    {

        foreach(CouponRepository::$defaultCoupons as $coupon){

            Coupon::firstOrCreate(['title' => $coupon['title']],
            [
                'title' => $coupon['title'],
                'price' => $coupon['price'],
                'coefficient' => $coupon['coefficient'],
            ]);

        }

    }
}
