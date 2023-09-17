<?php

namespace Yazdan\Cart\App\Http\Requests;

use Yazdan\Cart\App\Rules\ProductableRule;
use Illuminate\Foundation\Http\FormRequest;
use Cyaxaress\Comment\Rules\CommentableRule;

class CartRequest extends FormRequest
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
            "productable_id" => "required",
            "productable_type" => ["required", new ProductableRule()],
        ];
    }
}
