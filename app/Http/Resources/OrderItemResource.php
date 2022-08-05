<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class OrderItemResource extends JsonResource
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
            'ammount'         => $this->ammount,
            'order'          => new OrderResource($this->whenloaded('Order')),
            'snack'          => new SnackResource($this->whenloaded('Snack')),
        ];
    }
}
