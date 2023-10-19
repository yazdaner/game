<?php

namespace Yazdan\User\App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Yazdan\User\App\Rules\ValidMobile;
use Yazdan\User\Repositories\UserRepository;

class UserRequest extends FormRequest
{

    public function authorize()
    {
        return auth()->check();
    }


    public function rules()
    {
        $rules = [
            'key' => ['required','unique:users,key'],
            'name' => ['nullable'],
            'email' => ['required','email','unique:users,email'],
            'username' => ['required','unique:users,username'],
            'mobile' => ['nullable','unique:users,mobile',new ValidMobile],
            'media' => ['nullable','image'],
            'password' => ['required'],
            'status' => ['nullable',Rule::in(UserRepository::$statuses)],
        ];
        if (request()->getMethod() == "PUT"){
            $rules["key"] = ['required','unique:users,key,'. request()->route('user')];
            $rules["email"] = ['required','email','unique:users,email,'. request()->route('user')];
            $rules["mobile"] = ['nullable',new ValidMobile,'unique:users,mobile,'. request()->route('user')];
            $rules["username"] =  ['required','unique:users,username,'. request()->route('user')];
            $rules["password"] =  ['nullable'];

        }
        return $rules;
    }

    public function attributes()
    {
        return [
            "key" => "کد عضویت",
            "status" => "وضعیت",
            "media" => "تصویر پروفایل",
            "mobile" => "شماره موبایل",
        ];
    }

}
