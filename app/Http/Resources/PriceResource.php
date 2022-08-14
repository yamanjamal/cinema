<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PriceResource extends JsonResource
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
            'ticket_price'  => $this->ticket_price,
            'glass_price'   => $this->glass_price,
            'tickets'       => TicketResource::collection($this->whenloaded('Tickets')),
        ];
    }
}
