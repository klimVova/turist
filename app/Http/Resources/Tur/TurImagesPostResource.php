<?php

namespace App\Http\Resources\Tur;

use Illuminate\Http\Resources\Json\JsonResource;

class TurImagesPostResource extends JsonResource
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
            'turoperator_card_images' => $this->turoperator_card_images,
            'images' => $this->photoPostUrl,
        ];
    }
}
