<?php

namespace App\Http\Requests\Hostel\Card;

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
            'title' => 'required|string',
            'content' => 'required|string',
            'location' => 'required|string',
            'phone' => 'required|integer',
            'coordinate' => 'required|string',
            'preview_image' => 'nullable|file',
        ];
    }
    public function messages(){
        return [
            'title.required' => 'Это поле необходимо для заполнения',
            'title.string' => 'Имя должно быть строкой',
            'content.required' => 'Это поле необходимо для заполнения',
            'location.required' => 'Это поле необходимо для заполнения',
            'location.string' => 'Это поле необходимо для заполнения',
        ];
    }
}
