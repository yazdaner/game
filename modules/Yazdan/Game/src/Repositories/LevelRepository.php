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
        return Level::create([
            'title' => $data->title,
            'priority' => $data->priority,
            'minScore' => $data->minScore,
            'game_id' => $gameId,
        ]);
    }

    public static function update($data,$id)
    {
        $level = static::findById($id);

        return $level->update([
            'title' => $data->title,
            'priority' => $data->priority,
            'minScore' => $data->minScore,
        ]);
    }


}
