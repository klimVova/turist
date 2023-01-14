<?php

namespace App\Http\Resources\Spa;

use Illuminate\Http\Resources\Json\JsonResource;

class SpaTimeResource extends JsonResource
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
            'time_start' => $this->time_start,
            'time_end' => $this->time_end,
            'time_date' => $this->time_date,
            'user_id' => $this->user_id,
        ];
    }
}
