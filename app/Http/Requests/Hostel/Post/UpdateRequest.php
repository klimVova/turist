<?php

namespace App\Http\Requests\Hostel\Post;

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
            'price' => 'required|integer',
            'hostel_preview_image' => 'nullable|file',
            'berth' => 'required|string',
            'hostel_category_id' => 'required|integer|exists:hostel_categories,id',
            'hostel_tag_ids' => 'nullable|array',
            'hostel_tag_ids.*' => 'nullable|integer|exists:hostel_tags,id',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Это поле необходимо для заполнения',
            'title.string' => 'Имя должно быть строкой',
            'content.required' => 'Это поле необходимо для заполнения',
            'price.required' => 'Это поле необходимо для заполнения',
            'price.integer' => 'Цена должна быть числом',
        ];
    }
}
