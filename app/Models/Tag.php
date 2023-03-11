<?php

namespace App\Models;

use App\Models\BaseModel\BaseModel;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\Translatable\HasTranslations;

class Tag extends BaseModel
{
    use HasFactory, HasTranslations;

    protected $fillable = [
        'platform_id',
        'name',
    ];

    public $translatable = [
        'name',
    ];


    public function scopeSearch(Builder $query, $request)
    {
        // if ($request['name'] ?? false) {
        //     $query->where('name', 'LIKE', "%{$request['name']}%");
        // }
        // if (isset($request['is_active']) && $request['is_active'] != '') {
        //     $query->where('is_active', '=', $request['is_active']);
        // }
    }


    public function platform(){
        return $this->belongsTo(Platform::class);
    }
}
