<?php

namespace Yazdan\Game\Repositories;

use Yazdan\Game\App\Models\Group;


class GroupRepository
{

    public static function findById($id)
    {
        return Group::find($id);
    }

    public static function store($data, $gameId)
    {
        return Group::create([
            'title' => $data->title,
            'capacity' => $data->capacity,
            'game_id' => $gameId,
        ]);
    }

    public static function update($data,$id)
    {
        $group = static::findById($id);

        return $group->update([
            'title' => $data->title,
            'capacity' => $data->capacity,
        ]);
    }


}
