<?php

namespace Yazdan\Game\App\Models;

use Yazdan\User\App\Models\User;
use Yazdan\Game\App\Models\Level;
use Yazdan\Media\App\Models\Media;
use Illuminate\Database\Eloquent\Model;
use Yazdan\Coupon\App\Models\Coupon;
use Yazdan\Game\Repositories\RecordRepository;

class Record extends Model
{
    protected $table = 'records';

    protected $guarded = [];

    public function level()
    {
        return $this->belongsTo(Level::class, 'level_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function media()
    {
        return $this->belongsTo(Media::class, 'media_id');
    }

    public function coupon()
    {
        return $this->belongsTo(Coupon::class, 'coupon_id');
    }

    public function status()
    {
        switch ($this->status) {
            case RecordRepository::STATUS_ACCEPTED:
                return 'text-success';
                break;
            case RecordRepository::STATUS_REJECTED:
                return 'text-error';
                break;
            default:
                return '';
                break;
        }
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
