<?php

namespace App\Http\Resources\Cafe;

use Illuminate\Http\Resources\Json\JsonResource;

class CafeCardImagesResource extends JsonResource
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
            'cafe_card_id' => $this->cafe_card_id,
            'images' => $this->photoUrl,
        ];
    }
}
