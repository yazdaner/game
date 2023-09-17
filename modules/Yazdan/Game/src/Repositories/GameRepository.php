<?php

namespace Yazdan\Game\Repositories;

use Yazdan\Game\App\Models\Game;


class GameRepository
{

    public static function findById($id)
    {
        return Game::find($id);
    }

    public static function getAll()
    {
        return Game::latest()->paginate(20);
    }

    public static function store($values)
    {
        return Game::create([
            'title' => $values->title,
            'description' => $values->description,
            'media_id' => $values->media_id,
            //todo bug unix time
            'deadline' => $values->deadline,
        ]);
    }

    public static function update($id, $values)
    {
        $game = static::findById($id);

        return $game->update([
            'title' => $values->title,
            'description' => $values->description,
            'media_id' => $values->media_id,
            //todo bug unix time
            'deadline' => $values->deadline ? ($values->deadline) : $game->deadline,
        ]);
    }
}
