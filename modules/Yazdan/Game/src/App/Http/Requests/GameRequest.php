<?php

namespace Yazdan\Game\App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GameRequest extends FormRequest
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
            'title' => 'required|min:3|unique:games,title',
            'media' => 'required|mimes:png,jpg|max:2048',
            'description' => 'nullable|string',
            'deadline' => 'required',
        ];

        if (request()->method === 'PUT') {
            $rules['media'] = 'nullable|mimes:png,jpg|max:2048';
            $rules['title'] = 'required|min:3|unique:games,title,'.request()->route('game');
            $rules['deadline'] = 'nullable';

        }

        return $rules;

    }

    public function attributes()
    {
        return [
            "media" => "تصویر بازی",
            "deadline" => "تاریخ پایان بازی",
        ];
    }
}
