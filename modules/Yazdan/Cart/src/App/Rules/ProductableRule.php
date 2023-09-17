<?php
namespace Yazdan\Cart\App\Rules;

use Illuminate\Contracts\Validation\Rule;

class ProductableRule implements Rule
{
    public function __construct()
    {
        //
    }

    public function passes($attribute, $value)
    {
        $value = \Crypt::decrypt($value);
        return class_exists($value) && method_exists($value, "payments");
    }

    public function message()
    {
        return 'The validation error message.';
    }
}

