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
                'tags' => json_encode([
                    'like' , 'comment' , 'share' , 'report'
                ]),
                'mission_duration' => '2' ,
                'mission_type' => 'attack' ,
                'comments' => [
                    'en' => ['All support for Palestine and Gaza'] ,
                    'ar' => [' كل الدعم لفلسطين وغزة'] ,
                ],
                'mission_stars' => '20' ,
                'is_active' => 1 ,
            ],
            [
                'slug'=>'mission-two',
                'platform_id'=> 1 ,
                'image'=> 'uploads/one.jpg' ,
                'mission_link'=> 'https://twitter.com/netanyahu/status/1655785140914626560?cxt=HHwWgICxyYP0w_otAAAA',
                'description' => [
                    'en' => 'Israel carried out a military operation in the Gaza Strip, targeting civilians in their homes, causing casualties, including women and children',
                    'ar' => 'قامت اسرائيل بعملية عسكرية على قطاع غزة حيث استهدفت المدنيين في بيوتهم و وقع ضحايا من ضمنهم نساء و اطفال' ,
                ],
                'tags' => json_encode([
                    'like' , 'comment' , 'share' , 'report'
                ]),
                'mission_duration' => '3' ,
                'mission_type' => 'support' ,
                'comments' => [
                    'en' => ['All support for Palestine and Gaza'] ,
                    'ar' => [' كل الدعم لفلسطين وغزة'] ,
                ],
                'mission_stars' => '15' ,
                'is_active' => 1 ,
            ],
            [
                'slug'=>'mission-three',
                'platform_id'=> 1 ,
                'image'=> 'uploads/one.jpg' ,
                'mission_link'=> 'https://twitter.com/netanyahu/status/1655785140914626560?cxt=HHwWgICxyYP0w_otAAAA',
                'description' => [
                    'en' => 'Israel carried out a military operation in the Gaza Strip, targeting civilians in their homes, causing casualties, including women and children',
                    'ar' => 'قامت اسرائيل بعملية عسكرية على قطاع غزة حيث استهدفت المدنيين في بيوتهم و وقع ضحايا من ضمنهم نساء و اطفال' ,
                ],
                'tags' => json_encode([
                    'like' , 'comment' , 'share' , 'report'
                ]),
                'mission_duration' => '1' ,
                'mission_type' => 'attack' ,
                'comments' => [
                    'en' => ['All support for Palestine and Gaza'] ,
                    'ar' => [' كل الدعم لفلسطين وغزة'] ,
                ],
                'mission_stars' => '12' ,
                'is_active' => 1 ,
            ],
            [
                'slug'=>'mission-four',
                'platform_id'=> 1 ,
                'image'=> 'uploads/one.jpg' ,
                'mission_link'=> 'https://twitter.com/netanyahu/status/1655785140914626560?cxt=HHwWgICxyYP0w_otAAAA',
                'description' => [
                    'en' => 'Israel carried out a military operation in the Gaza Strip, targeting civilians in their homes, causing casualties, including women and children',
                    'ar' => 'قامت اسرائيل بعملية عسكرية على قطاع غزة حيث استهدفت المدنيين في بيوتهم و وقع ضحايا من ضمنهم نساء و اطفال' ,
                ],
                'tags' => json_encode([
                    'like' , 'comment' , 'share' , 'report'
                ]),
                'mission_duration' => '5' ,
                'mission_type' => 'support' ,
                'comments' => [
                    'en' => ['All support for Palestine and Gaza'] ,
                    'ar' => [' كل الدعم لفلسطين وغزة'] ,
                ],
                'mission_stars' => '25' ,
                'is_active' => 1 ,
            ],
            [
                'slug'=>'mission-five',
                'platform_id'=> 1 ,
                'image'=> 'uploads/one.jpg' ,
                'mission_link'=> 'https://twitter.com/netanyahu/status/1655785140914626560?cxt=HHwWgICxyYP0w_otAAAA',
                'description' => [
                    'en' => 'Israel carried out a military operation in the Gaza Strip, targeting civilians in their homes, causing casualties, including women and children',
                    'ar' => 'قامت اسرائيل بعملية عسكرية على قطاع غزة حيث استهدفت المدنيين في بيوتهم و وقع ضحايا من ضمنهم نساء و اطفال' ,
                ],
                'tags' => json_encode([
                    'like' , 'comment' , 'share' , 'report'
                ]),
                'mission_duration' => '4' ,
                'mission_type' => 'attack' ,
                'comments' => [
                    'en' => ['All support for Palestine and Gaza'] ,
                    'ar' => [' كل الدعم لفلسطين وغزة'] ,
                ],
                'mission_stars' => '10' ,
                'is_active' => 1 ,
            ],
            [
                'slug'=>'mission-six',
                'platform_id'=> 2 ,
                'image'=> 'uploads/one.jpg' ,
                'mission_link'=> 'https://twitter.com/netanyahu/status/1655785140914626560?cxt=HHwWgICxyYP0w_otAAAA',
                'description' => [
                    'en' => 'Israel carried out a military operation in the Gaza Strip, targeting civilians in their homes, causing casualties, including women and children',
                    'ar' => 'قامت اسرائيل بعملية عسكرية على قطاع غزة حيث استهدفت المدنيين في بيوتهم و وقع ضحايا من ضمنهم نساء و اطفال' ,
                ],
                'tags' => json_encode([
                    'like' , 'comment' , 'share' , 'report'
                ]),
                'mission_duration' => '2' ,
                'mission_type' => 'attack' ,
                'comments' => [
                    'en' => ['All support for Palestine and Gaza'] ,
                    'ar' => [' كل الدعم لفلسطين وغزة'] ,
                ],
                'mission_stars' => '20' ,
                'is_active' => 1 ,
            ],
            [
                'slug'=>'mission-seven',
                'platform_id'=> 2 ,
                'image'=> 'uploads/one.jpg' ,
                'mission_link'=> 'https://twitter.com/netanyahu/status/1655785140914626560?cxt=HHwWgICxyYP0w_otAAAA',
                'description' => [
                    'en' => 'Israel carried out a military operation in the Gaza Strip, targeting civilians in their homes, causing casualties, including women and children',
                    'ar' => 'قامت اسرائيل بعملية عسكرية على قطاع غزة حيث استهدفت المدنيين في بيوتهم و وقع ضحايا من ضمنهم نساء و اطفال' ,
                ],
                'tags' => json_encode([
                    'like' , 'comment' , 'share' , 'report'
                ]),
                'mission_duration' => '3' ,
                'mission_type' => 'support' ,
                'comments' => [
                    'en' => ['All support for Palestine and Gaza'] ,
                    'ar' => [' كل الدعم لفلسطين وغزة'] ,
                ],
                'mission_stars' => '15' ,
                'is_active' => 1 ,
            ],
            [
                'slug'=>'mission-eight',
                'platform_id'=> 2 ,
                'image'=> 'uploads/one.jpg' ,
                'mission_link'=> 'https://twitter.com/netanyahu/status/1655785140914626560?cxt=HHwWgICxyYP0w_otAAAA',
                'description' => [
                    'en' => 'Israel carried out a military operation in the Gaza Strip, targeting civilians in their homes, causing casualties, including women and children',
                    'ar' => 'قامت اسرائيل بعملية عسكرية على قطاع غزة حيث استهدفت المدنيين في بيوتهم و وقع ضحايا من ضمنهم نساء و اطفال' ,
                ],
                'tags' => json_encode([
                    'like' , 'comment' , 'share' , 'report'
                ]),
                'mission_duration' => '1' ,
                'mission_type' => 'attack' ,
                'comments' => [
                    'en' => ['All support for Palestine and Gaza'] ,
                    'ar' => [' كل الدعم لفلسطين وغزة'] ,
                ],
                'mission_stars' => '12' ,
                'is_active' => 1 ,
            ],
            [
                'slug'=>'mission-nine',
                'platform_id'=> 2 ,
                'image'=> 'uploads/one.jpg' ,
                'mission_link'=> 'https://twitter.com/netanyahu/status/1655785140914626560?cxt=HHwWgICxyYP0w_otAAAA',
                'description' => [
                    'en' => 'Israel carried out a military operation in the Gaza Strip, targeting civilians in their homes, causing casualties, including women and children',
                    'ar' => 'قامت اسرائيل بعملية عسكرية على قطاع غزة حيث استهدفت المدنيين في بيوتهم و وقع ضحايا من ضمنهم نساء و اطفال' ,
                ],
                'tags' => json_encode([
                    'like' , 'comment' , 'share' , 'report'
                ]),
                'mission_duration' => '5' ,
                'mission_type' => 'support' ,
                'comments' => [
                    'en' => ['All support for Palestine and Gaza'] ,
                    'ar' => [' كل الدعم لفلسطين وغزة'] ,
                ],
                'mission_stars' => '25' ,
                'is_active' => 1 ,
            ],
            [
                'slug'=>'mission-ten',
                'platform_id'=> 2 ,
                'image'=> 'uploads/one.jpg' ,
                'mission_link'=> 'https://twitter.com/netanyahu/status/1655785140914626560?cxt=HHwWgICxyYP0w_otAAAA',
                'description' => [
                    'en' => 'Israel carried out a military operation in the Gaza Strip, targeting civilians in their homes, causing casualties, including women and children',
                    'ar' => 'قامت اسرائيل بعملية عسكرية على قطاع غزة حيث استهدفت المدنيين في بيوتهم و وقع ضحايا من ضمنهم نساء و اطفال' ,
                ],
                'tags' => json_encode([
                    'like' , 'comment' , 'share' , 'report'
                ]),
                'mission_duration' => '4' ,
                'mission_type' => 'attack' ,
                'comments' => [
                    'en' => ['All support for Palestine and Gaza'] ,
                    'ar' => [' كل الدعم لفلسطين وغزة'] ,
                ],
                'mission_stars' => '10' ,
                'is_active' => 1 ,
            ],
            [
                'slug'=>'mission-eleventh',
                'platform_id'=> 3 ,
                'image'=> 'uploads/one.jpg' ,
                'mission_link'=> 'https://twitter.com/netanyahu/status/1655785140914626560?cxt=HHwWgICxyYP0w_otAAAA',
                'description' => [
                    'en' => 'Israel carried out a military operation in the Gaza Strip, targeting civilians in their homes, causing casualties, including women and children',
                    'ar' => 'قامت اسرائيل بعملية عسكرية على قطاع غزة حيث استهدفت المدنيين في بيوتهم و وقع ضحايا من ضمنهم نساء و اطفال' ,
                ],
                'tags' => json_encode([
                    'like' , 'comment' , 'tweet' , 'retweet' , 'report'
                ]),
                'mission_duration' => '2' ,
                'mission_type' => 'attack' ,
                'comments' => [
                    'en' => ['All support for Palestine and Gaza'] ,
                    'ar' => [' كل الدعم لفلسطين وغزة'] ,
                ],
                'mission_stars' => '20' ,
                'is_active' => 1 ,
            ],
            [
                'slug'=>'mission-twelveth',
                'platform_id'=> 3 ,
                'image'=> 'uploads/one.jpg' ,
                'mission_link'=> 'https://twitter.com/netanyahu/status/1655785140914626560?cxt=HHwWgICxyYP0w_otAAAA',
                'description' => [
                    'en' => 'Israel carried out a military operation in the Gaza Strip, targeting civilians in their homes, causing casualties, including women and children',
                    'ar' => 'قامت اسرائيل بعملية عسكرية على قطاع غزة حيث استهدفت المدنيين في بيوتهم و وقع ضحايا من ضمنهم نساء و اطفال' ,
                ],
                'tags' => json_encode([
                    'like' , 'comment' , 'tweet' , 'retweet' , 'report'
                ]),
                'mission_duration' => '3' ,
                'mission_type' => 'support' ,
                'comments' => [
                    'en' => ['All support for Palestine and Gaza'] ,
                    'ar' => [' كل الدعم لفلسطين وغزة'] ,
                ],
                'mission_stars' => '15' ,
                'is_active' => 1 ,
            ],
            [
                'slug'=>'mission-thirteenth',
                'platform_id'=> 3 ,
                'image'=> 'uploads/one.jpg' ,
                'mission_link'=> 'https://twitter.com/netanyahu/status/1655785140914626560?cxt=HHwWgICxyYP0w_otAAAA',
                'description' => [
                    'en' => 'Israel carried out a military operation in the Gaza Strip, targeting civilians in their homes, causing casualties, including women and children',
                    'ar' => 'قامت اسرائيل بعملية عسكرية على قطاع غزة حيث استهدفت المدنيين في بيوتهم و وقع ضحايا من ضمنهم نساء و اطفال' ,
                ],
                'tags' => json_encode([
                    'like' , 'comment' , 'tweet' , 'retweet' , 'report'
                ]),
                'mission_duration' => '1' ,
                'mission_type' => 'attack' ,
                'comments' => [
                    'en' => ['All support for Palestine and Gaza'] ,
                    'ar' => [' كل الدعم لفلسطين وغزة'] ,
                ],
                'mission_stars' => '12' ,
                'is_active' => 1 ,
            ],
            [
                'slug'=>'mission-fourteenth',
                'platform_id'=> 3 ,
                'image'=> 'uploads/one.jpg' ,
                'mission_link'=> 'https://twitter.com/netanyahu/status/1655785140914626560?cxt=HHwWgICxyYP0w_otAAAA',
                'description' => [
                    'en' => 'Israel carried out a military operation in the Gaza Strip, targeting civilians in their homes, causing casualties, including women and children',
                    'ar' => 'قامت اسرائيل بعملية عسكرية على قطاع غزة حيث استهدفت المدنيين في بيوتهم و وقع ضحايا من ضمنهم نساء و اطفال' ,
                ],
                'tags' => json_encode([
                    'like' , 'comment' , 'tweet' , 'retweet' , 'report'
                ]),
                'mission_duration' => '5' ,
                'mission_type' => 'support' ,
                'comments' => [
                    'en' => ['All support for Palestine and Gaza'] ,
                    'ar' => [' كل الدعم لفلسطين وغزة'] ,
                ],
                'mission_stars' => '25' ,
                'is_active' => 1 ,
            ],
            [
                'slug'=>'mission-fifteenth',
                'platform_id'=> 3 ,
                'image'=> 'uploads/one.jpg' ,
                'mission_link'=> 'https://twitter.com/netanyahu/status/1655785140914626560?cxt=HHwWgICxyYP0w_otAAAA',
                'description' => [
                    'en' => 'Israel carried out a military operation in the Gaza Strip, targeting civilians in their homes, causing casualties, including women and children',
                    'ar' => 'قامت اسرائيل بعملية عسكرية على قطاع غزة حيث استهدفت المدنيين في بيوتهم و وقع ضحايا من ضمنهم نساء و اطفال' ,
                ],
                'tags' => json_encode([
                    'like' , 'comment' , 'tweet' , 'retweet' , 'report'
                ]),
                'mission_duration' => '4' ,
                'mission_type' => 'attack' ,
                'comments' => [
                    'en' => ['All support for Palestine and Gaza'] ,
                    'ar' => [' كل الدعم لفلسطين وغزة'] ,
                ],
                'mission_stars' => '10' ,
                'is_active' => 1 ,
            ],
            [
                'slug'=>'mission-sixteen',
                'platform_id'=> 4 ,
                'image'=> 'uploads/one.jpg' ,
                'mission_link'=> 'https://twitter.com/netanyahu/status/1655785140914626560?cxt=HHwWgICxyYP0w_otAAAA',
                'description' => [
                    'en' => 'Israel carried out a military operation in the Gaza Strip, targeting civilians in their homes, causing casualties, including women and children',
                    'ar' => 'قامت اسرائيل بعملية عسكرية على قطاع غزة حيث استهدفت المدنيين في بيوتهم و وقع ضحايا من ضمنهم نساء و اطفال' ,
                ],
                'tags' => json_encode([
                    'like' , 'comment' , 'report'
                ]),
                'mission_duration' => '2' ,
                'mission_type' => 'attack' ,
                'comments' => [
                    'en' => ['All support for Palestine and Gaza'] ,
                    'ar' => [' كل الدعم لفلسطين وغزة'] ,
                ],
                'mission_stars' => '20' ,
                'is_active' => 1 ,
            ],
            [
                'slug'=>'mission-seventeenth',
                'platform_id'=> 4 ,
                'image'=> 'uploads/one.jpg' ,
                'mission_link'=> 'https://twitter.com/netanyahu/status/1655785140914626560?cxt=HHwWgICxyYP0w_otAAAA',
                'description' => [
                    'en' => 'Israel carried out a military operation in the Gaza Strip, targeting civilians in their homes, causing casualties, including women and children',
                    'ar' => 'قامت اسرائيل بعملية عسكرية على قطاع غزة حيث استهدفت المدنيين في بيوتهم و وقع ضحايا من ضمنهم نساء و اطفال' ,
                ],
                'tags' => json_encode([
                    'like' , 'comment' , 'report'
                ]),
                'mission_duration' => '3' ,
                'mission_type' => 'support' ,
                'comments' => [
                    'en' => ['All support for Palestine and Gaza'] ,
                    'ar' => [' كل الدعم لفلسطين وغزة'] ,
                ],
                'mission_stars' => '15' ,
                'is_active' => 1 ,
            ],
            [
                'slug'=>'mission-eighteen',
                'platform_id'=> 4 ,
                'image'=> 'uploads/one.jpg' ,
                'mission_link'=> 'https://twitter.com/netanyahu/status/1655785140914626560?cxt=HHwWgICxyYP0w_otAAAA',
                'description' => [
                    'en' => 'Israel carried out a military operation in the Gaza Strip, targeting civilians in their homes, causing casualties, including women and children',
                    'ar' => 'قامت اسرائيل بعملية عسكرية على قطاع غزة حيث استهدفت المدنيين في بيوتهم و وقع ضحايا من ضمنهم نساء و اطفال' ,
                ],
                'tags' => json_encode([
                    'like' , 'comment' , 'report'
                ]),
                'mission_duration' => '1' ,
                'mission_type' => 'attack' ,
                'comments' => [
                    'en' => ['All support for Palestine and Gaza'] ,
                    'ar' => [' كل الدعم لفلسطين وغزة'] ,
                ],
                'mission_stars' => '12' ,
                'is_active' => 1 ,
            ],
            [
                'slug'=>'mission-nineteenth',
                'platform_id'=> 4 ,
                'image'=> 'uploads/one.jpg' ,
                'mission_link'=> 'https://twitter.com/netanyahu/status/1655785140914626560?cxt=HHwWgICxyYP0w_otAAAA',
                'description' => [
                    'en' => 'Israel carried out a military operation in the Gaza Strip, targeting civilians in their homes, causing casualties, including women and children',
                    'ar' => 'قامت اسرائيل بعملية عسكرية على قطاع غزة حيث استهدفت المدنيين في بيوتهم و وقع ضحايا من ضمنهم نساء و اطفال' ,
                ],
                'tags' => json_encode([
                    'like' , 'comment' , 'report'
                ]),
                'mission_duration' => '5' ,
                'mission_type' => 'support' ,
                'comments' => [
                    'en' => ['All support for Palestine and Gaza'] ,
                    'ar' => [' كل الدعم لفلسطين وغزة'] ,
                ],
                'mission_stars' => '25' ,
                'is_active' => 1 ,
            ],
            [
                'slug'=>'mission-twentieth',
                'platform_id'=> 5 ,
                'image'=> 'uploads/one.jpg' ,
                'mission_link'=> 'https://twitter.com/netanyahu/status/1655785140914626560?cxt=HHwWgICxyYP0w_otAAAA',
                'description' => [
                    'en' => 'Israel carried out a military operation in the Gaza Strip, targeting civilians in their homes, causing casualties, including women and children',
                    'ar' => 'قامت اسرائيل بعملية عسكرية على قطاع غزة حيث استهدفت المدنيين في بيوتهم و وقع ضحايا من ضمنهم نساء و اطفال' ,
                ],
                'tags' => json_encode([
                    'like' , 'comment' , 'report'
                ]),
                'mission_duration' => '4' ,
                'mission_type' => 'attack' ,
                'comments' => [
                    'en' => ['All support for Palestine and Gaza'] ,
                    'ar' => [' كل الدعم لفلسطين وغزة'] ,
                ],
                'mission_stars' => '10' ,
                'is_active' => 1 ,
            ],
            [
                'slug'=>'mission-twenty-one',
                'platform_id'=> 5 ,
                'image'=> 'uploads/one.jpg' ,
                'mission_link'=> 'https://twitter.com/netanyahu/status/1655785140914626560?cxt=HHwWgICxyYP0w_otAAAA',
                'description' => [
                    'en' => 'Israel carried out a military operation in the Gaza Strip, targeting civilians in their homes, causing casualties, including women and children',
                    'ar' => 'قامت اسرائيل بعملية عسكرية على قطاع غزة حيث استهدفت المدنيين في بيوتهم و وقع ضحايا من ضمنهم نساء و اطفال' ,
                ],
                'tags' => json_encode([
                    'like' , 'comment' , 'report'
                ]),
                'mission_duration' => '2' ,
                'mission_type' => 'attack' ,
                'comments' => [
                    'en' => ['All support for Palestine and Gaza'] ,
                    'ar' => [' كل الدعم لفلسطين وغزة'] ,
                ],
                'mission_stars' => '20' ,
                'is_active' => 1 ,
            ],
            [
                'slug'=>'mission-twenty-tow',
                'platform_id'=> 5 ,
                'image'=> 'uploads/one.jpg' ,
                'mission_link'=> 'https://twitter.com/netanyahu/status/1655785140914626560?cxt=HHwWgICxyYP0w_otAAAA',
                'description' => [
                    'en' => 'Israel carried out a military operation in the Gaza Strip, targeting civilians in their homes, causing casualties, including women and children',
                    'ar' => 'قامت اسرائيل بعملية عسكرية على قطاع غزة حيث استهدفت المدنيين في بيوتهم و وقع ضحايا من ضمنهم نساء و اطفال' ,
                ],
                'tags' => json_encode([
                    'like' , 'comment' , 'report'
                ]),
                'mission_duration' => '3' ,
                'mission_type' => 'support' ,
                'comments' => [
                    'en' => ['All support for Palestine and Gaza'] ,
                    'ar' => [' كل الدعم لفلسطين وغزة'] ,
                ],
                'mission_stars' => '15' ,
                'is_active' => 1 ,
            ],
            [
                'slug'=>'mission-twenty-third',
                'platform_id'=> 5 ,
                'image'=> 'uploads/one.jpg' ,
                'mission_link'=> 'https://twitter.com/netanyahu/status/1655785140914626560?cxt=HHwWgICxyYP0w_otAAAA',
                'description' => [
                    'en' => 'Israel carried out a military operation in the Gaza Strip, targeting civilians in their homes, causing casualties, including women and children',
                    'ar' => 'قامت اسرائيل بعملية عسكرية على قطاع غزة حيث استهدفت المدنيين في بيوتهم و وقع ضحايا من ضمنهم نساء و اطفال' ,
                ],
                'tags' => json_encode([
                    'like' , 'comment' , 'report'
                ]),
                'mission_duration' => '1' ,
                'mission_type' => 'attack' ,
                'comments' => [
                    'en' => ['All support for Palestine and Gaza'] ,
                    'ar' => [' كل الدعم لفلسطين وغزة'] ,
                ],
                'mission_stars' => '12' ,
                'is_active' => 1 ,
            ],
            [
                'slug'=>'mission-twenty-fourth',
                'platform_id'=> 5 ,
                'image'=> 'uploads/one.jpg' ,
                'mission_link'=> 'https://twitter.com/netanyahu/status/1655785140914626560?cxt=HHwWgICxyYP0w_otAAAA',
                'description' => [
                    'en' => 'Israel carried out a military operation in the Gaza Strip, targeting civilians in their homes, causing casualties, including women and children',
                    'ar' => 'قامت اسرائيل بعملية عسكرية على قطاع غزة حيث استهدفت المدنيين في بيوتهم و وقع ضحايا من ضمنهم نساء و اطفال' ,
                ],
                'tags' => json_encode([
                    'like' , 'comment' , 'report'
                ]),
                'mission_duration' => '5' ,
                'mission_type' => 'support' ,
                'comments' => [
                    'en' => ['All support for Palestine and Gaza'] ,
                    'ar' => [' كل الدعم لفلسطين وغزة'] ,
                ],
                'mission_stars' => '25' ,
                'is_active' => 1 ,
            ],
            [
                'slug'=>'mission-twenty-five',
                'platform_id'=>  5,
                'image'=> 'uploads/one.jpg' ,
                'mission_link'=> 'https://twitter.com/netanyahu/status/1655785140914626560?cxt=HHwWgICxyYP0w_otAAAA',
                'description' => [
                    'en' => 'Israel carried out a military operation in the Gaza Strip, targeting civilians in their homes, causing casualties, including women and children',
                    'ar' => 'قامت اسرائيل بعملية عسكرية على قطاع غزة حيث استهدفت المدنيين في بيوتهم و وقع ضحايا من ضمنهم نساء و اطفال' ,
                ],
                'tags' => json_encode([
                    'like' , 'comment' , 'report'
                ]),
                'mission_duration' => '4' ,
                'mission_type' => 'attack' ,
                'comments' => [
                    'en' => ['All support for Palestine and Gaza'] ,
                    'ar' => [' كل الدعم لفلسطين وغزة'] ,
                ],
                'mission_stars' => '10' ,
                'is_active' => 1 ,
            ],
            [
                'slug'=>'mission-twenty-six',
                'platform_id'=> 6 ,
                'image'=> 'uploads/one.jpg' ,
                'mission_link'=> 'https://twitter.com/netanyahu/status/1655785140914626560?cxt=HHwWgICxyYP0w_otAAAA',
                'description' => [
                    'en' => 'Israel carried out a military operation in the Gaza Strip, targeting civilians in their homes, causing casualties, including women and children',
                    'ar' => 'قامت اسرائيل بعملية عسكرية على قطاع غزة حيث استهدفت المدنيين في بيوتهم و وقع ضحايا من ضمنهم نساء و اطفال' ,
                ],
                'mission_duration' => '4' ,
                'mission_type' => 'attack' ,
                'comments' => [
                    'en' => ['All support for Palestine and Gaza'] ,
                    'ar' => [' كل الدعم لفلسطين وغزة'] ,
                ],
                'mission_stars' => '10' ,
                'is_active' => 1 ,
            ],
            [
                'slug'=>'mission-twenty-seven',
                'platform_id'=> 6 ,
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
            [
                'slug'=>'mission-twenty-eight',
                'platform_id'=> 6 ,
                'image'=> 'uploads/one.jpg' ,
                'mission_link'=> 'https://twitter.com/netanyahu/status/1655785140914626560?cxt=HHwWgICxyYP0w_otAAAA',
                'description' => [
                    'en' => 'Israel carried out a military operation in the Gaza Strip, targeting civilians in their homes, causing casualties, including women and children',
                    'ar' => 'قامت اسرائيل بعملية عسكرية على قطاع غزة حيث استهدفت المدنيين في بيوتهم و وقع ضحايا من ضمنهم نساء و اطفال' ,
                ],
                'mission_duration' => '3' ,
                'mission_type' => 'support' ,
                'comments' => [
                    'en' => ['All support for Palestine and Gaza'] ,
                    'ar' => [' كل الدعم لفلسطين وغزة'] ,
                ],
                'mission_stars' => '15' ,
                'is_active' => 1 ,
            ],
            [
                'slug'=>'mission-twenty-nine',
                'platform_id'=> 6 ,
                'image'=> 'uploads/one.jpg' ,
                'mission_link'=> 'https://twitter.com/netanyahu/status/1655785140914626560?cxt=HHwWgICxyYP0w_otAAAA',
                'description' => [
                    'en' => 'Israel carried out a military operation in the Gaza Strip, targeting civilians in their homes, causing casualties, including women and children',
                    'ar' => 'قامت اسرائيل بعملية عسكرية على قطاع غزة حيث استهدفت المدنيين في بيوتهم و وقع ضحايا من ضمنهم نساء و اطفال' ,
                ],
                'mission_duration' => '1' ,
                'mission_type' => 'attack' ,
                'comments' => [
                    'en' => ['All support for Palestine and Gaza'] ,
                    'ar' => [' كل الدعم لفلسطين وغزة'] ,
                ],
                'mission_stars' => '12' ,
                'is_active' => 1 ,
            ],
            [
                'slug'=>'mission-thirtieth',
                'platform_id'=> 6 ,
                'image'=> 'uploads/one.jpg' ,
                'mission_link'=> 'https://twitter.com/netanyahu/status/1655785140914626560?cxt=HHwWgICxyYP0w_otAAAA',
                'description' => [
                    'en' => 'Israel carried out a military operation in the Gaza Strip, targeting civilians in their homes, causing casualties, including women and children',
                    'ar' => 'قامت اسرائيل بعملية عسكرية على قطاع غزة حيث استهدفت المدنيين في بيوتهم و وقع ضحايا من ضمنهم نساء و اطفال' ,
                ],
                'mission_duration' => '5' ,
                'mission_type' => 'support' ,
                'comments' => [
                    'en' => ['All support for Palestine and Gaza'] ,
                    'ar' => [' كل الدعم لفلسطين وغزة'] ,
                ],
                'mission_stars' => '25' ,
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
