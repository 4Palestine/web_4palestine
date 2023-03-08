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
            'slug' => $this->quickRandomString() . '-' . Str::slug($request->name),
            'image' => $this->uploadFile(request: $request, path: 'uploads/products'),
            'admin_data' => json_encode(auth()->user()),
        ];
    }
    public function setUpdateResource($request, $old_image)
    {
        return [
            'slug' => $this->quickRandomString() . '-' . Str::slug($request->name),
            'image' => $this->uploadFile(request: $request, old_image: $old_image, path: 'uploads/products'),
            'admin_data' => json_encode(auth()->user()),
        ];
    }




    public static function quickRandomString($length = 4)
    {
        $pool = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        return substr(str_shuffle(str_repeat($pool, 5)), 0, $length);
    }
}
