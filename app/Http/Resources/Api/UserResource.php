<?php

namespace App\Http\Resources\Api;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
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
            'name' => $this->name,
            'email' => $this->email,
            'country' => $this->country,
            'languages' => json_decode($this->languages),
            'is_super' => $this->is_super,
            'is_active' => $this->is_active,
<<<<<<< HEAD
            'avatar' => image_url($this->avatar),
=======
            'avatar' => $this->avatar,
>>>>>>> afe7a98903978a8a4f3ec29c0d7150bf94182e2d
        ];
    }

}
