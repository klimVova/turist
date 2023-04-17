<?php

namespace App\Http\Requests\API\PreOrder;

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
            'products' => 'required|array',
            'total_price' => 'required|integer',
            'date' => 'required|string',
            'user_id' => 'required|integer',
            'name_product' => 'required|string',
            'image_product' => 'required|string',
            'role' => 'required|string',
        ];
    }
}
