<?php

namespace App\Http\Resources\Hostel;

use App\Models\MedicalCardTag;
use Illuminate\Http\Resources\Json\JsonResource;

class HostelActionResource extends JsonResource
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
            'user_id' => $this->user_id
        ];
    }
}
