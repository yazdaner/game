<?php

namespace Yazdan\Blog\App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BlogRequest extends FormRequest
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
            'title' => ['required','string','max:255','unique:blogs,title'],
            'category_id' => ['required','exists:categories,id'],
            'preview' => ['required'],
            'content' => ['required'],
            'media' => 'required|mimes:png,jpg|max:2048',
        ];
    }

    public function attributes()
    {
        return [
            "title" => "عنوان",
            "category_id" => "دسته بندی",
            "preview" => "متن پیش نمایش",
            "content" => "محتوا",
            "media" => "بنر",
        ];
    }
}
