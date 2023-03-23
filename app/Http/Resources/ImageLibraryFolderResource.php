<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ImageLibraryFolderResource extends JsonResource
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
            'parent_id' => $this->parent_id,
            'parent_name' => optional($this->parent)->name ?? 'ROOT',
            'name' => $this->name,
            'name_en' => $this->getTranslations('name')['en'] ?? '',
            'name_ar' => $this->getTranslations('name')['en'] ?? '',
            'is_active' => $this->is_active,
        ];
    }

}
