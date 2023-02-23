<?php

namespace App\Http\Resources\Sanatorium;

use Illuminate\Http\Resources\Json\JsonResource;

class SanatoriumItemResource extends JsonResource
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
            'sanatorium_todo_list_id' => $this->sanatorium_todo_list_id,
            'deleted_at' => $this->deleted_at
        ];
    }
}
