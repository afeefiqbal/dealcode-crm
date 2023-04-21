<?php

namespace Database\Seeders;

use App\Models\DealType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class DealTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        DealType::create(['title' => 'Sell', 'slug' => 'sell']);
        DealType::create(['title' => 'Buy', 'slug' => 'buy']);
        DealType::create(['title' => 'Trade', 'slug' => 'trade']);
        DealType::create(['title' => 'Bids', 'is_new' => true, 'slug' => 'bids']);
    }
}
