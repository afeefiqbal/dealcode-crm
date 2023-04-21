<?php

namespace Database\Seeders;

use App\Models\Profession;
use App\Models\User;
use Faker\Generator as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i = 0; $i < 10; $i++) {
            User::create([
                'name' => $faker->name,
                'user_name' => \Illuminate\Support\Str::slug($faker->name),
                'email' => $faker->unique()->safeEmail,
                'password' => Hash::make('password'),
                'role' => User::ROLE_USER,
                'website' => $faker->url,
                'auth_provider' => 'facebook',
                'auth_provider_id' => Str::random(30),
                'terms_accepted_at' => now(),
                'status' => User::STATUS_ACTIVE,
                'photo' => asset('/images/default_profile.png'),
                'profession_id' => Profession::inRandomOrder()->first()->id,
            ]);

        }
    }
}
