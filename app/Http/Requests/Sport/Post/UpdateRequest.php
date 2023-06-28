<?php

namespace App\Http\Requests\Sport\Post;

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
            'berth' => 'required|string',
            'sport_preview_image' => 'nullable|file',
            'sport_category_id' => 'required|integer|exists:sport_categories,id',
            'sport_tag_ids' => 'nullable|array',
            'sport_tag_ids.*' => 'nullable|integer|exists:sport_tags,id',
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
