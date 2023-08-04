<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Str;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable implements MustVerifyEmail
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

    public function getAvatarAttribute($value)
    {
        return image_url($value);
    }

    public function getCoreAvatarAttribute($value)
    {
        return $value;
    }

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'languages' => 'array',
        'admin_data' => 'array',
    ];


    public function scopeSearch(Builder $query, $request)
    {
        if ($request['name'] ?? false) {
            $query->where('name', 'LIKE', "%{$request['name']}%");
        }
        if (isset($request['is_active']) && $request['is_active'] != '') {
            $query->where('is_active', '=', $request['is_active']);
        }
        if (isset($request['is_super']) && $request['is_super'] != '') {
            $query->where('is_super', '=', $request['is_super']);
        }
    }

    public function scopeActive(Builder $query)
    {
        return $query->where('is_active', 1);
    }


    public function stars() {
        return $this->hasOne(UserStar::class, 'user_id');
    }

    public function missions()
    {
        return $this->belongsToMany(Mission::class, 'mission_user')->withTimestamps()->withPivot('platform_id', 'stars');
    }
    public function missions_count()
    {
        return $this->belongsToMany(Mission::class, 'mission_user');
    }
    public function contacts(){
        return $this->hasMany(Contact::class , 'user_id' , 'id');
    }
    public function notifications(){
        return $this->hasMany(Notification::class, 'user_id');
    }

    public function createEmailVerification()
    {
        //        $code = Str::random(6);
        $code = random_int(100000, 999999);
        $expiresAt = now()->addMinutes(10);

        $verification = new EmailVerification([
            'code' => $code,
            'expires_at' => $expiresAt,
        ]);

        $this->emailVerification()->save($verification);

        return $verification;
    }

    public function emailVerification()
    {
        return $this->hasOne(EmailVerification::class, 'user_id');
    }



    public static function createUserWithVerification(array $attributes = [])
    {
        $user = new static;
        $user->forceFill($attributes);
        $user->email_verified_at = now();
        $user->save();
        return $user;
    }
}
