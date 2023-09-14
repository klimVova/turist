<?php

namespace App\Http\Resources\Payment;

use Illuminate\Http\Resources\Json\JsonResource;

class IndexResource extends JsonResource
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
            'email' => $this->email,
            'name' => $this->name,
            'surname' => $this->surname,
            'phone' => $this->phone,
            'user_id' => $this->user_id,
            'name_product' => $this->name_product,
            'date_product' => $this->date_product,
            'total_price_product' => $this->total_price_product,
            'amount' => $this->amount,
            'orderId' => $this->orderId,
            'status' => $this->status,
            'products' => json_decode($this->products),
            'promocode' => json_decode($this->promocode),
        ];
    }
}
