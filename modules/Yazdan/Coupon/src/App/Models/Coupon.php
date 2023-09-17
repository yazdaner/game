<?php

namespace Yazdan\Coupon\App\Models;

use Yazdan\Media\App\Models\Media;
use Yazdan\Payment\App\Models\Payment;
use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
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

    public function payments()
    {
        return $this->morphMany(Payment::class, "paymentable");
    }
}
