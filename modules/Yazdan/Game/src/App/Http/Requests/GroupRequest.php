<?php

namespace Yazdan\Game\App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GroupRequest extends FormRequest
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
            'title' => 'required|string',
            'capacity' => 'required|integer',
        ];

        return $rules;

    }

    public function attributes()
    {
        return [
            "capacity" => "ظرفیت",
        ];
    }
}
