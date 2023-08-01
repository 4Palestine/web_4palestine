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
        // 'comments' => 'array',
    ];



    public function scopeSearch(Builder $query, $request)
    {
        if ($request['description'] ?? false) {
            $query->where('description', 'LIKE', "%{$request['description']}%");
        }
        if (isset($request['is_active']) && $request['is_active'] != '') {
            $query->where('is_active', '=', $request['is_active']);
        }
        if (isset($request['mission_type']) && $request['mission_type'] != '') {
            $query->where('mission_type', '=', $request['mission_type']);
        }
    }

    public function scopeActive(Builder $query) {
        return $query->where('is_active', 1);
    }
    public function platform(){
        return $this->belongsTo(Platform::class);
    }




    // public function users() {
    //     return $this->belongsToMany(User::class, 'mission_user');
    // }
    public function users() {
        return $this->belongsToMany(User::class, 'mission_user')->withTimestamps()->withPivot('platform_id', 'stars');
    }
}
