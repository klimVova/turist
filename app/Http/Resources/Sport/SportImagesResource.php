<?php

namespace App\Http\Resources\Sport;

use Illuminate\Http\Resources\Json\JsonResource;

class SportImagesResource extends JsonResource
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
            'sport_card_id' => $this->sport_card_id,
            'images' => $this->photoUrl,
        ];
    }
}
