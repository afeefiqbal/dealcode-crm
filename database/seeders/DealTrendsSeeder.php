<?php

namespace Database\Seeders;

use App\Models\DealTrend;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class DealTrendsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        DealTrend::create(['title'=>'Lightning', 'icon'=>'']);
        DealTrend::create(['title'=>'Very Hot', 'icon'=>'']);
        DealTrend::create(['title'=>'Hot', 'icon'=>'']);
        DealTrend::create(['title'=>'At Cost', 'icon'=>'']);
        DealTrend::create(['title'=>'Below Cost', 'icon'=>'']);
    }
}
