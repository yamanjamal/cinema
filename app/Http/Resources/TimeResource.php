<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class TimeResource extends JsonResource
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
            'starttime'     => $this->starttime,
            'endtime'       => $this->endtime,
            'active'        => $this->active,
            'movies'        => MovieResource::collection($this->whenloaded('Movies')),
        ];
    }
}
