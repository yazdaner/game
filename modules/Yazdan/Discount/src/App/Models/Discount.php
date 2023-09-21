<?php
namespace Yazdan\Discount\App\Models;

use Yazdan\Coin\App\Models\Coin;
use Yazdan\Coupon\App\Models\Coupon;
use Yazdan\Payment\App\Models\Payment;
use Illuminate\Database\Eloquent\Model;

class Discount extends Model
{
    protected $table = 'discounts';
    protected $guarded = [];
    protected $casts = [
        "expire_at" => "datetime"
    ];


    public function coupons()
    {
        return $this->morphedByMany(Coupon::class, "discountable");
    }


    public function coins()
    {
        return $this->morphedByMany(Coin::class, "discountable");
    }

    public function payments()
    {
        return $this->belongsToMany(Payment::class, "discount_payment");
    }
}
