<?php

namespace Yazdan\Comment\Repositories;

use Yazdan\App\Comment\Models\Comment;
use Yazdan\RolePermissions\Repositories\PermissionRepository;

class CommentRepository
{
    const STATUS_NEW = "new";
    const STATUS_APPROVED = "approved";
    const STATUS_REJECTED = "rejected";

    static $statues = [
        self::STATUS_REJECTED,
        self::STATUS_APPROVED,
        self::STATUS_NEW
    ];

    // get discounts functions
    public static function find($id)
    {
        return Comment::query()->find($id);
    }

    public static function paginateAll()
    {
        return Comment::query()->latest()->paginate();
    }

    // DB functions
    public function store($data)
    {
        return Comment::query()->create([
            "user_id" => auth()->id(),
            "status" => auth()->user()->can(PermissionRepository::PERMISSION_MANAGE_COMMENTS)
                        ?
                        self::STATUS_APPROVED
                        :
                        self::STATUS_NEW,
            "comment_id" => array_key_exists("comment_id", $data) ? $data["comment_id"] : null,
            "body" => $data["body"],
            "commentable_id" => $data["commentable_id"],
            "commentable_type" => $data["commentable_type"],
        ]);
    }

    //

    public function findApproved($id)
    {
        return Comment::query()
            ->where("status", self::STATUS_APPROVED)
            ->where("id", $id)
            ->first();
    }

    public function findOrFail($id)
    {
        return Comment::query()->findOrFail($id);
    }

    public function paginateParents()
    {
        return Comment::query()->whereNull("comment_id")->withCount("notApprovedComments")->latest()->paginate();
    }

    public function updateStatus($id, string $status)
    {
        return Comment::query()->where("id", $id)->update([
            "status" => $status
        ]);
    }

}
