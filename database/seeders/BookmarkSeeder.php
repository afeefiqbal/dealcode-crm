<?php

namespace Database\Seeders;

use App\Models\Bookmark;
use App\Models\ProductListing;
use App\Models\User;
use Illuminate\Database\Seeder;

class BookmarkSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0; $i < 40; $i++) {
            Bookmark::create([
                'user_id' => User::inRandomOrder()->first()->id,
                'product_listing_id' => ProductListing::inRandomOrder()->first()->id,
            ]);
        }
    }
}
