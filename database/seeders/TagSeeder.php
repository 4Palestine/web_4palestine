<?php

namespace Database\Seeders;

use App\Models\Tag;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $seeds = $this->__data();
        foreach ($seeds as $item) {
            Tag::create(collect($item)->toArray());
        }
    }
    public function __data()
    {
        return [
            [
                'platform_id' => 1,
                'name' => [
                    'en' => 'like',
                    'ar' => 'لايك',
                ],
            ],
            [
                'platform_id' => 1,
                'name' => [
                    'en' => 'comment',
                    'ar' => 'نعليق',
                ],
            ],
            [
                'platform_id' => 1,
                'name' => [
                    'en' => 'share',
                    'ar' => 'مشاركة',
                ],
            ],
            [
                'platform_id' => 1,
                'name' => [
                    'en' => 'report',
                    'ar' => 'تقرير',
                ],
            ],
            [
                'platform_id' => 2,
                'name' => [
                    'en' => 'like',
                    'ar' => 'لايك',
                ],
            ],
            [
                'platform_id' => 2,
                'name' => [
                    'en' => 'comment',
                    'ar' => 'نعليق',
                ],
            ],
            [
                'platform_id' => 2,
                'name' => [
                    'en' => 'share',
                    'ar' => 'مشاركة',
                ],
            ],
            [
                'platform_id' => 2,
                'name' => [
                    'en' => 'report',
                    'ar' => 'تقرير',
                ],
            ],
            [
                'platform_id' => 3,
                'name' => [
                    'en' => 'like',
                    'ar' => 'لايك',
                ],
            ],
            [
                'platform_id' => 3,
                'name' => [
                    'en' => 'comment',
                    'ar' => 'نعليق',
                ],
            ],
            [
                'platform_id' => 3,
                'name' => [
                    'en' => 'tweet',
                    'ar' => 'تويت',
                ],
            ],
            [
                'platform_id' => 3,
                'name' => [
                    'en' => 'retweet',
                    'ar' => 'ري تويت',
                ],
            ],
            [
                'platform_id' => 3,
                'name' => [
                    'en' => 'report',
                    'ar' => 'تقرير',
                ],
            ],
            [
                'platform_id' => 4,
                'name' => [
                    'en' => 'like',
                    'ar' => 'لايك',
                ],
            ],
            [
                'platform_id' => 4,
                'name' => [
                    'en' => 'comment',
                    'ar' => 'نعليق',
                ],
            ],
            [
                'platform_id' => 4,
                'name' => [
                    'en' => 'report',
                    'ar' => 'تقرير',
                ],
            ],
            [
                'platform_id' => 5,
                'name' => [
                    'en' => 'like',
                    'ar' => 'لايك',
                ],
            ],
            [
                'platform_id' => 5,
                'name' => [
                    'en' => 'comment',
                    'ar' => 'نعليق',
                ],
            ],
            [
                'platform_id' => 5,
                'name' => [
                    'en' => 'report',
                    'ar' => 'تقرير',
                ],
            ],
        ];
    }
}
