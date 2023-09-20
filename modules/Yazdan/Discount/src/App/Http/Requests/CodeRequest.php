<?php

namespace Yazdan\Discount\App\Http\Requests;

use Yazdan\Discount\App\Rules\ValidJalaliDate;
use Illuminate\Foundation\Http\FormRequest;

class CodeRequest extends FormRequest
{

    public function authorize()
    {
        return auth()->check();
    }

    public function rules()
    {
        return [
            'code' => 'required'
        ];

    }

    public function attributes()
    {
        return [
            "code" => "کد تخفیف",
        ];
    }

}
