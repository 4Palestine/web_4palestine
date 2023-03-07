<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
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
            'store_id' => optional($this->store)->id,
            'store_name' => optional($this->store)->name,
            'category_id' => optional($this->category)->id,
            'category_name' => optional($this->category)->name,
            'name' => $this->name,
            'slug' => $this->slug,
            'description' => $this->description,
            'image' => $this->image ? image_url($this->image) : null,
            'price' => $this->price,
            'compare_price' => $this->compare_price,
            'options' => $this->options,
            'rating' => $this->rating,
            'rating_ex' => $this->rating . '/10',
            'featured' => $this->featured,
            'featured_ex' => $this->featured == 1 ? 'Featured' : 'Not Featured',
            'status' => $this->status,
            'deleted_at' => $this->deleted_at,
            // 'tags' => optional($this->tags)->name,
        ];
    }
}
