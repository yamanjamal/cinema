<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class AccountResource extends JsonResource
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
            'points'       => $this->points,
            'user'         => new UserResource($this->whenloaded('User')),
            'invoices'     => InvoiceResource::collection($this->whenloaded('Invoices')),
        ];
    }
}
