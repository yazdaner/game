<?php

namespace Yazdan\Blog\Repositories;

use Illuminate\Support\Str;
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
            'user_id' => auth()->id(),
            'title' => $value->title,
            'slug' => Str::slug($value->title),
            'category_id' => $value->category_id,
            'media_id' => $value->media_id,
            'preview' => $value->preview,
            'content' => $value->content,
        ]);
    }

    public static function findById($id)
    {
        return Blog::find($id);
    }

    public static function getAllExceptById($id)
    {
        return self::getAll()->filter(function ($item) use ($id) {
            return $item->id != $id;
        });
    }

    public static function updating($blogId, $value)
    {
        return Blog::whereId($blogId)->update([
            'title' => $value->title,
            'slug' => Str::slug($value->title),
            'category_id' => $value->category_id,
            'media_id' => $value->media_id,
            'preview' => $value->preview,
            'content' => $value->content,
        ]);
    }

    public static function delete($blogId)
    {
        return Blog::whereId($blogId)->delete();
    }

}
