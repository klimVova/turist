<?php

namespace App\Http\Resources\Medical;

use Illuminate\Http\Resources\Json\JsonResource;

class MedicalCommentResource extends JsonResource
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
            'id' => $this->id,
            'medicalCard_id' => $this->medicalCard_id,
            'message' => $this->message,
            'user_name' => $this->user_name
        ];
    }
}
