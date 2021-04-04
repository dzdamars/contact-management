<?php

namespace Database\Factories;

use App\Models\History;
use App\Models\FollowUp;
use Illuminate\Database\Eloquent\Factories\Factory;

class HistoryFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = History::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'task_id'   => FollowUp::factory()->create()->id,
            // 'cust_id'   => Customer::factory()->create()->id,
            // 'stat'      => $stat_values[rand(0,3)],
            // 'remarks'   => Str::random(10),    
        ];
    }
}
