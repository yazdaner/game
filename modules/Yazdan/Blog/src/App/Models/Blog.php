<?php

namespace Yazdan\Blog\App\Models;

use Yazdan\User\App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Yazdan\Category\App\Models\Category;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Blog extends Model
{
    use HasFactory;

    protected $table = 'blogs';
    protected $guarded = [];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    public function category()
    {
        return $this->belongsTo(Category::class,'category_id');
    }
    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }


    public function incrementReadCount() {
        $this->views++;
        return $this->save();
    }

}

