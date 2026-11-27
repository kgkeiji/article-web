<?php

namespace App\Laravel\Requests\Portal;

use App\Laravel\Requests\RequestManager;

class ArticleRequest extends RequestManager
{
    public function rules()
    {
        $rules = [
            'name' => "required|between:2,30|regex:/^[A-Za-z0-9'-. \s]+$/",
            'description' => "required|min:2",
            'image' => "nullable|image|mimes:jpeg,jpg,png|max:5000",
        ];

        if (request()->has('article_id') && request()->input('article_id') > 0) {
            $rules['image'] = "nullable|mimes:jpeg,jpg,png|max:5000";
        }

        return $rules;
    }

    public function messages()
    {
        return [
            'required'    => "Field is required.",
            'name.regex' => "Invalid article title.",
            'name.between' => "Article title should be between 2 to 30 characters only.",
            'image.mimes' => "Invalid image format.",
            'max' => "Maximum file size is 5MB.",
        ];
    }
}
