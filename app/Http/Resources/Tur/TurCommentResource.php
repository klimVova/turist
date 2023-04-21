<?php

namespace App\Http\Resources\Tur;

use Illuminate\Http\Resources\Json\JsonResource;

class TurCommentResource extends JsonResource
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
            'turCard_id' => $this->turCard_id,
            'message' => $this->message,
            'user_name' => $this->user_name
        ];
    }
}
