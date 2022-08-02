<?php

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Faker\Generator as Faker;

class UserSeeder extends Seeder
{

    public function run(Faker $faker)
    {
        for ($i=0; $i < 100; $i++) { 
            $user = new User();

            $user->name = $faker->name();
            $user->email = $faker->email();
            $user->password = $faker->word();
            $user->save();
        }
    }
}
