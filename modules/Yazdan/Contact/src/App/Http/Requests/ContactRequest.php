<?php

namespace Yazdan\Contact\App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Yazdan\User\App\Rules\ValidMobile;

class ContactRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            "name" => "required|string",
            "email" => "required|email",
            "phone" => ['required',new ValidMobile],
            "msg" => "required|string"
        ];
    }
}
