<?php

namespace Database\Factories;

use App\Models\UserDetail;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
use Faker\Generator as Faker;

class UserDetailFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = UserDetail::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'phone'=> $this->faker->numerify('081#########'),
            'user_id' => User::factory()->create()->id,    
        ];
    }
}
