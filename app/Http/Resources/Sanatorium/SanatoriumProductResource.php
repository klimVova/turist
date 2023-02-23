<?php

namespace App\Http\Resources\Sanatorium;

use Illuminate\Http\Resources\Json\JsonResource;

class SanatoriumProductResource extends JsonResource
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
            'sanatorium_todo_item_id' => $this->sanatorium_todo_item_id,
            'deleted_at' => $this->deleted_at
        ];
    }
}
