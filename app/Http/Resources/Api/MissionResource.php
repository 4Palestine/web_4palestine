<?php

namespace App\Http\Resources\Api;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Arr;
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
            // 'slug' => $this->slug,
            'platform_name' => optional($this->platform)->name,
            'image' => image_url($this->image),
            'mission_link' => $this->mission_link,
            // 'description' => $this->description,
            'description' => $this->getTranslations('description') ?? null,
            'mission_duration' => (int)$this->mission_duration,
            'mission_type' => $this->mission_type($this->mission_type),
            'tags' => json_decode($this->tags),
            'all_comments' => $this->comments != null ? $this->getTranslations('comments') : null,
            'random_comment' => $this->comments != null ? $this->getRandomCommentPair($this->getTranslations('comments')) : null,
            'mission_stars' => (int)$this->mission_stars,
            'participants_count' => DB::table('mission_user')->where('mission_id', $this->id)->count(),
        ];
    }


    // test pull request
    public function mission_type($type)
    {
        if ($type == SUPPORT_EN) {
            return [
                'ar' => SUPPORT_AR,
                'en' => $type
            ];
        } else {
            return [
                'ar' => ATTACK_AR,
                'en' => $type
            ];
        }
    }



    function getRandomCommentPair($comments)
    {
        if(is_null($comments)){
            return [
                'en' => null,
                'ar' => null,
            ];
        }
        // Get all English comments
        $enComments = $comments['en'];

        // Get all Arabic comments
        $arComments = $comments['ar'];

        // Get the lengths of English and Arabic comments arrays
        $enLength = count($enComments);
        $arLength = count($arComments);

        // Determine the longest array and its key (en or ar)
        if ($enLength >= $arLength) {
            $longestKey = 'en';
            $longestLength = $enLength;
        } else {
            $longestKey = 'ar';
            $longestLength = $arLength;
        }

        // If both arrays are empty, return null for both languages
        if ($longestLength === 0) {
            return [
                'en' => null,
                'ar' => null,
            ];
        }

        // Get a random index based on the longest array's length
        $randomIndex = mt_rand(0, $longestLength - 1);

        // Get the corresponding keys (index) for English and Arabic arrays
        $randomKeyEn = array_keys($enComments)[$randomIndex] ?? null;
        $randomKeyAr = array_keys($arComments)[$randomIndex] ?? null;

        // Get the comments for English and Arabic using the random keys
        $randomCommentEn = $randomKeyEn !== null ? $enComments[$randomKeyEn] : null;
        $randomCommentAr = $randomKeyAr !== null ? $arComments[$randomKeyAr] : null;

        return [
            'en' => $randomCommentEn,
            'ar' => $randomCommentAr,
        ];
    }
}
