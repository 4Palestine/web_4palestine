<?php

namespace Database\Seeders;

use App\Models\Platform;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PlatformSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $seeds = $this->__data();
        foreach ($seeds as $item) {
            Platform::create(collect($item)->toArray());
        }
    }

    public function __data()
    {
        return [
            [
                'name' => [
                    'en' => 'facebook' ,
                    'ar' => 'فيسبوك'
            ],
                'slug'=>'facebook',
                'description' => [
                    'en' => 'Facebook Platform' ,
                    'ar' => 'منصة الفيسبوك' ,
                ],
                'is_active' => 1 ,
            ],
            [
                'name' => [
                    'en' => 'instagram' ,
                    'ar' => 'انستغرام'
            ],
                'slug'=>'instagram',
                'description' => [
                    'en' => 'Instagram Platform' ,
                    'ar' => 'منصة انستغرام' ,
                ],
                'is_active' => 1 ,
            ],
            [
                'name' => [
                    'en' => 'twitter' ,
                    'ar' => 'تويتر'
            ],
                'slug'=>'twitter',
                'description' => [
                    'en' => 'Twitter Platform' ,
                    'ar' => 'منصة تويتر' ,
                ],
                'is_active' => 1 ,
            ],
            [
                'name' => [
                    'en' => 'linkedin' ,
                    'ar' => 'لينكد ان'
            ],
                'slug'=>'linked-in',
                'description' => [
                    'en' => 'Linkedin Platform' ,
                    'ar' => 'منصة لينكد ان' ,
                ],
                'is_active' => 1 ,
            ],
            [
                'name' => [
                    'en' => 'youtube' ,
                    'ar' => 'يوتيوب'
            ],
                'slug'=>'youtube',
                'description' => [
                    'en' => 'Youtube Platform' ,
                    'ar' => 'منصة يوتيوب' ,
                ],
                'is_active' => 1 ,
            ],
            [
                'name' => [
                    'en' => 'telegram' ,
                    'ar' => 'تليجرام'
            ],
                'slug'=>'telegram',
                'description' => [
                    'en' => 'Telegram Platform' ,
                    'ar' => 'منصة تليجرام' ,
                ],
                'is_active' => 1 ,
            ],
        ];
    }
}
