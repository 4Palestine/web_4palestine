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
            'tags' => $this->tags,
            'active_missions'=>count($this->active_missions),
            'image' => image_url($this->image),
            'is_active' => $this->is_active,
            'admin_data' => json_decode($this->admin_data),
            'deleted_at' => $this->deleted_at,
        ];
    }

}
