<?php

namespace Yazdan\Game\App\Models;

use Illuminate\Database\Eloquent\Model;
use Yazdan\User\App\Models\User;

class Group extends Model
{
    protected $table = 'groups';

    protected $guarded = [];

    public function game()
    {
        return $this->belongsTo(Game::class,'game_id');
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'group_user', 'group_id', 'user_id');
    }
}



