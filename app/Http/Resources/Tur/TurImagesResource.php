<?php

namespace App\Http\Resources\Tur;

use Illuminate\Http\Resources\Json\JsonResource;

class TurImagesResource extends JsonResource
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
            'tur_card_id' => $this->turoperator_card_id,
            'images' => $this->photoUrl,
        ];
    }
}
