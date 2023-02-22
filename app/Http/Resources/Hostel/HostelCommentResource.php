<?php

namespace App\Http\Resources\Hostel;

use Illuminate\Http\Resources\Json\JsonResource;

class HostelCommentResource extends JsonResource
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
            'hostelCard_id' => $this->hostelCard_id,
            'message' => $this->message,
            'user_name' => $this->user_name
        ];
    }
}
