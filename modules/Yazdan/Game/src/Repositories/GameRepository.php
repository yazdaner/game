<?php

namespace Yazdan\Game\Repositories;

use Morilog\Jalali\Jalalian;
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

    public static function store($data)
    {
        return Game::create([
            'title' => $data->title,
            'description' => $data->description,
            'media_id' => $data->media_id,
            "deadline" => $data->deadline ? Jalalian::fromFormat("Y/m/d H:i", $data->deadline)->toCarbon() : null,
        ]);
    }

    public static function update($id, $data)
    {
        $game = static::findById($id);

        return $game->update([
            'title' => $data->title,
            'description' => $data->description,
            'media_id' => $data->media_id,
            "deadline" => $data->deadline ? Jalalian::fromFormat("Y/m/d H:i", $data->deadline)->toCarbon() : null,
        ]);
    }
}
