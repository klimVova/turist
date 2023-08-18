<?php

namespace App\Http\Resources\Consulting;

use Illuminate\Http\Resources\Json\JsonResource;

class ConsultingCommentResource extends JsonResource
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
            'constalingCard_id' => $this->constalingCard_id,
            'message' => $this->message,
            'user_name' => $this->user_name
        ];
    }
}
