<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Customer;
use App\Models\FollowUp;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class FollowUpFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = FollowUp::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        // $customerIDs = User::where('is_admin', false)->get('id')->toArray();
        $stat_values = FollowUp::getPossibleStatuses();
        return [
            'agent_id'  => User::factory()->create()->id,
            'cust_id'   => Customer::factory()->create()->id,
            'stat'      => $stat_values[rand(0,3)],
            'remarks'   => Str::random(10),    
        ];
    }
}
