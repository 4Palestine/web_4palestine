<?php

namespace Database\Seeders;

use App\Models\Mission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $seeds = $this->__data();
        foreach ($seeds as $item) {
            Mission::create(collect($item)->toArray());
        }
    }

    public function __data(){
        return [
            [
                'slug'=>'mission-one',
                'platform_id'=> 1 ,
                'image'=> 'uploads/one.jpg' ,
                'mission_link'=> 'https://twitter.com/netanyahu/status/1655785140914626560?cxt=HHwWgICxyYP0w_otAAAA',
                'description' => [
                    'en' => 'Israel carried out a military operation in the Gaza Strip, targeting civilians in their homes, causing casualties, including women and children',
                    'ar' => 'قامت اسرائيل بعملية عسكرية على قطاع غزة حيث استهدفت المدنيين في بيوتهم و وقع ضحايا من ضمنهم نساء و اطفال' ,
                ],
                'mission_duration' => '2' ,
                'mission_type' => 'attack' ,
                'comments' => [
                    'en' => ['All support for Palestine and Gaza'] ,
                    'ar' => [' كل الدعم لفلسطين وغزة'] ,
                ],
                'mission_stars' => '20' ,
                'is_active' => 1 ,
            ],
            // [

            // ],
            // [

            // ],
            // [

            // ],
            // [

            // ],
        ];
    }
}
