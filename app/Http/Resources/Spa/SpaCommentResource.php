<?php

namespace App\Http\Resources\Spa;

use Illuminate\Http\Resources\Json\JsonResource;

class SpaCommentResource extends JsonResource
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
            'spaCard_id' => $this->spaCard_id,
            'message' => $this->message,
            'user_name' => $this->user_name
        ];
    }
}
