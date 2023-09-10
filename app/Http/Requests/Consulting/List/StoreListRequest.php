<?php

namespace App\Http\Requests\Consulting\List;

use Illuminate\Foundation\Http\FormRequest;

class StoreListRequest extends FormRequest
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
            'user_id' => 'required|integer',
            'cat_id' => 'required|integer',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Это поле необходимо для заполнения',
            'title.string' => 'Имя должно быть строкой',
            'price.integer' => 'Введите только цифры',
            'price.required' => 'Это поле необходимо для заполнения',
            'user_email.required' => 'Это поле необходимо для заполнения',
            'address.required' => 'Это поле необходимо для заполнения',
        ];
    }
}
