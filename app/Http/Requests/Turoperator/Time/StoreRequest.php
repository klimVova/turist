<?php

namespace App\Http\Requests\Turoperator\Time;

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
            'time_start' => 'required|string',
            'time_end' => 'required|string',
            'time_date' => 'required|string',
            'user_id' => 'required|integer|exists:users,id',
        ];
    }

    public function messages()
    {
        return [
            'time_start.required' => 'Это поле необходимо для заполнения',
            'time_end.required' => 'Это поле необходимо для заполнения',
            'time_date.required' => 'Это поле необходимо для заполнения',
        ];
    }
}
