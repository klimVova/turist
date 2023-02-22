<?php

namespace App\Http\Resources\Hostel;

use Illuminate\Http\Resources\Json\JsonResource;

class HostelImagesPostResource extends JsonResource
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
            'hostel_card_id' => $this->hostel_card_id,
            'images' => $this->photoPostUrl,
        ];
    }
}
