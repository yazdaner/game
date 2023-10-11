<?php

namespace Yazdan\LiderBoard\Repositories;

use Yazdan\User\App\Models\User;
use Yazdan\LiderBoard\App\Models\LiderBoard;

class LiderBoardRepository
{
    public static function getAll()
    {
        return LiderBoard::all();
    }

    public static function getAllPaginate($value)
    {
        return LiderBoard::latest()->paginate($value);
    }

    public static function create($value)
    {
        return LiderBoard::create([
            'user_id' => User::where('key',$value->userKey)->first()->id,
            'score' => $value->score,
        ]);
    }

    public static function findById($id)
    {
        return LiderBoard::find($id);
    }


    public static function getAllExceptById($id)
    {
        return self::getAll()->filter(function($item) use ($id){
            return $item->id != $id;
        });
    }

    public static function updating($LiderBoardId,$value)
    {
        return LiderBoard::whereId($LiderBoardId)->update([
            'user_id' => User::where('key',$value->userKey)->first()->id,
            'score' => $value->score,
        ]);
    }

    public static function delete($LiderBoardId)
    {
        return LiderBoard::whereId($LiderBoardId)->delete();
    }

}
