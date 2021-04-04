<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
// use Illuminate\Database\Eloquent;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\Customer::factory(30)->create();
        // Eloquent::unguard();
        $this->call(SuperAdminSeeder::class);
        $this->call(CustomerSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(FollowUpSeeder::class);
        // Re Guard model
        // Eloquent::reguard();
    }
}
