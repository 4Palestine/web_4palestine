<?php

namespace App\Models;

use App\Models\User;
use App\Models\Platform;
use App\Models\BaseModel\BaseModel;
use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Mission extends BaseModel
{
    use HasFactory, SoftDeletes, HasTranslations;

    protected $fillable = [
        'slug',
        'platform_id',
        'user_id',
        'image',
        'mission_link',
        'description',
        'mission_duration',
        'mission_type',
        'tags',
        'comments',
        'mission_stars',
        'is_active',
        'admin_data',
    ];

    protected $images = [
        'image',
    ];

    public $translatable = [
        'description',
        'comments'
    ];

    protected $casts = [
        'admin_data' => 'array',
        'tags' => 'array',
        'comments' => 'array',
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

    public function scopeActive(Builder $query) {
        return $query->where('is_active', 1);
    }
    public function platform(){
        return $this->belongsTo(Platform::class);
    }
}
