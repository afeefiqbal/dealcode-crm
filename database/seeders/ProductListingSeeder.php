<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Currency;
use App\Models\DealTrend;
use App\Models\DealType;
use App\Models\PaymentMethod;
use App\Models\Product;
use App\Models\ProductListing;
use App\Models\ProductListingPaymentMode;
use App\Models\Tier;
use App\Models\Transaction;
use App\Models\User;
use Faker\Generator as Faker;
use Illuminate\Database\Seeder;

class ProductListingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {


        for ($i = 0; $i <= 10; $i++) {
            $user_id = User::inRandomOrder()->first()->id;
            $productListing = ProductListing::create([
                'product_id' => Product::inRandomOrder()->first()->id,
                'user_id' => $user_id,
                'category_id' => Category::inRandomOrder()->first()->id,
                'deal_type_id' => DealType::inRandomOrder()->first()->id,
                'deal_trend_id' => DealTrend::inRandomOrder()->first()->id,
                'price' => mt_rand(10, 999),
                'negotiable' => false,
                'currency_id' => Currency::inRandomOrder()->first()->id,
                'tier_id' => Tier::inRandomOrder()->first()->id,
                'notes' => $faker->text,
                'deal_url' => 'https://www.appsumo.com',
                'product_url' => 'https://www.appsumo.com',
                'additional_description' => $faker->text,
                'status' => 1
            ]);

            ProductListingPaymentMode::create([
                'product_listing_id' => $productListing->id,
                'payment_method_id' => PaymentMethod::inRandomOrder()->first()->id,
            ]);

            Transaction::create([
                'product_listing_id' => $productListing->id,
        
                'user_id' => $user_id,
                'buyer_name' => $faker->name,
                'buyer_email' => $faker->email,
                'sold_date' => now(),
                'notes' => $faker->text,
            ]);
        }

    }
}
