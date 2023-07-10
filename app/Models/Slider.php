<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    use HasFactory;
    protected $fillable = [
        'mockups' ,
        'is_active',
        'order',
    ];

    // protected $casts = [
    //     // 'mockups' => 'array',
    //     'order'=>'array',
    // ];

    // protected $attributes = [
    //     // 'mockups' => '[]',
    //     'order' => '[]',
    // ];
}
