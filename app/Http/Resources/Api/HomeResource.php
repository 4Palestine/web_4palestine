<?php

namespace App\Http\Resources\Api;

use Illuminate\Http\Resources\Json\JsonResource;

class HomeResource extends JsonResource
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
            'id' => $this->id,
            'slug' => $this->slug,
            'name' => $this->getTranslations('name'),
            'description' => $this->getTranslation('description', 'ar') != null ? $this->getTranslations('description') : null,
            'image' => image_url($this->image),

            'missions' => MissionResource::collection($this->whenLoaded('missions')),
        ];
    }

}
