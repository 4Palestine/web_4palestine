<?php

namespace App\Http\Resources\Api;

use Illuminate\Http\Resources\Json\JsonResource;

class PlatformResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        // return parent::toArray($request);
        return [
            'id' => $this->id,
            'slug' => $this->slug,
            'name' => $this->getTranslation('name', 'ar') != null ? $this->getTranslations('name') : null,
            'description' => $this->getTranslation('description', 'ar') != null ? $this->getTranslations('description') : null,
            'tags' => $this->tags,
            'image' => image_url($this->image),
            'is_active' => $this->is_active,
            'deleted_at' => $this->deleted_at,
        ];
    }

}
