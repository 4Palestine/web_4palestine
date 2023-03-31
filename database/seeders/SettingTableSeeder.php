<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SettingTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
            $seeds = $this->__data();
            foreach ($seeds as $item) {
                Setting::create(collect($item)->toArray());
            }
        }

        public function __data()
        {
            return [
                [
                    'key' => 'facebook',
                    'value' => 'https://www.facebook.com/',
                    'is_active' => 1 ,
                    'group' => 'SOCIAL_MEDIA',
                ],
                [
                    'key' => 'instagram',
                    'value' => 'https://www.instagram.com/',
                    'is_active' => 0 ,
                    'group' => 'SOCIAL_MEDIA',
                ],
                [
                    'key' => 'twitter',
                    'value' => 'https://twitter.com/',
                    'is_active' => 1 ,
                    'group' => 'SOCIAL_MEDIA',
                ],
                [
                    'key' => 'mode',
                    'value' => 'light',
                    'is_active' => 1 ,
                    'group' => 'MODE',
                ],
            ];
        }
    }
