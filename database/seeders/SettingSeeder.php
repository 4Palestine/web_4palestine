<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
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
                'group' => 'CONTACT_US',
                'key' => 'facebook',
                'value' => 'https://www.facebook.com/',
            ],
            [
                'group' => 'CONTACT_US',
                'key' => 'instagram',
                'value' => 'https://www.instagram.com/',
            ],
            [
                'group' => 'CONTACT_US',
                'key' => 'phone',
                'value' => '0599999999',
            ]
        ];
    }
}
