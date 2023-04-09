<?php

namespace App\Http\Controllers\Admin;

use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Base5Controller;
use App\Http\Resources\PlatformResource;
use App\Models\Platform;

class TagController extends Base5Controller
{
    public $route_name = "dashboard.tag";
    public $view_name = "dashboard.tag";

    public function getTagsByPlatformId(Request $request)
    {
        $platformId = $request->input('platform_id');
        $tags = Tag::where('platform_id', $platformId)->get();
        return response()->json(['tags' => $tags]);
    }


    public function indexQuery() {
        return $this->getModel()::search(request()->query())->orderBy('platform_id')->paginate($this->paginate);
    }

    public function createEditAdditionalData()
    {
        $platforms = PlatformResource::collection(Platform::get(['id', 'name']))->resolve();
        return [
            'platforms' => $platforms,
        ];
    }
}
