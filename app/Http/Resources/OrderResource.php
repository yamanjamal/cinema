<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class OrderResource extends JsonResource
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
            'id'            => $this->id,
            'date'          => $this->date,
            'status'        => $this->status,
            'total_price'   => $this->total_price,
            'user'          => new UserResource($this->whenloaded('User')),
            'invoice'       => new InvoiceResource($this->whenloaded('Invoice')),
            'orderitems'    => OrderItemResource::collection($this->whenloaded('OrederItems')),
        ];
    }
}
