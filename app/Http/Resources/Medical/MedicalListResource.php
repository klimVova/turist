<?php

namespace App\Http\Resources\Medical;

use Illuminate\Http\Resources\Json\JsonResource;

class MedicalListResource extends JsonResource
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
            'title' => $this->title,
            'user_id' => $this->user_id,
            'deleted_at' => $this->deleted_at
        ];
    }
}
