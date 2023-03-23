<?php

namespace App\Models;

use App\Models\BaseModel\BaseModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends BaseModel
{
    use HasFactory;

    protected $table = 'images';
    protected $fillable = [
        'image_library_folder_id',
        'image_path',
        'image_name',
        'extiontion',
    ];
}
