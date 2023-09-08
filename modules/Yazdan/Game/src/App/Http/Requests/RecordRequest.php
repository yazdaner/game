<?php

namespace Yazdan\Game\App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Yazdan\Game\App\Models\Level;

class RecordRequest extends FormRequest
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
            'level' => 'required|exists:levels,id',
            'claimRecord' => 'required|integer|min:'.Level::where('id',$this->level)->first()->minScore,
            'media' => 'required|mimes:png,jpg|max:2048',
        ];

        return $rules;

    }

    public function attributes()
    {
        return [
            "claimRecord" => "رکورد",
            "media" => "فایل سند",
        ];
    }
}
