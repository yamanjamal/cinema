<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class SeatResource extends JsonResource
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
            'id'           => $this->id,
            'code'         => $this->code,
            'date'         => $this->date,
            'time'         => $this->time,
            'availabel'    => $this->availabel,
            'tickets'      => TicketResource::collection($this->whenloaded('Tickets')),
            'hall'         => new HallResource($this->whenloaded('Hall')),
        ];
    }
}
