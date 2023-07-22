<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserStar extends Model
{
    use HasFactory;

    protected $table = 'user_stars';
    protected $fillable = ['user_id', 'stars'];

    public function user() {
        return $this->belongsTo(User::class, 'user_id');
    }

}
