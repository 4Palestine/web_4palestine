<?php

namespace App\Http\Resources;

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
            'name' => $this->name,
            'description' => $this->description,
            'name_en' => $this->getTranslations('name')['en'] ?? '',
            'name_ar' => $this->getTranslations('name')['ar'] ?? '',
            'description_en' => $this->getTranslations('description')['en'] ?? '',
            'description_ar' => $this->getTranslations('description')['ar'] ?? '',
            'image' => $this->image ? image_url($this->image) : null,
            'is_active' => $this->is_active,
            'deleted_at' => $this->deleted_at,
        ];
    }

}
