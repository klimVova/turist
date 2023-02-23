<?php

namespace App\Http\Resources\Sanatorium;

use App\Models\MedicalCardTag;
use Illuminate\Http\Resources\Json\JsonResource;

class SanatoriumPostResource extends JsonResource
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
            'sanatorium_preview_image' => $this->postImageUrl,
            'image_post' => SanatoriumImagesPostResource::collection($this->images),
            'tags' => SanatoriumPostTagsResource::collection($this->tags),
            'user_id' => $this->user_id
        ];
    }
}
