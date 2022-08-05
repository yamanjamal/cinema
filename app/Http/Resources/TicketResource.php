<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class TicketResource extends JsonResource
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
            'glasses'       => $this->glasses,
            'date'          => $this->date,
            'starttime'     => $this->starttime,
            'user'          => new UserResource($this->whenloaded('User')),
            'seat'          => new SeatResource($this->whenloaded('Seat')),
            'price'         => new PriceResource($this->whenloaded('Price')),
            'movie'         => new MoiveResource($this->whenloaded('Moive')),
        ];
    }
}
