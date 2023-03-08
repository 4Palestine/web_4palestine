<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Store;
use App\Models\Category;
use Illuminate\Support\Str;
use App\Http\Controllers\Base5Controller;
use App\Http\Resources\CategoryResource;
use App\Models\Product;
use App\Models\Tag;

class ProductController extends Base5Controller
{
    public $route_name = "dashboard.products";
    public $view_name = "dashboard.products";

    public function createAdditionalData()
    {
        $additionalData = Category::get(['id', 'name']);
        $additionalData1 = Store::get(['id', 'name']);
        return [
            'categories' => $additionalData,
            'stores' => $additionalData1,
        ];
    }
    public function editAdditionalData($id)
    {
        $additionalData = Category::get(['id', 'name']);
        $additionalData1 = Store::get(['id', 'name']);
        $tags = implode(',', Product::find($id)->tags()->pluck('name')->toArray());
        return [
            'categories' => $additionalData,
            'stores' => $additionalData1,
            'tags' => $tags,
        ];
    }


    public function setCreateResource($request)
    {
        return [
            'slug' => Str::slug($request->input('name')),
            'image' => $this->uploadFile(request: $request, path: 'uploads/products'),
        ];
    }
    public function setUpdateResource($request, $old_image)
    {
        return [
            'slug' => Str::slug($request->input('name')),
            'image' => $this->uploadFile(request: $request, old_image: $old_image, path: 'uploads/products'),
        ];
    }


    public function saving($request, $model)
    {

        $model = Product::find($model->id);
        $tags = json_decode($request->tags);
        $tag_ids = [];

        $saved_tags = Tag::all();
        foreach($tags as $tag_name){
            $tag_slug = Str::slug($tag_name->value);
            $tag = $saved_tags->where('slug', $tag_slug)->first();
            if(!$tag){
                $tag = Tag::create([
                    'name' => $tag_name->value,
                    'slug' => $tag_slug
                ]);
            }
            $tag_ids[] = $tag->id;
        }

        $model->tags()->sync($tag_ids);

    }



    // // Export & import [PDF & EXCEL]
    // public function exportHeadings() {
    //     return ['Id', 'Name', 'Description', 'Store Id', 'price',
    //     'compare_price', 'rating', 'Category Id', 'featured',
    //     'status'];
    // }
    public function exportExcelCollection(){
        return [
            'id', 'name', 'store_id', 'price',
            'compare_price', 'rating', 'category_id', 'featured',
            'status'
        ];
    }

    public function importCollection($row)
    {
        return [
            'name' => $row['name'],
            'store_id' => $row['store_id'],
            'price' => $row['price'],
            'compare_price' => $row['compare_price'],
            'rating' => $row['rating_ex'],
            'category_id' => $row['category_id'],
            'featured' => $row['featured_ex'],
            'slug' => Str::slug($row['name']),
            'status' => $row['status'],
        ];
    }
}
