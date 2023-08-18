<?php

namespace App\Http\Requests\Consulting\Card;

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
            'user_email' => 'required|string',
            'type_id' => 'required|integer|exists:types,id',
            'district_id' => 'required|integer|exists:districts,id',
            'republic_id' => 'required|integer|exists:republics,id',
            'city_id' => 'required|integer|exists:cities,id',
            'consulting_tag_ids' => 'nullable|array',
            'consulting_tag_ids.*' => 'nullable|integer|exists:consulting_tags,id',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Это поле необходимо для заполнения',
            'title.string' => 'Имя должно быть строкой',
            'user_email.required' => 'Это поле необходимо для заполнения',
            'desc.required' => 'Это поле необходимо для заполнения',
            'address.required' => 'Это поле необходимо для заполнения',
            'link.required' => 'Это поле необходимо для заполнения',
            'coordinate_l.required' => 'Это поле необходимо для заполнения',
            'coordinate_r.required' => 'Это поле необходимо для заполнения',
            'content.required' => 'Это поле необходимо для заполнения',
            'phone.integer' => 'Это поле необходимо для заполнения',
            'phone.required' => 'Это поле необходимо для заполнения',
        ];
    }
}
