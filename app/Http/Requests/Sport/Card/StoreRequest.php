<?php

namespace App\Http\Requests\Sport\Card;

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
            'desc' => 'required|string',
            'content' => 'required|string',
            'address' => 'required|string',
            'coordinate_l' => 'required|string',
            'coordinate_r' => 'required|string',
            'preview_image' => 'required|file',
            'logo' => 'required|file',
            'phone' => 'required|integer',
            'link' => 'required|string',
            'name_link' => 'required|string',
            'user_id' => 'required|integer|exists:users,id',
            'type_id' => 'required|integer|exists:types,id',
            'district_id' => 'required|integer|exists:districts,id',
            'republic_id' => 'required|integer|exists:republics,id',
            'city_id' => 'required|integer|exists:cities,id',
            'sport_cardTag_ids' => 'nullable|array',
            'sport_cardTag_ids.*' => 'nullable|integer|exists:sport_card_tags,id',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Это поле необходимо для заполнения',
            'title.string' => 'Имя должно быть строкой',
            'content.required' => 'Это поле необходимо для заполнения',
            'location.required' => 'Это поле необходимо для заполнения',
            'location.string' => 'Это поле необходимо для заполнения',
            'phone.integer' => 'Это поле необходимо для заполнения',
            'coordinate.string' => 'Это поле необходимо для заполнения',
        ];
    }
}
