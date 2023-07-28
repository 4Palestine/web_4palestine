<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
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
        $data['platforms_count'] = Cache::remember('dashboard-platforms-count', now()->addMinutes(10), function () {
            return DB::table('platforms')->count();
        });
        $data['missions_count'] = Cache::remember('dashboard-missions-count', now()->addMinutes(10), function () {
            return DB::table('missions')->count();
        });
        $data['missions_count'] = Cache::remember('dashboard-missions-count', now()->addMinutes(10), function () {
            return DB::table('missions')->count();
        });

        $data['contacts'] = Contact::orderBy('id','DESC')->get();

        $data['users_increasing_percentage'] = Cache::remember('users-increasing-percentage', now()->addMinutes(10), function () use ($data) {
            $currentCount = $data['users_count'];
            $previousCount = User::where('created_at', '<', now()->subDays(7))->count();
            if ($previousCount != 0) {
                $increase = $currentCount - $previousCount;
                $percentage = ($increase / $previousCount) * 100;
            } else {
                $percentage = 0;
            }

            return $percentage;
        });





        return view('dashboard', $data);
    }
}
