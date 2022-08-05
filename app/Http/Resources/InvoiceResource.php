<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class InvoiceResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id'             => $this->id,
            'user_name'      => $this->user_name,
            'user_phone'     => $this->user_phone,
            'total_price'    => $this->total_price,
            'order'          => new OrderResource($this->whenloaded('Order')),
            'account'        => new AccountResource($this->whenloaded('Account')),
        ];
    }
}
