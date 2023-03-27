<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class InvitaionResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
       /** @var \App\Models\User $this */
       return[
        'id' => $this->id,
        'reciver' => $this->reciver,
        'sender' => $this->sender,
        'status' => $this->status,

        ];
    }
}
