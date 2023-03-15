<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Str;
use App\Models\ImageLibraryFolder;
use App\Http\Controllers\Base5Controller;
use App\Http\Resources\ImageLibraryFolderResource;

class ImageLibraryFolderController extends Base5Controller
{
    public $route_name = "dashboard.imageLibraryFolder";
    public $view_name = "dashboard.imageLibraryFolder";


    // public function createEditAdditionalData()
    // {
    //     $libraryFolders = ImageLibraryFolderResource::collection(ImageLibraryFolder::get(['id', 'name']))->resolve();
    //     return [
    //         'libraryFolders' => $libraryFolders,
    //     ];
    // }



    public function setCreateResource($request)
    {
        return [
            'slug' => quickRandomString() . '-' . Str::slug($request->name_en),
        ];
    }
    public function setUpdateResource($request, $old_image)
    {
        return [
            'slug' => quickRandomString() . '-' . Str::slug($request->name_en),
        ];
    }
}
