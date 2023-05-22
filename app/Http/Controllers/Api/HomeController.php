<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\Api\HomeResource;
use App\Models\Platform;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home()
    {

        $platforms = Platform::active()->with(['missions' => function ($query) {
            $query->select('id', 'slug', 'platform_id', 'image', 'mission_link', 'description', 'mission_duration', 'mission_type', 'tags', 'comments', 'mission_stars')
                    ->active()
                    ->whereNull('deleted_at');
                    // ->take(3);
        }])
        ->withTrashed()
        ->get(['id', 'slug', 'name', 'image', 'description']);

        $data['platforms'] = HomeResource::collection($platforms);

        return response()->json($data);
    }
}
