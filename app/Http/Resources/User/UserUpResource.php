<?php

namespace App\Http\Resources\User;

use Illuminate\Http\Resources\Json\JsonResource;

class UserUpResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'name' => 'required|string',
            'email' => 'required|string|email|unique:users,email,' . $this->user_id,
            'surname' => 'required|string',
            'phone' => 'required|string',
            'gender' => 'required|string',
            'age' => 'required|integer',
            'user_city' => 'required|string',
            'user_district' => 'required|string',
            'user_id' => 'required|integer|exists:users,id',
        ];
    }
}
