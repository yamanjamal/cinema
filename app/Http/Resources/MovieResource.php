<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class MovieResource extends JsonResource
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
            'name'          => $this->name,
            'type'          => $this->type,
            'image'         => $this->image,
            'description'   => $this->description,
            'video'         => $this->video,
            'from'          => $this->from,
            'to'            => $this->to,
            'showing_type'  => $this->showing_type,
            'hall'          => new HallResource($this->whenloaded('Hall')),
            'tickets'       => TicketResource::collection($this->whenloaded('Tickets')),
            'genres'        => GenreResource::collection($this->whenloaded('Genres')),
            'times'         => TimeResource::collection($this->whenloaded('Times')),
        ];
    }
}
