<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\UserDetail;
use App\Models\FollowUp;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // User::factory(10)->create();
        $user = User::factory(9)
        ->has(FollowUp::factory()->count(3), 'tasks')
        ->has(UserDetail::factory(), 'detail')
        ->create();

    }
}
