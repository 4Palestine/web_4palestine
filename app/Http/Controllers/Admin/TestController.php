<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Mission;
use App\Models\User;
use Illuminate\Http\Request;

class TestController extends Controller
{
    // public function test_mission_done(){
    //     $user = User::find(1);
    //     $mission = Mission::find(1);
    //     $user->missions()->syncWithoutDetaching($mission->id, ['platform_id' => $mission->platform->id , 'stars' => $mission->mission_stars ]);
    //     return redirect()->route('dashboard')->with('success', 'Mission Done Successfully');
    //     // {{ $mission->pivot->stars }} //  stars هاد الطريقة عشان تجيب قيمة ال

    //     // relation in model من هان فممكن اجيبها من ال stars في طريقة تانية بدال ما اجيب قيمة ال
    //     // ->withPivot('stars'); وذلك بكتابة

    //     // stars > 5 وليكن مثلا بدك قيمة ال  pivot لو بدك تفحص قيمة ال
    //     // ->wherePivot('stars', '>', 5);
    //     // منفصلة وبتصير تستدعيها وقت الحاجة relation بتعمل هاد في
    // }
}
