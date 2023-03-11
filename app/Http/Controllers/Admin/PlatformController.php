<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Base5Controller;

class PlatformController extends Base5Controller
{
    public $route_name = "dashboard.platform";
    public $view_name = "dashboard.platform";




    public function setCreateResource($request)
    {
        return [
            'slug' => quickRandomString() . '-' . Str::slug($request->name),
            'image' => $this->uploadFile(request: $request, path: 'uploads/products'),
            // 'name' => ['en' => $request->name_en, 'ar' => $request->name_ar],
            // 'description' => ['en' => $request->description_en, 'ar' => $request->description_ar],
            'admin_data' => json_encode(auth()->user()),
        ];
    }
    public function setUpdateResource($request, $old_image)
    {
        return [
            'slug' => quickRandomString() . '-' . Str::slug($request->name),
            'image' => $this->uploadFile(request: $request, old_image: $old_image, path: 'uploads/products'),
            'admin_data' => json_encode(auth()->user()),
        ];
    }
}
