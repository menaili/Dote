<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class EducationResource extends JsonResource
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
            'university' => $this->university,
            'level' => $this->level,
            'feild' => $this->feild,
            'start_date' => $this->start_date,
            'end_date' => $this->end_date,
            'curriculum_id' => $this->whenLoaded('curriculum_id'),

            ];
    }
}
