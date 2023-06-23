<?php

namespace App\Http\Resources\Spa;

use Illuminate\Http\Resources\Json\JsonResource;

class SpaCardImagesResource extends JsonResource
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
            'spa_card_id' => $this->spa_card_id,
            'images' => $this->photoUrl,
        ];
    }
}
