<?php

namespace App\Http\Controllers;

use App\Exports\BaseExport;
use App\Imports\BaseImport;
use Illuminate\Http\Request;
use App\Http\Traits\uploadFile;
use App\Models\BaseModel\BaseModel;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Foundation\Bus\DispatchesJobs;
use App\Http\Requests\BaseRequest\BaseRequest;
use Mccarlosen\LaravelMpdf\Facades\LaravelMpdf;
use App\Http\Resources\BaseResource\BaseResource;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Base5Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests, uploadFile;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public $model;    // public $model = "App\Models\Category";
    public $resource;
    protected $request;    // public $request = "App\Http\Requests\CategoryRequest";
    public $model_text;    // the model name to show in Alert messages // نادر الإستخدام
    public $importChildObject = Base5Controller::class;    // public $importChildObject = ProductController::class;
    public $paginate = 15;



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
        $models = $this->resource::collection($model)->resolve();
        $additionalData = $this->indexAdditionalData();
        return view($this->view_index(), compact('model', 'models', 'additionalData'));
    }
    public function indexQuery() {
        return $this->getModel()::search(request()->query())->paginate($this->paginate);
    }


    public function create()
    {
        $model = new $this->model;
        $additionalData = $this->createAdditionalData();
        return view($this->view_create(), compact('model', 'additionalData'));
    }
    public function store(Request $request)
    {
        $request->validate($this->getRequest()->rules(), $this->getRequest()->messages());
        $model = $this->getModel()::create($this->setCreateAttributes($request));
        if($model)
            $this->afterCreate($request, $model);

        // PRG => Post Redirect Get
        if (!$model) {
            return redirect()->route($this->route_index())->with('fail', 'Something Went Wrong !!');
        }
        return redirect()->route($this->route_index())->with('success', $this->printModelText() . ' Created Successfully');
    }


    public function show($id)
    {
        $object = $this->getModel()::find($id);
        $objectResource = $this->getResource($object);
        // $objectResource = new ($this->resource)($object);
        $model = $objectResource->resolve();
        $additionalData = $this->showAdditionalData($id);
        if (!$model) {
            return redirect()->route($this->route_index())->with('fail', $this->printModelText() . ' Doesn`t Exist');
        }
        return view($this->view_show(), compact('model', 'additionalData'));
    }




    // public function edit($id)
    // {
    //     $model = $this->getModel()::find($id);
    //     if (!$model) {
    //         return redirect()->route($this->route_index())->with('fail', $this->printModelText() . ' Doesn`t Exist');
    //     }
    //     $additionalData = $this->editAdditionalData($id);
    //     return view($this->view_edit(), compact('model', 'additionalData'));
    // }

    public function edit($id)
    {
        $object = $this->getModel()::find($id);

        $objectResource = $this->getResource($object);
        $model = $objectResource->resolve();

        if (!$model) {
            return redirect()->route($this->route_index())->with('fail', $this->printModelText() . ' Doesn`t Exist');
        }

        $additionalData = $this->editAdditionalData($id);

        return view($this->view_edit(), compact('model', 'additionalData'));
    }


    public function update(Request $request, $id)
    {
        $model = $this->getModel()::find($id);
        if (!$model) {
            return redirect()->route($this->route_index())->with('fail', $this->printModelText() . ' Doesn`t Exist');
        }

        $old_image = count($model->getImages()) == 1 ? $model[$model->getImages()[0]] : $model->image;

        $request->validate($this->getRequest()->rules($id), $this->getRequest()->messages());
        $newModel = $model->update($this->setUpdateAttributes($request, $old_image));

        if($newModel)
            $this->afterUpdate($request, $model);

        if ($newModel) {
            return redirect()->route($this->route_index())->with('success', $this->printModelText() . ' Updated Successfully');
        }
    }



    public function destroy($id)
    {
        $model = $this->getModel()::find($id);
        if (!$model) {
            return redirect()->route($this->route_index())->with('fail', $this->printModelText() . ' Doesn`t Exist');
        }
        $deleted = $model->delete();

        if ($deleted) // DO NOT check if the image was deleted, it will case an error
            return redirect()->route($this->route_index())->with('success', $this->printModelText() . ' Deleted Successfully');
    }
    public function deleteRelations($model)
    {
        $images = app($this->getModel())->getImages();
        foreach ($images as $image) {
            $deleted = $this->deleteFile($model[$image]);
        }
        // $deleted = $model->parts()->delete();
        return $deleted ?? null;
    }
    // public function deleteGroup(Request $request){
    //     dd('sss');

    //     // $ids = explode(",", $request->deletegroup);
    //         $ids = $request->deleteGroup;
    //         $this->getModel()::whereIn('id', $ids)->delete();
    // }





    public function trash()
    {
        // ->withTrashed()  // this scope used to show all data with the soft deleted data also ..
        $model = $this->getModel()::onlyTrashed()->search(request()->query())->paginate($this->paginate);
        $models = $this->resource::collection($model)->resolve();
        $additionalData = $this->indexAdditionalData();
        return view($this->view_trash(), compact('model', 'models', 'additionalData'));
    }
    public function restore(Request $request, $id)
    {
        $model = $this->getModel()::onlyTrashed()->findOrFail($id);
        $model->restore();  // make deleted_at = NULL
        return redirect()->route($this->route_trash())->with('success', $this->printModelText() . ' Restored Successfully');
    }
    public function forceDelete($id)
    {
        $model = $this->getModel()::onlyTrashed()->findOrFail($id);
        $model->forceDelete();
        $this->deleteRelations($model);
        return redirect()->route($this->route_trash())->with('success', $this->printModelText() . ' Deleted Forever Successfully');
    }












    ///////////////////////////////////////////////////////////////////////////////////////////////////////////
    ///////////////////////////////////////////////////////////////////////////////////////////////////////////
    ///////////////////////////////////////////////////////////////////////////////////////////////////////////
    // Export Excel File
    public function exportExcelHeadings()
    {
        return $this->exportHeadings() ?? $this->exportCollection();
    }
    public function exportExcelCollection()
    {
        return $this->exportCollection();
    }
    public function exportExcel()
    {
        $headings = $this->exportExcelHeadings();
        $collection = $this->getModel()::get($this->exportExcelCollection());
        // $collection = $this->resource::collection($this->exportExcelCollection())->collect();
        return Excel::download(new BaseExport($headings, $collection), $this->printModelText() . '.xlsx');
    }
    public function exportExcelDemo()
    {
        $headings = $this->exportExcelHeadings();
        $collection = collect(new $this->model);
        return Excel::download(new BaseExport($headings, $collection), $this->printModelText() . '_demo.xlsx');
    }
    ///////////////////////////////////////////////////////////////////////////////////////////////////////////
    // Export PDF File
    public function exportPdfHeadings()
    { // set the headings of PDF to export
        return $this->exportHeadings() ?? $this->exportCollection();
    }
    public function exportPdfCollection()
    { // set the collection of PDF to export
        return $this->exportCollection();
    }
    public function exportPdf()
    {
        $headings = $this->exportPdfHeadings();
        $collection_array = $this->exportPdfCollection();
        // $collection = $this->getModel()::get($this->exportPdfCollection());
        $collection = $this->resource::collection($this->getModel()::all())->resolve();
        $pdf = LaravelMpdf::loadView('components.BaseComponents.tabel.export_templates.template_pdf', compact('collection', 'collection_array', 'headings'));
        return $pdf->stream($this->printModelText() . '.pdf');
    }
    ///////////////////////////////////////////////////////////////////////////////////////////////////////////
    // Set the Headings & Collections of Excel & PDF
    public function exportHeadings()
    {
        return null; // return [];
    }
    public function exportCollection()
    {
        return !is_null(app($this->getModel())->getColumnsForSheets()) ? app($this->getModel())->getColumnsForSheets() : app($this->getModel())->getFillable();
    }
    ///////////////////////////////////////////////////////////////////////////////////////////////////////////
    ///////////////////////////////////////////////////////////////////////////////////////////////////////////
    // Import Excel File

    public function importRules()
    {
        return [];
        // return [
        //     '*.name' => ['required', 'unique:categories'],
        //     '*.status' => ['required'],
        // ];
    }

    public function importCollection($row)
    {
        return [];
        // return [
        //     'name' => $row['name'],
        //     'description' => $row['description'],
        //     'parent_id' => $row['parent_id'],
        //     'slug' => Str::slug($row['name']),
        //     'status' => $row['status'],
        // ];
    }
    public function importExcel()
    {
        $importChildObject = get_class($this);
        // $importChildObject2 = $this->importChildObject;
        $model = $this->getModel();
        $rules = $this->importRules();
        $import = Excel::import(new BaseImport($importChildObject, $model, $rules), request()->file('import_file'));
        if (!$import) {
            return redirect()->route($this->route_index())->with('import_errors', 'something went wrong');
        }
        return redirect()->route($this->route_index())->with('success', 'File Imported Successfully');
        // return response()->json(['success' => 'You have successfully upload file, click submit button to store the data.']);
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
        $custom_resource = "App\\Http\\Resources\\" . str_replace(["Controllers", "Controller"], ["Resources", "Resource"], get_class_name($this));
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
    public function createAdditionalData()
    {
        return $this->createEditAdditionalData();
    }
    public function editAdditionalData($id)
    {
        return $this->createEditAdditionalData();
    }
    public function createEditAdditionalData(){
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
        // dd($request);
        return null;
    }

    // public function beforeCreate($request)
    // {
    //     return $this->beforeSaving($request);
    // }
    // public function beforeUpdate($request, $model)
    // {
    //     return $this->beforeSaving($request, $model);
    // }
    // public function beforeSaving($request, $model = null)
    // {
    //     // dd($request);
    //     return null;
    // }

    ///////////////////////////////////////////////////////////////////////////////////////////////////////////
    ///////////////////////////////////////////////////////////////////////////////////////////////////////////
    ///////////////////////////////////////////////////////////////////////////////////////////////////////////
    // dynamic route & view system

    public $route_view_name = null;
    public $route_name = null;
    public $view_name = null;
    public $route_show = null;
    public $route_index = null;
    public $route_create = null;
    public $route_edit = null;
    public $route_trash = null;
    public $route_restore = null;
    public $view_show = null;
    public $view_index = null;
    public $view_create = null;
    public $view_edit = null;
    public $view_trash = null;
    public function route_view_name()
    {
        return $this->route_view_name;
    }
    public function route_name()
    {
        return $this->route_name != null ? $this->route_name : $this->route_view_name();
    }
    public function view_name()
    {
        return $this->view_name != null ? $this->view_name : $this->route_view_name();
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
    public function view_show()
    {
        return $this->view_show != null ? $this->view_show : $this->view_name() . '.show';
    }
    public function view_index()
    {
        return $this->view_index != null ? $this->view_index : $this->view_name() . '.index';
    }
    public function view_create()
    {
        return $this->view_create != null ? $this->view_create : $this->view_name() . '.create';
    }
    public function view_edit()
    {
        return $this->view_edit != null ? $this->view_edit : $this->view_name() . '.edit';
    }
    public function view_trash()
    {
        return $this->view_trash != null ? $this->view_trash : $this->view_name() . '.trash';
    }

    ///////////////////////////////////////////////////////////////////////////////////////////////////////////
    ///////////////////////////////////////////////////////////////////////////////////////////////////////////
    ///////////////////////////////////////////////////////////////////////////////////////////////////////////

}
