<?php

namespace Yazdan\Coin\App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CoinRequest extends FormRequest
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
            'name' => 'required',
            'price' => 'required|integer',
            'media' => 'nullable|mimes:png,jpg|max:2048',
        ];

    }

    public function attributes()
    {
        return [
            "name" => "نام سکه",
            "price" => "قیمت هر سکه",
            "media" => "تصویر سکه",
        ];
    }
}
