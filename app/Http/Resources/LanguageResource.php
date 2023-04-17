<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class LanguageResource extends JsonResource
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
        'name' => $this->name,
        'level' => $this->level,

        'curriculum_id' => $this->whenLoaded('curriculum_id'),

        ];
    }
}
