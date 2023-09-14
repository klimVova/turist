<?php

namespace App\Http\Resources\PreOrder;

use App\Models\MedicalCardTag;
use Illuminate\Http\Resources\Json\JsonResource;

class PreOrderIndexResource extends JsonResource
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
            'total_price' => $this->total_price,
            'user_id' => $this->user_id,
            'date' => $this->date,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'name_product' => $this->name_product,
            'image_product' => $this->image_product,
            'role' => $this->role,
            'organization_email' => $this->organization_email,
            'products' => json_decode($this->products),
        ];
    }
}
