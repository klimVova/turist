<?php

namespace App\Http\Resources\Medical;

use Illuminate\Http\Resources\Json\JsonResource;

class MedicalCardImagesResource extends JsonResource
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
            'medical_card_id' => $this->medical_card_id,
            'images' => $this->photoUrl,
        ];
    }
}
