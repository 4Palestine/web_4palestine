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
            'slug' => $this->slug,
            'platform_id' => $this->platform_id,
            'user_id' => $this->user_id,
            'image' => image_url($this->image),
            'mission_link' => $this->mission_link,
            'description' => $this->description,
            'mission_duration' => $this->mission_duration,
            'mission_type' => $this->mission_type,
            'tags' => json_decode($this->tags),
            'comments' => json_decode($this->comments ?? "[]"),
            'mission_stars' => $this->mission_stars,
            'is_active' => $this->is_active,
            'deleted_at' => $this->deleted_at,
        ];
    }

}
