<?php

namespace App\Models;

use App\Models\BaseModel\BaseModel;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class ImageLibraryFolder extends BaseModel
{
    use HasFactory, HasTranslations;

    protected $fillable = [
        'parent_id',
        'slug',
        'name',
        'is_active',
    ];

    public $translatable = [
        'name'
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




    public function parent(){
        return $this->belongsTo(static::class);
    }
    public function children() {
        return $this->hasMany(static::class, 'parent_id');
    }

    public function folderImages()
    {
        return $this->hasMany(Image::class, 'image_library_folder_id');
    }
}
