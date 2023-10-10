<?php

namespace Yazdan\LiderBoard\App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LiderBoard extends Model
{
    use HasFactory;

    protected $table = 'liderBoards';
    protected $fillable = [
        'title',
        'slug',
        'parent_id'
    ];

    public function getParentAttribute()
    {
        return !($this->parent_id) ? 'ندارد' : $this->parentLiderBoard->title;
    }

    public function parentLiderBoard()
    {
        return $this->belongsTo(LiderBoard::class,'parent_id');
    }

    public function subLiderBoard()
    {
        return $this->hasMany(LiderBoard::class,'parent_id');
    }

}

