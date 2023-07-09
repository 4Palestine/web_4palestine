<?php

namespace App\Models;

use App\Models\Mission;
use App\Models\BaseModel\BaseModel;
use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Platform extends BaseModel
{
    use HasFactory, SoftDeletes, HasTranslations;

    protected $with = ['tags'];

    protected $fillable = [
        'slug',
        'name',
        'image',
        'description',
        'is_active',
        'admin_data',
    ];

    public $translatable = [
        'name',
        'description'
    ];

    protected $images = [
        'image',
    ];


    protected $casts = [
        'admin_data' => 'array',
    ];


    public function scopeSearch(Builder $query, $request)
    {
        if ($request['name'] ?? false) {
            $query->where('name', 'LIKE', "%{$request['name']}%");
        }
        if (isset($request['is_active']) && $request['is_active'] != '') {
            $query->where('is_active', '=', $request['is_active']);
        }
    }

    public function scopeActive(Builder $query) {
        return $query->where('is_active', 1);
    }



    public function tags(){
        return $this->hasMany(Tag::class);
    }
    public function missions(){
        return $this->hasMany(Mission::class);
    }
    public function active_missions(){
        return $this->hasMany(Mission::class)->where('is_active', 1);
    }

}
