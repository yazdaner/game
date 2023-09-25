<?php

namespace Yazdan\Game\App\Models;

use Yazdan\Game\App\Models\Game;
use Yazdan\User\App\Models\User;
use Yazdan\Coupon\App\Models\Coupon;
use Illuminate\Database\Eloquent\Model;

class Level extends Model
{
    protected $table = 'levels';
    protected $guarded = [];

    public function game()
    {
        return $this->belongsTo(Game::class,'game_id');
    }

    public function records()
    {
        return $this->hasMany(Record::class,'level_id');
    }

    public function coupons()
    {
        return $this->belongsToMany(Coupon::class,'coupon_level');
    }
}



