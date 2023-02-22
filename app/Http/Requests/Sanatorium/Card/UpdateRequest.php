<?php

namespace App\Http\Requests\Sanatorium\Card;

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
            'desc' => 'required|string',
            'content' => 'required|string',
            'address' => 'required|string',
            'coordinate_l' => 'required|string',
            'coordinate_r' => 'required|string',
            'preview_image' => 'nullable|file',
            'logo' => 'nullable|file',
            'phone' => 'required|integer',
            'link' => 'required|string',
            'name_link' => 'required|string',
            'sanatorium_cardTag_ids' => 'nullable|array',
            'sanatorium_cardTag_ids.*' => 'nullable|integer|exists:sanatorium_card_tags,id',
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
