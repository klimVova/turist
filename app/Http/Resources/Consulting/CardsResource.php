<?php

namespace App\Http\Resources\Consulting;

use Illuminate\Http\Resources\Json\JsonResource;

class CardsResource extends JsonResource
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
            'title' => $this->title,
            'address' => $this->address,
            'cat_id' => $this->cat_id,
            'user_id' => $this->user_id,
            'preview_image' => $this->imageUrl,
        ];
    }
}
