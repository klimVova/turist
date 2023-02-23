<?php

namespace App\Http\Resources\Sanatorium;

use Illuminate\Http\Resources\Json\JsonResource;

class SanatoriumImagesResource extends JsonResource
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
            'sanatorium_card_id' => $this->sanatorium_card_id,
            'images' => $this->photoUrl,
        ];
    }
}
