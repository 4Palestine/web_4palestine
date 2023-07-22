<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MissionUser extends Model
{
    use HasFactory;


    protected $table = 'mission_user';
    protected $fillable = ['mission_id', 'user_id', 'platform_id', 'stars'];

    public function user() {
        return $this->belongsTo(User::class, 'user_id');
    }

}
