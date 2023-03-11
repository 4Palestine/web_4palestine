<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    // protected $guard = 'mobile';
    protected $fillable = [
        'name',
        'email',
        'password',
        'country',
        'languages',
        'is_super',
        'is_active',
        'avatar',
        'admin_data'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $images = [
        'image',
    ];


    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'languages' => 'array',
        'admin_data' => 'array'
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



    public function missions() {
        return $this->belongsToMany(Mission::class)->withTimestamps()->withPivot(['platform_id', 'stars']);
    }

}
