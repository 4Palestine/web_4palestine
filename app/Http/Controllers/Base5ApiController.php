<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Traits\uploadFile;
use App\Models\BaseModel\BaseModel;
use Illuminate\Foundation\Bus\DispatchesJobs;
use App\Http\Requests\BaseRequest\BaseRequest;
use App\Http\Resources\BaseResource\BaseResource;
use App\Http\Traits\ApiResponses;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Arr;

class Base5ApiController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests, uploadFile, ApiResponses;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public $model;    // public $model = "App\Models\Category";
    public $resource;
    protected $request;    // public $request = "App\Http\Requests\CategoryRequest";
    public $model_text;    // the model name to show in Alert messages // نادر الإستخدام
    public $importChildObject = Base5ApiController::class;    // public $importChildObject = ProductController::class;
    public $paginate = 3;



    public function __construct()
    {
        $this->init();
    }
    public function init()
    {
        if (!isset($this->model) && class_exists($this->getDefaultModel()))
            $this->model = $this->getDefaultModel();

        if (!isset($this->resource) && class_exists($this->getDefaultResource()))
            $this->resource = $this->getDefaultResource();
    }



    public function index()
    {
        $model = $this->indexQuery();

        // $model = Arr::forget($model, 'data');
        // unset($model['data']);
        $links = collect($model)->except(['data'])->toArray();

        $models = $this->resource::collection($model);
        $additionalData = $this->indexAdditionalData();

        if(!$models) {
            return $this->fail(status: false, code: 404, message: "there is no data yet", data: null);
        }
        return $this->success(status: true, code: 200, message: "data returned succeefully", data: $models, additionalData: $additionalData, links: $links);
    }
    public function indexQuery() {
        return $this->getModel()::search(request()->query())->paginate($this->paginate);
    }
    // public function model_pagination_links($model, $models)
    // {
    //     // Extract pagination information from the $model object
    //     $pagination = $model->toArray();
    //     // Create the pagination links manually
    //     $links = null;
    //     if ($pagination['last_page'] > 1) {
    //         $links = (new LengthAwarePaginator(
    //             $models,
    //             $pagination['total'],
    //             $pagination['per_page'],
    //             $pagination['current_page'],
    //             ['path' => request()->url()]
    //         ))->links();
    //     }
    //     return $links;
    // }



    public function store(Request $request)
    {
        $request->validate($this->getRequest()->rules(), $this->getRequest()->messages());
        $model = $this->getModel()::create($this->setCreateAttributes($request));
        if($model)
            $this->afterCreate($request, $model);

        if(!$model) {
            return $this->fail(status: false, code: 404, message: "there is no data yet", data: null);
        }
        return $this->success(status: true, code: 200, message: "data returned succeefully", data: $model);
    }


    public function show($id)
    {
        $object = $this->getModel()::find($id);
        $model = $this->getResource($object);

        $additionalData = $this->showAdditionalData($id);

        if(!$model) {
            return $this->fail(status: false, code: 404, message: "there is no data yet", data: null);
        }
        return $this->success(status: true, code: 200, message: "data returned succeefully", data: $model, additionalData: $additionalData);
    }


    public function update(Request $request, $id)
    {
        $model = $this->getModel()::find($id);
        if(!$model) {
            return $this->fail(status: false, code: 404, message: "there is no data yet", data: null);
        }

        $old_image = count($model->getImages()) == 1 ? $model[$model->getImages()[0]] : $model->image;

        $request->validate($this->getRequest()->rules($id), $this->getRequest()->messages());
        $newModel = $model->update($this->setUpdateAttributes($request, $old_image));

        if($newModel)
            $this->afterUpdate($request, $model);

        return $this->success(status: true, code: 200, message: "data returned succeefully", data: $model);

    }



    public function destroy($id)
    {
        $model = $this->getModel()::find($id);
        if(!$model) {
            return $this->fail(status: false, code: 404, message: "there is no data yet", data: null);
        }
        $deleted = $model->delete();

        if ($deleted) // DO NOT check if the image was deleted, it will case an error
            return $this->success(status: true, code: 200, message: "data returned succeefully", data: $model);
    }


    ///////////////////////////////////////////////////////////////////////////////////////////////////////////
    ///////////////////////////////////////////////////////////////////////////////////////////////////////////
    ///////////////////////////////////////////////////////////////////////////////////////////////////////////
    // define the attributes as key => value to send it to database in Create & Update
    // same as Resource
    public function setCreateAttributes($request)
    {
        return array_merge($this->setResource($request), $this->serializeTranslatableOptions($request) , $this->setCreateResource($request));
    }
    public function setUpdateAttributes($request, $old_image)
    {
        return array_merge($this->setResource($request), $this->serializeTranslatableOptions($request) , $this->setUpdateResource($request, $old_image));
    }
    // use it when Update has new different data than normal [e.g. 'image' => uploadFile(request, path)]
    public function setCreateResource($request)
    {
        return $this->setCreateUpdateResource($request);
    }
    // use it when Update has new different data than normal [e.g. 'image' => uploadFile(request, oldimage, path)]
    public function setUpdateResource($request, $old_image)
    {
        return $this->setCreateUpdateResource($request, $old_image);
    }
    // use it when Update & Create has new different data than normal [e.g. 'parts' => $model->parts->name]
    public function setCreateUpdateResource($request, $old_image = null)
    {
        return [];
    }

    public function serializeTranslatableOptions($request)
    {
        $translatabelOptions = app($this->getModel())->getTranslatableOptions();
        $serializedOptions = [];
        foreach($translatabelOptions as $option){
            $serializedOptions[$option] = [
                'en' => $request->input($option . '_en'),
                'ar' => $request->input($option . '_ar')
            ];
        }
        return $serializedOptions;
    }


    // use it when create & update has the same data, [default = $request->all()]
    public function setResource($request)
    {
        return $request->all();
    }

    ///////////////////////////////////////////////////////////////////////////////////////////////////////////
    ///////////////////////////////////////////////////////////////////////////////////////////////////////////
    ///////////////////////////////////////////////////////////////////////////////////////////////////////////
    // return some variabels in functions [ GETTERS ]
    public function getModel()
    {
        return $this->getDefaultModel();
    }
    public function getRequest()
    {
        return $this->getDefaultRequest();
    }
    public function getResource($object)
    {
        return new ($this->resource)($object);
    }

    public function getDefaultModel()
    {
        $custom_model = "App\\Models\\" . str_replace(["Controllers", "Controller"], ["", ""], get_class_name($this));
        return class_exists($custom_model) ? $custom_model : BaseModel::class;
    }
    public function getDefaultRequest()
    {
        $custom_request = "App\\Http\\Requests\\" . str_replace(["Controllers", "Controller"], ["Requests", "Request"], get_class_name($this));
        $request = class_exists($custom_request) ? $custom_request : BaseRequest::class;
        return new $request;
    }
    public function getDefaultResource()
    {
        $custom_resource = "App\\Http\\Resources\\Api\\" . str_replace(["Controllers", "Controller"], ["Resources", "Resource"], get_class_name($this));
        return class_exists($custom_resource) ? $custom_resource : BaseResource::class;
    }


    public function printModelText()
    {
        $model = str_replace(["Controllers", "Controller"], ["", ""], get_class_name($this));
        $basename = basename($model);
        $model_name = preg_replace('/(?<!\ )[A-Z]/', ' $0', $basename);
        return isset($this->model_text) && $this->model_text != null ? $this->model_text : $model_name;
    }

    ///////////////////////////////////////////////////////////////////////////////////////////////////////////
    ///////////////////////////////////////////////////////////////////////////////////////////////////////////
    ///////////////////////////////////////////////////////////////////////////////////////////////////////////
    // Send Additional Data To View

    public function indexAdditionalData()
    {
        return null;
    }
    public function showAdditionalData($id)
    {
        return null;
    }


    ///////////////////////////////////////////////////////////////////////////////////////////////////////////
    ///////////////////////////////////////////////////////////////////////////////////////////////////////////
    ///////////////////////////////////////////////////////////////////////////////////////////////////////////
    // Operation befor saving the new model

    public function afterCreate($request, $model)
    {
        return $this->saving($request, $model);
    }
    public function afterUpdate($request, $model)
    {
        return $this->saving($request, $model);
    }
    public function saving($request, $model)
    {
        return null;
    }


    ///////////////////////////////////////////////////////////////////////////////////////////////////////////
    ///////////////////////////////////////////////////////////////////////////////////////////////////////////
    ///////////////////////////////////////////////////////////////////////////////////////////////////////////
    // dynamic route & view system

    public $route_name = null;

    public $route_show = null;
    public $route_index = null;
    public $route_create = null;
    public $route_edit = null;
    public $route_trash = null;
    public $route_restore = null;

    public function route_name()
    {
        return $this->route_name != null ? $this->route_name : $this->route_view_name();
    }
    public function route_show()
    {
        return $this->route_show != null ? $this->route_show : $this->route_name() . '.show';
    }
    public function route_index()
    {
        return $this->route_index != null ? $this->route_index : $this->route_name() . '.index';
    }
    public function route_create()
    {
        return $this->route_create != null ? $this->route_create : $this->route_name() . '.create';
    }
    public function route_edit()
    {
        return $this->route_edit != null ? $this->route_edit : $this->route_name() . '.edit';
    }
    public function route_trash()
    {
        return $this->route_trash != null ? $this->route_trash : $this->route_name() . '.trash';
    }
    public function route_restore()
    {
        return $this->route_restore != null ? $this->route_restore : $this->route_name() . '.restore';
    }
    ///////////////////////////////////////////////////////////////////////////////////////////////////////////
    ///////////////////////////////////////////////////////////////////////////////////////////////////////////
    ///////////////////////////////////////////////////////////////////////////////////////////////////////////

}
