<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Traits\ApiResponses;
use App\Models\Mission;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class UserMissionController extends Controller
{
    use ApiResponses;

    public function mission_done($mission_id) {
        $user = User::find(auth()->user()->id);
        $mission = Mission::find($mission_id);

        $user->missions()->syncWithoutDetaching([$mission->id => ['platform_id' => $mission->platform->id, 'stars' => $mission->mission_stars]]);

        return $this->tiny_success(status: true, code: 200, message: "Mission Done Successfully");

        // {{ $mission->pivot->stars }} //  stars هاد الطريقة عشان تجيب قيمة ال

        // relation in model من هان فممكن اجيبها من ال stars في طريقة تانية بدال ما اجيب قيمة ال
        // ->withPivot('stars'); وذلك بكتابة

        // stars > 5 وليكن مثلا بدك قيمة ال  pivot لو بدك تفحص قيمة ال
        // ->wherePivot('stars', '>', 5);
        // منفصلة وبتصير تستدعيها وقت الحاجة relation بتعمل هاد في

    }



    // علشان تجيب مجموع النجوم الكلي لمستخدم معين
    public function total_stars_of_user($user_id){
        $user = User::find($user_id);
        $missions = $user->missions()->get();
        $total_stars = $missions->sum(function ($mission) {
            return $mission->pivot->stars;
        });

        return $this->success(status: true, code: 200, message: "total stars of user: " . $user->name . " returned successfully", data: $total_stars);

    }




    public function top_10_last_week(){
        // Get the date from one week ago
        $week_ago = Carbon::now()->subWeek();
        // $month_ago = Carbon::now()->subMonth();

        // Get all missions with stars in the last week
        $missions = Mission::where('created_at', '>=', $week_ago)->wherePivot('stars', '>', 0)->get();

        // $missions = Mission::join('mission_user', 'missions.id', '=', 'mission_user.mission_id')
        // ->where('mission_user.stars', '>', 0)
        // ->get();

        // Group missions by user and sum the stars for each user
        $user_stars = $missions->groupBy('users.id')->map(function ($group) {
            return $group->sum('pivot.stars');
        });


        // Sort users by total stars in descending order and take the top 10
        $top_users = User::whereIn('id', $user_stars->keys())->orderByDesc(function ($user) use ($user_stars) {
            return $user_stars[$user->id];
        })->take(10)->get();

        return $this->success(status: true, code: 200, message: "top 10 users returned successfully", data: $top_users);

    }
}
