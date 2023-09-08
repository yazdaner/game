<?php

namespace Yazdan\Game\App\Models;

use Yazdan\Game\App\Models\Game;
use Yazdan\User\App\Models\User;
use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    protected $table = 'groups';
    protected $fillable = [
        'title',
        'capacity',
        'game_id',
    ];

    public function game()
    {
        return $this->belongsTo(Game::class,'game_id');
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'group_user', 'group_id', 'user_id');
    }
}



