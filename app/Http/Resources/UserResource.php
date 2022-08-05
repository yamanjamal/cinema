<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
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
            'id'        => $this->id,
            'email'     => $this->email,
            'phone'     => $this->phone,
            'name'      => $this->name,
            'id_img'    => $this->id_img,
            'active'    => $this->active,
            'roles'     => RoleResource::collection($this->whenloaded('roles')),
            'tickets'   => TicketResource::collection($this->whenloaded('Tickets')),
            'orders'    => OrderResource::collection($this->whenloaded('Orders')),
            'account'   => new AccountResource($this->whenloaded('Account')),
        ];
    }
}
