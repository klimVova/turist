<?php

namespace App\Http\Resources\Hostel;

use App\Models\MedicalCardTag;
use Illuminate\Http\Resources\Json\JsonResource;

class HostelPostResource extends JsonResource
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
            'hostel_preview_image' => $this->postImageUrl,
            'image_post' => HostelImagesPostResource::collection($this->images),
            'tags' => HostelPostTagsResource::collection($this->tags),
            'user_id' => $this->user_id
        ];
    }
}
