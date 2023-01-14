<?php

namespace App\Http\Resources\Cafe;

use Illuminate\Http\Resources\Json\JsonResource;

class CafeProductResource extends JsonResource
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
            'cafe_todo_item_id' => $this->cafe_todo_item_id,
            'deleted_at' => $this->deleted_at
        ];
    }
}
