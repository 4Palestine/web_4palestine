<?php

namespace App\Models;

use Illuminate\Support\Str;
use App\Models\BaseModel\BaseModel;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends BaseModel
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'store_id',
        'category_id',
        'name',
        'slug',
        'description',
        'image',
        'price',
        'compare_price',
        'options',
        'rating',
        'featured',
        'status',
    ];

    protected $columnsForSheets = [
        'id', 'name', 'store_id', 'price',
        'compare_price', 'rating_ex', 'category_id', 'featured_ex',
        'status'
    ];
    protected $images = [
        'image',
    ];

    protected $with = [
        'category:id,name',
        'store:id,name',
    ];



    public function scopeSearch(Builder $query, $request)
    {
        if ($request['name_description'] ?? false) {
            $query->where('name', 'LIKE', "%{$request['name_description']}%")->orWhere('description', 'LIKE', "%{$request['name_description']}%");
        }
        if (isset($request['status']) && $request['status'] != '') {
            $query->where('status', '=', $request['status']);
        }
        if (isset($request['featured']) && $request['featured'] != '') {
            $query->where('featured', '=', $request['featured']);
        }
    }

    protected static function booted()
    {
        static::addGlobalScope('store', function(Builder $builder) {
            $user = auth()->user();
            if($user && $user->store_id)
                $builder->where('store_id', '=', $user->store_id);
        });
    }

    public function store(){
        return $this->belongsTo(Store::class);
    }
    public function category(){
        return $this->belongsTo(Category::class);
    }
    public function profile(){
        return $this->hasOne(Profile::class, 'user_id', 'id')->withDefault();
    }


    public function tags(){
        // return $this->belongsToMany(Tag::class, 'pivot_tabel_name', 'product_id(FK this model)', 'tag_id(FK other model)', 'PK of product(this model)', 'PK of tag(other model)');
        return $this->belongsToMany(Tag::class);
    }

    public function scopeActive(Builder $query) {
        return $query->where('status', 'active');
    }


    public function getProductImageAttribute()
    {
        if(!$this->image){
            return "https://epay.slcc.edu/C20011_ustores/web/images/product-default-image.png";
        }
        if(Str::startsWith($this->image, ['http://', 'https://'])) {
            return $this->image;
        }
        return asset('storage/' . $this->image);
    }

    public function getDiscountPrecentageAttribute() {
        if(!$this->compare_price) {
            return 0;
        }
        return round(100 - (100 * ($this->price / $this->compare_price)), 2);
    }
}
