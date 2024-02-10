<?php

namespace Database\Seeders;

use App\Models\Event;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */


    public function run(Faker $faker): void
    {
        for ($i = 0; $i < 6; $i++) {
            $newEvent = new Event();
            $newEvent->user_id = $faker->randomElement($this->getUserID());
            $newEvent->name = $faker->sentence(3);
            $newEvent->date = $faker->date();
            $newEvent->available_tickets = $faker->randomNumber(3, false);
            $newEvent->save();
        }

    }

    private function getUserID()
    {
        return User::all()->pluck('id');
    }
}