<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class Customer extends Model
{
    use HasFactory;
    //The attributes that are mass assignable.
    protected $guarded = [];

    /**
     * Get the task associated with the customer.
     */
    public function task()
    {
        return $this->hasOne(FollowUp::class, 'agent_id');
    }

}
