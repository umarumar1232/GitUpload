<?php

namespace App\Http\Requests\Articles;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreArticleRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'required|string|max:200|unique:articles,title',
            'body' => 'required|string|max:10000',
            'category' => 'required|exists:categories,id',
            'cover' => ['image', 'max:2048', Rule::dimensions()->minWidth(780)->minWidth(500)->maxWidth(1200)->maxHeight(950)]
        ];
    }
}