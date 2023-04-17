<?php

namespace App\Http\Requests\User\Main;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
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
            'email' => 'required|string|email|unique:users,email,' . $this->user_id,
            'surname' => 'required|string',
            'phone' => 'required|string',
            'gender' => 'required|string',
            'age' => 'required|integer',
            'user_city' => 'required|string',
            'user_district' => 'required|string',
            'user_id' => 'required|integer|exists:users,id',
        ];
    }
}
