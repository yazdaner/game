<?php

namespace Yazdan\LiderBoard\App\Models;

use Yazdan\User\App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class LiderBoard extends Model
{
    use HasFactory;

    protected $table = 'liderboards';
    protected $fillable = [
        'user_id',
        'score'
    ];


    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

}

