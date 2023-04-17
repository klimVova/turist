<?php

namespace App\Http\Resources\PreOrder;

use App\Models\MedicalCardTag;
use Illuminate\Http\Resources\Json\JsonResource;

class PreOrderResource extends JsonResource
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
            'products' => json_decode($this->products),
            'total_price' => $this->total_price,
            'user_id' => $this->total_price,
            'date' => $this->date,
        ];
    }
}
