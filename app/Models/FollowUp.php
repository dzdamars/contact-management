<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class FollowUp extends Model
{
    // public $timestamps = false;
    use HasFactory;
    //The attributes that are mass assignable.
    protected $guarded = [];

    /**
     * Get the possible 'stat' column's values.
     */
    public static function getPossibleStatuses(){
        $type = DB::select(DB::raw('SHOW COLUMNS FROM follow_ups WHERE Field = "stat"'))[0]->Type;
        preg_match('/^enum\((.*)\)$/', $type, $matches);
        $values = array();
        foreach(explode(',', $matches[1]) as $value){
            $values[] = trim($value, "'");
        }
        return $values;
    }

    /**
     * EAGER LOADING - LAZY LOAD-related model
     */
    protected $with = ['agent', 'customer'];

    /**
     * Get the user(agent) that owns the task.
     */
    public function agent()
    {
        return $this->belongsTo(User::class, 'agent_id');
    }

    /**
     * Get the customer that have to be follows up.
     */
    public function customer()
    {
        return $this->belongsTo(Customer::class, 'cust_id');
    }

    /**
     * Get the history associated with the task
     */
    public function histories(){
        return $this->hasMany(History::class, 'task_id');
    }
}
