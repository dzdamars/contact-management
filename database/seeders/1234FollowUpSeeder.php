<?php

use App\Models\FollowUp;
use App\Models\History;
use Illuminate\Database\Seeder;

class FollowUpSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = FollowUp::factory(10)
        ->has(History::factory()->count(1), 'histories')
        ->create();
    }
}
