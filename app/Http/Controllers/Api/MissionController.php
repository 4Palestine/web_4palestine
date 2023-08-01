<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Base5ApiController;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Base5Controller;
use App\Http\Resources\Api\MissionResource;
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
            'image' => $this->uploadFile(request: $request, path: 'uploads/missions'),
        ];
    }
    public function setUpdateResource($request, $old_image)
    {
        return [
            'image' => $this->uploadFile(request: $request, old_image: $old_image, path: 'uploads/missions'),
        ];
    }

    public function missions_of_platform($platform_id) {
        $platform = Platform::find($platform_id);
        if(!$platform) {
            return $this->tiny_fail(status: false, code: 404, message: __('messages.platform_not_exist'));
        }

        $platform_missions = MissionResource::collection($platform->active_missions);
        return $this->success_list_response(code: 200, message: __('messages.missions_platform_returned_successfully'), data: $platform_missions, meta: null, links: null);
    }



    public function serializeTranslatableOptions($request)
    {
        $translatabelOptions = app($this->getModel())->getTranslatableOptions();
        $serializedOptions = [];

        foreach($translatabelOptions as $option){
            $serializedOptions[$option] = [
                'en' => is_array($request->input($option . '_en')) ? $request->input($option . '_en') : [$request->input($option . '_en')],
                'ar' => is_array($request->input($option . '_en')) ? $request->input($option . '_ar') : [$request->input($option . '_ar')],
                // 'ar' => $request->input($option . '_ar')
            ];
        }
        return $serializedOptions;
    }




    public function search_for_mission()
    {

        $model = $this->getModel()::where(function ($query) {
            $query->where('description->en', 'like', '%' . request()->description . '%')
                ->orWhere('description->ar', 'like', '%' . request()->description . '%');
        })->get();

        // $model = $this->getModel()::where('is_active', 1)->search(request()->query())->get();

        $models = $this->resource::collection($model);

        if(!$models) {
            return $this->tiny_fail(status: false, code: 404, message: __('messages.no_data'));
        }
        return $this->success_single_response(code: 200, message: "", data: $models, meta: null);
    }
}


