<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $user_sum = $this->command->ask("How many users?");
        $event_sum = $this->command->ask("How many events?");

        $this->call(UserSeeder::class, false, compact("user_sum"));
        $this->call(EventSeeder::class, false, compact("event_sum", "user_sum"));
        $this->call(TagSeeder::class);
    }
}
