<?php

namespace App\Models;

use App\Models\BaseModel\BaseModel;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Platform extends BaseModel
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'slug',
        'name',
        'image',
        'description',
        'is_active',
        'admin_data',
    ];

    protected $images = [
        'image',
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

}
