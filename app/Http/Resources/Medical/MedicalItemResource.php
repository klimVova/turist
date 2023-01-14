<?php

namespace App\Http\Resources\Medical;

use Illuminate\Http\Resources\Json\JsonResource;

class MedicalItemResource extends JsonResource
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
            'price' => $this->price,
            'medical_todo_list_id' => $this->medical_todo_list_id,
            'deleted_at' => $this->deleted_at
        ];
    }
}
