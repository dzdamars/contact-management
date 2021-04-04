<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class History extends Model
{
    use HasFactory;

    //The attributes that are mass assignable.
    protected $guarded = [];

    /**
     * EAGER LOADING - LAZY LOAD-related model
     */
    protected $with = ['task'];

    /**
     * Get the task that recorded
     */
    public function task() {
        return $this->belongsTo(FollowUp::class, 'task_id');
    }
}
