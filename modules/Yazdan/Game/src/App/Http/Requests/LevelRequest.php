<?php

namespace Yazdan\Game\App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LevelRequest extends FormRequest
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
            'priority' => 'required|integer|max:255',
            "coin" => "nullable|integer",
            "coupons" => "nullable|array",
            'minScore' => 'required|integer',
        ];

        return $rules;

    }

    public function attributes()
    {
        return [
            "priority" => "سطح مرحله",
            "minScore" => "حداقل امتیاز",
            "coin" => "سکه",
            "coupons" => "کوپن",
        ];
    }
}
