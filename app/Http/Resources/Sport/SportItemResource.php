<?php

namespace App\Http\Resources\Sport;

use Illuminate\Http\Resources\Json\JsonResource;

class SportItemResource extends JsonResource
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
            'price' =>$this->price,
            'sport_todo_list_id' => $this->sport_todo_list_id,
            'deleted_at' => $this->deleted_at
        ];
    }
}
