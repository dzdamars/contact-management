<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class UserDetail extends Model
{
    use HasFactory;
    //The attributes that are mass assignable.
    protected $guarded = [];

    /**
     * Get the login of the user.
     */
    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }
}
