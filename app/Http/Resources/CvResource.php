<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CvResource extends JsonResource
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
        'education' => $this->whenLoaded('education'),
        'work' => $this->whenLoaded('work'),
        'skill' => $this->whenLoaded('skill'),
        'language' => $this->whenLoaded('language'),
        'gallery' => $this->whenLoaded('gallery'),
        'contact' => $this->whenLoaded('contact'),

        'name' => $this->name,
        'position' => $this->position,
        'bio' => $this->bio,
        'picture' => $this->picture,

        ];
        


    }
}
