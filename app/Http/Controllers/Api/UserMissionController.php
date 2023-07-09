<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Traits\ApiResponses;
use App\Models\Mission;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserMissionController extends Controller
{
    use ApiResponses;

    public function mission_done($mission_id)
    {
        $user = User::find(auth()->user()->id);
        $mission = Mission::where('id', $mission_id)->where('is_active', 1)->first();

        if (!$mission) {
            return $this->tiny_fail(status: false, code: 403, message: 'this mission does not exist');
        }
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
    public function total_stars_of_user($user_id)
    {
        $user = User::find($user_id);
        $missions = $user->missions()->get();
        $total_stars = $missions->sum(function ($mission) {
            return $mission->pivot->stars;
        });

        return $this->success(status: true, code: 200, message: "total stars of user: " . $user->name . " returned successfully", data: $total_stars);
    }


    public function top_10_last_month()
    {
        $month_ago = Carbon::now()->subMonth();


        // Get the top 10 users with the maximum stars in the last week
        $top_users = User::select('users.id', 'users.name', 'users.country', 'users.avatar', DB::raw('SUM(mission_user.stars) as total_stars'))
            ->join('mission_user', 'users.id', '=', 'mission_user.user_id')
            ->where('mission_user.created_at', '>=', $month_ago)
            ->groupBy('users.id')
            ->orderByDesc('total_stars')
            ->take(10)
            ->get();


        return $this->success(status: true, code: 200, message: "top 10 users returned successfully", data: $top_users);
    }

}
