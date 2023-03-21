<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class TestResource extends JsonResource
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
        //$this->Load(['work']);
        return[
        'id' => $this->id,
        'cv' => $this->whenLoaded('curriculum'),
        'link' => $this->whenLoaded('link'),
        'phone' => $this->whenLoaded('phone'),

        'name' => $this->name,
        'email' => $this->email,
        'position' => $this->position,
        'bio' => $this->bio,
        'picture' => $this->picture,

        ];
        


    }
}
