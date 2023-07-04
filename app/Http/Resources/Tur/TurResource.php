<?php

namespace App\Http\Resources\Tur;

use App\Http\Resources\Tur\TurImagesResource;
use Illuminate\Http\Resources\Json\JsonResource;

class TurResource extends JsonResource
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
            'desc' => $this->desc,
            'content' => $this->content,
            'image_url' => $this->imageUrl,
            'logo_url' => $this->logoUrl,
            'address' => $this->address,
            'coordinate_l' => $this->coordinate_l,
            'coordinate_r' => $this->coordinate_r,
            'link' => $this->link,
            'name_link' => $this->name_link,
            'phone' => $this->phone,
            'user_id' => $this->user_id,
            'email' => $this->user_email,
            'type_id' => $this->type_id,
            'district_id' => $this->district_id,
            'republic_id' =>$this->republic_id,
            'city_id' => $this->city_id,
            'tags' => TurTagsResource::collection($this->tags),
            'images' => TurImagesResource::collection($this->images)
        ];
    }
}
