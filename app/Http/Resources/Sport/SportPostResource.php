<?php

namespace App\Http\Resources\Sport;

use App\Models\MedicalCardTag;
use Illuminate\Http\Resources\Json\JsonResource;

class SportPostResource extends JsonResource
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
            'post' => $this->content,
            'price' => $this->price,
            'berth' => $this->berth,
            'category' => $this->category->title,
            'sport_preview_image' => $this->postImageUrl,
            'image_post' => SportImagesPostResource::collection($this->images),
            'tags' => SportPostTagsResource::collection($this->tags),
            'user_id' => $this->user_id
        ];
    }
}
