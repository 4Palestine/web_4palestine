<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Base5Controller;
use App\Http\Resources\PlatformResource;
use App\Http\Resources\TagResource;
use App\Models\Mission;
use App\Models\Platform;
use App\Models\Tag;

class MissionController extends Base5Controller
{
    public $route_name = "dashboard.mission";
    public $view_name = "dashboard.mission";



    public function createAdditionalData()
    {
        $platforms = PlatformResource::collection(Platform::get(['id', 'name']))->resolve();
        $tags = collect(); // this is empty collection, instead of Tag::all();
        return [
            'platforms' => $platforms,
            'tags' => $tags
        ];
    }
    public function editAdditionalData($id)
    {
        $platforms = PlatformResource::collection(Platform::get(['id', 'name']))->resolve();

        $mission_platform = Mission::find($id)->platform;
        $tags = $mission_platform->tags;
        return [
            'platforms' => $platforms,
            'tags' => $tags
        ];
    }

    public function setCreateResource($request)
    {
        return [
            // 'slug' => quickRandomString() . '-' . Str::slug($request->description_en),
            'image' => $this->uploadFile(request: $request, path: 'uploads/missions'),
            'tags' => json_encode($request->tags),
            'admin_data' => json_encode(auth()->user()),
        ];
    }
    public function setUpdateResource($request, $old_image)
    {
        return [
            // 'slug' => quickRandomString() . '-' . Str::slug($request->description_en),
            'image' => $this->uploadFile(request: $request, old_image: $old_image, path: 'uploads/missions'),
            'tags' => json_encode($request->tags),
            'admin_data' => json_encode(auth()->user()),
        ];
    }

}
