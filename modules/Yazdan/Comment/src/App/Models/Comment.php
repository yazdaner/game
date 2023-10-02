<?php

namespace Yazdan\Comment\App\Models;

use Illuminate\Database\Eloquent\Model;
use Yazdan\Comment\Repositories\CommentRepository;
use Yazdan\User\App\Models\User;

class Comment extends Model
{

    protected $guarded = [];

    public function commentable()
    {
        return $this->morphTo();
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function comment()
    {
        return $this->belongsTo(Comment::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function notApprovedComments()
    {
        return $this->hasMany(Comment::class)->where("status", CommentRepository::STATUS_NEW);
    }

    public function getStatusCssClass()
    {
        if ($this->status == CommentRepository::STATUS_APPROVED) return "text-success";
        elseif ($this->status == CommentRepository::STATUS_REJECTED) return "text-error";
        return "text-warning";
    }

}
