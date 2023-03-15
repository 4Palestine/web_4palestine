<?php

namespace App\Models;

use App\Models\BaseModel\BaseModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends BaseModel
{
    use HasFactory;

    protected $fillable = [
        'key',
        'value',
        'is_active',
        'data',
        'group',
    ];
    protected $casts = [
        'data' => 'array',
    ];
}
