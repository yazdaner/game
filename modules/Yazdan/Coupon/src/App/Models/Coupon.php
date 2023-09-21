<?php

namespace Yazdan\Coupon\App\Models;

use Yazdan\Media\App\Models\Media;
use Yazdan\Payment\App\Models\Payment;
use Illuminate\Database\Eloquent\Model;
use Yazdan\Payment\Traits\PaymentTrait;
use Yazdan\Discount\App\Models\Discount;

class Coupon extends Model
{
    use PaymentTrait;

    protected $table = 'coupons';

    protected $guarded = [];

    public function media()
    {
        return $this->belongsTo(Media::class, 'media_id');
    }

    public function getAvatar($size = 'original')
    {
        if (isset($this->media_id)) {
            return $this->media->thumb($size);
        } else {
            return asset('img/coupon.png');
        }
    }

}
