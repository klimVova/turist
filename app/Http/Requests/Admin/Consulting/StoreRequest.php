<?php

namespace App\Http\Requests\Admin\Consulting;

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
            'name' => 'required|string',
            'email' => 'required|string|email|unique:users',
            'password' => 'required|string',
            'role' => 'required|integer',
            'type_id' => 'required|integer|exists:types,id',
            'city_id' => 'required|integer|exists:cities,id',
            'republic_id' => 'required|integer|exists:republics,id',
            'district_id' => 'required|integer|exists:districts,id',
            'consultingCats_ids' => 'nullable|array',
            'consultingCats_ids.*' => 'nullable|integer|exists:consulting_cats,id',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Это поле необходимо для заполнения',
            'name.string' => 'Имя должно быть строкой',
            'email.required' => 'Это поле необходимо для заполнения',
            'email.string' => 'Почта должна быть строкой',
            'email.email' => 'Ваша почта должна соответствовать формату: "example@mail.com"',
            'email.unique' => 'Пользователь с таким email уже существует',
            'password.required' => 'Это поле необходимо для заполнения',
        ];
    }
}
