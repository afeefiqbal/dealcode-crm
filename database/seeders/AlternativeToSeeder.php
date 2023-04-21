<?php

namespace Database\Seeders;

use App\Models\AlternativeTo;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
class AlternativeToSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i = 0; $i <= 20; $i++) {
            AlternativeTo::create([
                'title' => $faker->company,
                'link' => $faker->url,
                'hashtag' => $faker->name,
            ]);
        }
    }
}
