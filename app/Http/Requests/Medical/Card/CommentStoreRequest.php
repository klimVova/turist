<?php

namespace App\Http\Requests\Medical\Card;

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
            'medicalCard_id' => 'required|integer|exists:medical_cards,id',
        ];
    }

    public function messages()
    {
        return [

        ];
    }
}
