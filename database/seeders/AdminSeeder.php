<?php

namespace Database\Seeders;

use App\Models\Profession;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Ronald Dsouza',
            'user_name' => 'Ronald Dsouza',
            'email' => 'info@meavita.in',
            'password' => Hash::make('Macbook2022!'),
            'role' => User::ROLE_ADMIN,
            'website' => 'http://google.com',
            'auth_provider' => 'facebook',
            'auth_provider_id' => Str::random(30),
            'terms_accepted_at' => now(),
            'status' => User::STATUS_ACTIVE,
            'photo' => asset('/images/default_profile.png'),
            'profession_id' => Profession::inRandomOrder()->first()->id,
        ]);
    }
}
