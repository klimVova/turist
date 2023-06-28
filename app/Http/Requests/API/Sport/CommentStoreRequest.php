<?php

namespace App\Http\Requests\API\Sport;

use Illuminate\Foundation\Http\FormRequest;

class CommentStoreRequest extends FormRequest
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
            'message' => 'required|string',
            'user_name' => 'required|string',
            'sportCard_id' => 'required|integer|exists:sport_cards,id',
        ];
    }

    public function messages()
    {
        return [

        ];
    }
}
