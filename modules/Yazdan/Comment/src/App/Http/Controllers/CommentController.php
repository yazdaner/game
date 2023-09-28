<?php

namespace Yazdan\Comment\App\Http\Controllers;

use App\Http\Controllers\Controller;
use Yazdan\Comment\App\Models\Comment;
use Yazdan\Common\Responses\AjaxResponses;
use Yazdan\Comment\Repositories\CommentRepository;
use Yazdan\Comment\App\Http\Requests\CommentRequest;
use Yazdan\RolePermissions\Repositories\PermissionRepository;

class CommentController extends Controller
{

    public function index(CommentRepository $repo)
    {
        $this->authorize('manage', Comment::class);
        $comments = $repo
            ->searchBody(request("body"))
            ->searchEmail(request("email"))
            ->searchName(request("name"))
            ->searchStatus(request("status"));

        if (!auth()->user()->hasAnyPermission(PermissionRepository::PERMISSION_MANAGE_COMMENTS, PermissionRepository::PERMISSION_SUPER_ADMIN)) {
            $comments->query->whereHasMorph("commentable", [Course::class] , function ($query) {
                return $query->where("teacher_id", auth()->id());
            })->where("status", CommentRepository::STATUS_APPROVED);
        }

        $comments = $comments->paginateParents();

        return view("Comment::index", compact("comments"));
    }

    public function store(CommentRequest $request, CommentRepository $repo)
    {
        $repo->store($request->all());
        newFeedbacks("عملیات موفقیت آمیز", "دیدگاه شما با ثبت گردید.");
        return back();
    }

    public function accept($id, CommentRepository $commentRepo)
    {
        $this->authorize('manage', Comment::class);
        if ($commentRepo->updateStatus($id, CommentRepository::STATUS_APPROVED)) {
            return AjaxResponses::SuccessResponses();
        }

        return AjaxResponses::ErrorResponses();
    }

    public function reject($id, CommentRepository $commentRepo)
    {
        $this->authorize('manage', Comment::class);
        if ($commentRepo->updateStatus($id, CommentRepository::STATUS_REJECTED)) {
            return AjaxResponses::SuccessResponses();
        }

        return AjaxResponses::ErrorResponses();
    }

    public function destroy($id, CommentRepository $repo)
    {
        $this->authorize('manage', Comment::class);
        $comment = $repo->findOrFail($id);
        $comment->delete();
        return AjaxResponses::SuccessResponses();
    }
}
