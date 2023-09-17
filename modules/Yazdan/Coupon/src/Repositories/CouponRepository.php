<?php
namespace Yazdan\Coupon\Repositories;

use Yazdan\Coupon\App\Models\Coupon;

class CouponRepository
{
    public static function findById($id)
    {
        return Coupon::find($id);
    }


    const FIRST_COUPON = [
        'title' => '1/1',
        'price' => 10000,
        'coefficient' => 1.1
    ];
    const SECOND_COUPON = [
        'title' => '1/3',
        'price' => 20000,
        'coefficient' => 1.3,
    ];
    const THIRD_COUPON = [
        'title' => '1/5',
        'price' => 30000,
        'coefficient' => 1.5,
    ];
    const FOURTH_COUPON = [
        'title' => '1/7',
        'price' => 40000,
        'coefficient' => 1.7,
    ];
    const FIFTH_COUPON = [
        'title' => '2',
        'price' => 50000,
        'coefficient' => 2,
    ];

    static $defaultCoupons = [
        self::FIRST_COUPON,
        self::SECOND_COUPON,
        self::THIRD_COUPON,
        self::FOURTH_COUPON,
        self::FIFTH_COUPON
    ];

    public static function update($id, $data)
    {
        $coin = static::findById($id);

        return $coin->update([
            'name' => $data['name'],
            'price' => $data['price'],
            'media_id' => $data['media_id'],
        ]);
    }
}
