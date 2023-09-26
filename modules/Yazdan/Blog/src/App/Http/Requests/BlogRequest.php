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
        $rules = [
            'title' => ['required','string','max:255','unique:blogs,title'],
            'category_id' => ['required','exists:categories,id'],
            'preview' => ['required'],
            'content' => ['required'],
            'media' => 'required|mimes:png,jpg|max:2048',
        ];
        if (request()->method === 'PUT') {
            $rules['media'] = 'nullable|mimes:png,jpg|max:2048';
            $rules['title'] = 'required|min:3|unique:blogs,title,'.request()->route('blog');
        }
        return $rules;
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
