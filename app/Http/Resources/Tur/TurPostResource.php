<?php

namespace App\Http\Resources\Tur;

use App\Http\Resources\Tur\TurImagesPostResource;
use Illuminate\Http\Resources\Json\JsonResource;

class TurPostResource extends JsonResource
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
            'date' => $this->date,
            'berth' => $this->berth,
            'category' => $this->category->title,
            'sanatorium_preview_image' => $this->postImageUrl,
            'image_post' => TurImagesPostResource::collection($this->images),
            'tags' => TurPostTagsResource::collection($this->tags),
            'user_id' => $this->user_id
        ];
    }
}
