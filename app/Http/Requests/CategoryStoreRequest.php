<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryStoreRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => ['required', 'max:255'],
            'slug' => ['max:255'],
            'description' => ['max:255'],
            'seo_keywords' => ['max:255'],
            'seo_description' => ['max:255'],
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Kategori adı alanı zorunludur',
            'name.max' => 'Kategori adı en fazla 255 karakter alabilir',
            'slug.max' => 'Slug en fazla 255 karakter alabilir',
            'description.max' => 'Kategori açıklama alanı en fazla 255 karakter alabilir',
            'seo_keywords.max' => 'SEO kelimeler alanı en fazla 255 karakter alabilir',
            'seo_description.max' => 'SEO açıklama alanı en fazla 255 karakter alabilir',
        ];
    }


}
