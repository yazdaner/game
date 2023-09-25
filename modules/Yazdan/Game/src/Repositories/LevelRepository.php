<?php

namespace Yazdan\Game\Repositories;

use Yazdan\Game\App\Models\Game;
use Yazdan\Game\App\Models\Group;
use Yazdan\Game\App\Models\Level;

class LevelRepository
{

    public static function findById($id)
    {
        return Level::find($id);
    }

    public static function GameLevelPaginate($gameId,$value)
    {
        return Level::where('game_id',$gameId)->latest()->paginate($value);
    }
    public static function store($data, $gameId)
    {
        $level = Level::create([
            'title' => $data->title,
            'priority' => $data->priority,
            'minScore' => $data->minScore,
            'coin' => $data->coin,
            'game_id' => $gameId,
        ]);

        if(isset($data['coupons'])) $level->coupons()->sync($data["coupons"]);
    }

    public static function update($data,$id)
    {
        $level = static::findById($id);
        $level->update([
            'title' => $data->title,
            'priority' => $data->priority,
            'minScore' => $data->minScore,
            'coin' => $data->coin,
        ]);
        $level->coupons()->sync($data["coupons"]);
    }


}
