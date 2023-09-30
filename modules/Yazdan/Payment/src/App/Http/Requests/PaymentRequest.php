<?php

namespace Yazdan\Payment\App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Yazdan\Common\App\Rules\ValidJalaliDateSearch;

class PaymentRequest extends FormRequest
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
            'start_date' => ["nullable",new ValidJalaliDateSearch()],
            'end_date' => ["nullable",new ValidJalaliDateSearch()],
        ];
    }

}
