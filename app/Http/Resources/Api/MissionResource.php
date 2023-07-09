<?php

namespace App\Http\Resources\Api;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\DB;

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
            'image' => image_url($this->image),
            'mission_link' => $this->mission_link,
            'description' => $this->description,
            'mission_duration' => (int)$this->mission_duration,
            'mission_type' => $this->mission_type,
            'tags' => json_decode($this->tags),
            'comments' => $this->getTranslations('comments'),
            'mission_stars' => (int)$this->mission_stars,
            'participants_count' => DB::table('mission_user')->where('mission_id', $this->id)->count(),
        ];
    }

}
