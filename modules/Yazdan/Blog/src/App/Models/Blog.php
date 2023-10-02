<?php

namespace Yazdan\Blog\App\Models;

use;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Yazdan\Category\App\Models\Category;
use Yazdan\Media\App\Models\Media;
use Yazdan\User\App\Models\User;

Yazdan\Comment\Trait\HasComments;

class Blog extends Model
{
    use HasFactory,HasComments;

    protected $table = 'blogs';
    protected $guarded = [];

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

    public function media()
    {
        return $this->belongsTo(Media::class, 'media_id');
    }

    public function getAvatar($size = 'original')
    {
        if (isset($this->media_id)) {
            return $this->media->thumb($size);
        } else {
            return asset('img/profile.jpg');
        }
    }
}

