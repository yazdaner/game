<?php

namespace Yazdan\Comment\Trait;

use Yazdan\Comment\App\Models\Comment;
use Illuminate\Database\Eloquent\Concerns\HasRelationships;
use Yazdan\Comment\Repositories\CommentRepository;

trait HasComments
{
    use HasRelationships;

    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable');
    }

    public function approvedComments()
    {
        return $this->morphMany(Comment::class, 'commentable')
            ->where("status", CommentRepository::STATUS_APPROVED)
            ->whereNull("comment_id")->with("comments");
    }
}
