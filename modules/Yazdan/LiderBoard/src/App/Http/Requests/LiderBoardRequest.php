<?php

namespace Yazdan\LiderBoard\App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LiderBoardRequest extends FormRequest
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
        return [
            'userKey' => 'required|max:200|exists:users,key',
            'score' => 'required|integer',
        ];
    }

    public function attributes()
    {
        return [
            "userKey" => "کد عضویت",
            "score" => "امتیاز",
        ];
    }
}
