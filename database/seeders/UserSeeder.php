<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use Illuminate\Support\Facades\Hash;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker, $user_sum): void
    {
        $newUser = new User();
        $newUser->name = "Pippi";
        $newUser->email = "pippi@gmail.com";
        $newUser->password = Hash::make("password");
        $newUser->save();


        for ($i = 0; $i < $user_sum; $i++) {
            $newUser = new User();
            $newUser->name = $faker->name();
            $newUser->email = $faker->email();
            $newUser->password = Hash::make("password");
            $newUser->save();
        }
    }
}
