<?php

namespace App\Http\Resources\Sanatorium;

use Illuminate\Http\Resources\Json\JsonResource;

class SanatoriumCommentResource extends JsonResource
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
            'sanatoriumCard_id' => $this->sanatoriumCard_id,
            'message' => $this->message,
            'user_name' => $this->user_name
        ];
    }
}
