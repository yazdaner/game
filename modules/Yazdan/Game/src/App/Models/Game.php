<?php

namespace Yazdan\Game\App\Models;

use Illuminate\Database\Eloquent\Model;
use Yazdan\Media\App\Models\Media;

class Game extends Model
{
    protected $table = 'games';
    protected $fillable = [
        'title',
        'description',
        'media_id',
        'deadline',
        'status'
    ];
    protected $casts = [
        "deadline" => "datetime"
    ];

    public function media()
    {
        return $this->belongsTo(Media::class, 'media_id');
    }

    public function groups()
    {
        return $this->hasMany(Group::class);
    }

    public function levels()
    {
        return $this->hasMany(Level::class);
    }

    public function records()
    {
        return $this->hasManyThrough(Record::class,Level::class);
    }
}



