<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ArticleCreateRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            "name" => ["required", "max:255"],
            "slug" => ["required", "max:255"],
            "body" => ["required"],
            "category_id" => ["required"],
            "image" => ["image", "mimetypes:image/jpeg,image/jpg,image/png", "max:2048"],
        ];
    }
}
