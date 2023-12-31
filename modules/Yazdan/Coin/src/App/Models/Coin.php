<?php

namespace Yazdan\Coin\App\Models;

use Illuminate\Database\Eloquent\Model;
use Yazdan\Media\App\Models\Media;
use Yazdan\Payment\Traits\PaymentTrait;

class Coin extends Model
{
    use PaymentTrait;

    protected $table = 'coins';

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
            return asset('img/coin.png');
        }
    }
}
