<?php

namespace App\Http\Requests\Cafe\Post;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'title' => 'required|string',
            'price' => 'required|integer',
            'cafe_catalog_id' => 'required|integer|exists:cafe_catalogs,id',
            'cafe_category_id' => 'required|integer|exists:cafe_categories,id',
            'user_id' => 'required|integer|exists:users,id',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Это поле необходимо для заполнения',
            'title.string' => 'Имя должно быть строкой',
            'price.required' => 'Это поле необходимо для заполнения',
            'price.integer' => 'Цена должна быть числом',
        ];
    }
}
