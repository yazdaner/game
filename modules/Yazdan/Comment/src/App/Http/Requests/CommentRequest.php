<?php

namespace Yazdan\Comment\App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Yazdan\Comment\App\Rules\ApprovedComment;
use Yazdan\Comment\App\Rules\CommentableRule;

class CommentRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        //todo
        return [
            "body" => "required",
            "commentable_id" => "required",
            "comment_id" => ["nullable", new ApprovedComment()],
            "commentable_type" => ["required", new CommentableRule()],
        ];
    }
}
