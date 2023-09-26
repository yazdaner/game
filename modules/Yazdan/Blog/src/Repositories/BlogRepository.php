<?php

namespace Yazdan\Blog\Repositories;

use Yazdan\Blog\App\Models\Blog;

class BlogRepository
{
    public static function getAll()
    {
        return Blog::all();
    }

    public static function getAllPaginate($value)
    {
        return Blog::latest()->paginate($value);
    }

    public static function create($value)
    {
        return Blog::create([
            'title' => $value->title,
            'slug' => $value->slug,
            'parent_id' => $value->parent_id,
        ]);
    }

    public static function findById($id)
    {
        return Blog::find($id);
    }


    public static function getAllExceptById($id)
    {
        return self::getAll()->filter(function($item) use ($id){
            return $item->id != $id;
        });
    }

    public static function updating($blogId,$value)
    {
        return Blog::whereId($blogId)->update([
            'title' => $value->title,
            'slug' => $value->slug,
            'parent_id' => $value->parent_id,
        ]);
    }

    public static function delete($blogId)
    {
        return Blog::whereId($blogId)->delete();
    }

    public static function tree()
    {
        return Blog::where('parent_id',null)->with('subBlog')->get();
    }
}
