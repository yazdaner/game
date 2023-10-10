<?php

namespace Yazdan\LiderBoard\Repositories;

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
            'title' => $value->title,
            'slug' => $value->slug,
            'parent_id' => $value->parent_id,
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
            'title' => $value->title,
            'slug' => $value->slug,
            'parent_id' => $value->parent_id,
        ]);
    }

    public static function delete($LiderBoardId)
    {
        return LiderBoard::whereId($LiderBoardId)->delete();
    }

    public static function tree()
    {
        return LiderBoard::where('parent_id',null)->with('subLiderBoard')->get();
    }
}
