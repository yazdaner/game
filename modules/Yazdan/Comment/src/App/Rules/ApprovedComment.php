<?php

namespace Yazdan\Comment\App\Rules;

use Illuminate\Contracts\Validation\Rule;
use Yazdan\Comment\Repositories\CommentRepository;

class ApprovedComment implements Rule
{
    public function __construct()
    {
        //
    }

    public function passes($attribute, $value)
    {
        return ! is_null(CommentRepository::findApproved($value));
    }

    public function message()
    {
        return 'The validation error message.';
    }
}
