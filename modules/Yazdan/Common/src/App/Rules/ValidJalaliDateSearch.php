<?php

namespace Yazdan\Common\App\Rules;

use Illuminate\Contracts\Validation\Rule;
use Morilog\Jalali\Jalalian;

class ValidJalaliDateSearch implements Rule
{
    public function __construct()
    {
        //
    }

    public function passes($attribute, $value)
    {
        try{
            Jalalian::fromFormat("Y/m/d", $value)->toCarbon();
            return true;
        } catch (\Exception $exception){
            return false;
        }
    }

    public function message()
    {
        return 'یک تاریخ معتبر شمسی انتخاب کنید';
    }
}
