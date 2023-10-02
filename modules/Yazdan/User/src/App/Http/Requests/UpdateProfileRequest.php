<?php

namespace Yazdan\User\App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Yazdan\User\App\Rules\ValidMobile;

class UpdateProfileRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rules = [
            'name' => ['required','min:3','max:190'],
            'username' => ['nullable','min:3','max:190','unique:users,username,'.auth()->id()],
            'mobile' => ['nullable',new ValidMobile,'unique:users,mobile,'.auth()->id()],
        ];

        return $rules;

    }

}
