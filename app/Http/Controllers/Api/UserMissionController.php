<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Traits\ApiResponses;
use App\Models\Mission;
use App\Models\MissionUser;
use App\Models\User;
use App\Models\UserStar;
use Carbon\Carbon;
use Exception;
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
            return $this->tiny_fail(status: false, code: 403, message: __('messages.mission_not_exist'));
        }


        try {
            DB::beginTransaction();

            if (!$user->missions->contains($mission->id)) {
                $existingStars = UserStar::where('user_id', $user->id)->value('stars');

                UserStar::updateOrInsert(['user_id' => $user->id], [
                    'user_id' => $user->id,
                    'stars' =>  $existingStars + $mission->mission_stars,
                    'updated_at' => now()
                ]);

                $user->missions()->syncWithoutDetaching([$mission->id => ['platform_id' => $mission->platform->id, 'stars' => $mission->mission_stars]]);
            } else {
                return $this->tiny_success(status: true, code: 200, message: __('messages.done_mission_before'));
            }
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            return $this->tiny_success(status: true, code: 200, message: __('messages.something_wrong'));
        }




        return $this->tiny_success(status: true, code: 200, message: __('messages.mission_done_successfully'));

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
        $total_stars = DB::table('user_stars')->select('stars')->where('user_id', $user_id)->get();

        return $this->success(status: true, code: 200, message: __('messages.total_stars'), data: $total_stars);
    }


    public function top_10_last_month()
    {

        // 1- get all rows from mission_user where (created_at > month ago)
        // 2- group them by user_id
        // 3- get the sum of stars
        // 4- get the user data depending on user_id

        $oneMonthAgo = now()->subMonth(); // Get the date one month ago from the current date

        $topUsers = MissionUser::with(['user' => function ($query) {
            $query->select('id', 'name', 'email', 'avatar');
        }])
            ->select('user_id', DB::raw('SUM(stars) as stars'))
            ->orderBy('stars', 'desc')
            ->where('created_at', '>=', $oneMonthAgo)
            ->groupBy('user_id')
            ->get();

        $responseData = [];

        foreach ($topUsers as $topUser) {
            $userData = [
                'user' => $topUser->user, // Includes the full user object with all attributes
                'stars' => (int)$topUser->stars,
            ];

            $responseData[] = $userData;
        }


        return $this->success(status: true, code: 200, message: __('messages.top_10'), data: $responseData);
    }


    public function top_10_all_time()
    {
        $users = UserStar::with(['user' => function ($query) {
            $query->select('id', 'name', 'email', 'avatar'); // Specify the columns you want to select from the users table
        }])
            ->select('user_id', 'stars')
            ->orderBy('stars', 'desc')
            ->limit(10)
            ->get();
        return $this->success(status: true, code: 200, message: __('messages.top_10'), data: $users);
    }
}
