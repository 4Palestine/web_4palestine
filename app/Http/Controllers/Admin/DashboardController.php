<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index() {

        $data['users_count'] = Cache::remember('dashboard-users-count', now()->addMinutes(10), function () {
            return DB::table('users')->count();
        });

        $currentCount = $data['users_count'];
        $previousCount = User::where('created_at', '<', now()->subDays(7))->count();

        if ($previousCount != 0) {
            $increase = $currentCount - $previousCount;
            $percentage = ($increase / $previousCount) * 100;
        } else {
            $percentage = 0;
        }


        $data['users_increasing_percentage'] = $percentage;



        return view('dashboard', $data);
    }
}
