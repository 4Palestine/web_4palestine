<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class MissionResource extends JsonResource
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
            'user_id' => $this->user_id,
            'image' => image_url($this->image),
            'mission_link' => $this->mission_link,
            'description' => $this->description,
            'description_en' => $this->getTranslations('description')['en'] ?? '',
            'description_ar' => $this->getTranslations('description')['ar'] ?? '',
            'mission_duration' => $this->mission_duration,
            'mission_type' => $this->mission_type,
            'tags' =>json_decode($this->tags),
            // 'comments' => json_decode($this->comments ?? "[]"),
            'comments_en' => $this->getTranslations('comments')['en'] ?? '',
            'comments_ar' => $this->getTranslations('comments')['ar'] ?? '',
            'mission_stars' => $this->mission_stars,
            'is_active' => $this->is_active,
            'admin_data' => json_decode($this->admin_data),
            'deleted_at' => $this->deleted_at,
        ];
    }

}
