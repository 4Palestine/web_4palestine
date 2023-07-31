<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
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

    public function scopeSearch(Builder $query, $request)
    {
        if (isset($request['is_active']) && $request['is_active'] != '') {
            $query->where('is_active', '=', $request['is_active']);
        }
    }

    public function scopeActive(Builder $query)
    {
        return $query->where('is_active', 1);
    }
}
