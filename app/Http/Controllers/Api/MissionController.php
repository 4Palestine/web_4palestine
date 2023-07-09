<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Base5ApiController;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Base5Controller;
use App\Http\Resources\PlatformResource;
use App\Http\Resources\TagResource;
use App\Models\Mission;
use App\Models\Platform;
use App\Models\Tag;

class MissionController extends Base5ApiController
{

    public function setCreateResource($request)
    {
        return [
            'slug' => quickRandomString() . '-' . Str::slug($request->description),
            'image' => $this->uploadFile(request: $request, path: 'uploads/missions'),
            'tags' => json_encode($request->tags),
            'admin_data' => json_encode(auth()->user()),
        ];
    }
    public function setUpdateResource($request, $old_image)
    {
        return [
            'slug' => quickRandomString() . '-' . Str::slug($request->description),
            'image' => $this->uploadFile(request: $request, old_image: $old_image, path: 'uploads/missions'),
            'tags' => json_encode($request->tags),
            'admin_data' => json_encode(auth()->user()),
        ];
    }

    public function missions_of_platform($platform_id) {
        $platform = Platform::find($platform_id);
        if(!$platform) {
            return $this->tiny_fail(status: false, code: 404, message: "platform is not exist");
        }
        $platform_missions = $platform->active_missions;
        return $this->success_list_response(code: 200, message: "missions of this platform returned successfully", data: $platform_missions, meta: null, links: null);
    }


}


