<?php

namespace Yazdan\Faq\Repositories;

use Yazdan\Faq\App\Models\Faq;

class FaqRepository
{
    public static function getAll()
    {
        return Faq::all();
    }

    public static function getAllPaginate($value)
    {
        return Faq::latest()->paginate($value);
    }

    public static function create($value)
    {
        return Faq::create([
            'question' => $value->question,
            'answer' => $value->answer
        ]);
    }

    public static function findById($id)
    {
        return Faq::find($id);
    }


    public static function getAllExceptById($id)
    {
        return self::getAll()->filter(function($item) use ($id){
            return $item->id != $id;
        });
    }

    public static function updating($FaqId,$value)
    {
        return Faq::whereId($FaqId)->update([
            'question' => $value->question,
            'answer' => $value->answer
        ]);
    }

    public static function delete($FaqId)
    {
        return Faq::whereId($FaqId)->delete();
    }
}
