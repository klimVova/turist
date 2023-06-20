<?php

namespace App\Http\Resources\Baner;

use Illuminate\Http\Resources\Json\JsonResource;

class BanerResource extends JsonResource
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
            'images' => $this->photoPostUrl,
        ];
    }
}
