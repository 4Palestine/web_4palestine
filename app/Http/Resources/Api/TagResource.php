<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class TagResource extends JsonResource
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
            'platform_id' => $this->platform_id,
            'platform_name' => optional($this->platform)->name,
            'name' => $this->name,
            'name_en' => $this->getTranslations('name')['en'] ?? '',
            'name_ar' => $this->getTranslations('name')['ar'] ?? '',
        ];
    }

}
