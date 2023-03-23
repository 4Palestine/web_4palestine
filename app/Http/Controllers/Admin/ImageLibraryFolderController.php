<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Str;
use App\Models\ImageLibraryFolder;
use App\Http\Controllers\Base5Controller;
use App\Http\Resources\ImageLibraryFolderResource;
use App\Models\Image;
use Illuminate\Http\Request;

class ImageLibraryFolderController extends Base5Controller
{
    public $route_name = "dashboard.imageLibraryFolder";
    public $view_name = "dashboard.imageLibraryFolder";


    public function createEditAdditionalData()
    {
        $libraryFolders = ImageLibraryFolderResource::collection(ImageLibraryFolder::get(['id', 'name']))->resolve();
        return [
            'libraryFolders' => $libraryFolders,
        ];
    }


    public function manage_library(Request $request)
    {
        $data['libraryFolders'] = ImageLibraryFolder::get();
        if ($request->ajax()){
            $folder = ImageLibraryFolder::find($request->get('folder_id'));
            $data['images'] = $folder->folderImages;
            $html = view('dashboard.imageLibraryFolder.parts.render_images', $data)->render();
            return response()->json(compact('html'));
        }else {
            $folder = ImageLibraryFolder::first();
            $data['images'] = $folder->folderImages;
            return view('dashboard.imageLibraryFolder.manage_library', compact('data'));
        }
    }


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


    public function afterCreate($request, $model)
    {
        // return $this->saving($request, $model);

        // try {

        // } catch()
        // $images = [];
        // if ($request->images){
        //     foreach($request->images as $key => $image)
        //     {
        //         $imageName = time().rand(1,99).'.'.$image->getClientOriginalExtension();
        //         $image->move('/uploads/library', $imageName);

        //         $images[]['image_library_folder_id'] = 1;
        //         $images[]['image_path'] = $imageName;
        //         $images[]['image_name'] = $image->getClientOriginalName();
        //         $images[]['extiontion'] = $image->getClientOriginalExtension();
        //     }
        // }

        // foreach ($images as $key => $image) {
        //     Image::create($image);
        // }



            foreach($request->file('images') as $imagefile) {

                $path = $imagefile->store('uploads/library/', 'public');
                $image_original_name = $imagefile->getClientOriginalName();
                $image_original_extension = $imagefile->getClientOriginalExtension();

                Image::create([
                    'image_library_folder_id' => $model->id,
                    'image_path' => $path,
                    'image_name' => $image_original_name,
                    'extiontion' => $image_original_extension
                ]);

            }
    }
}
