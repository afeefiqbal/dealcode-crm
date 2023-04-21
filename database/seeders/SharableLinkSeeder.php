<?php

namespace Database\Seeders;

use App\Models\ProductListing;
use App\Models\SharableLink;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Faker\Generator as Faker;

class SharableLinkSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i = 0; $i <= 20; $i++) {
            SharableLink::create([
                'title' => $faker->company,
                'link' => $faker->url,
                'user_id' => User::inRandomOrder()->first()->id,
                'product_listing_id' => ProductListing::inRandomOrder()->first()->id,
            ]);
        }
    }
}
