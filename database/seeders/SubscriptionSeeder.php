<?php

namespace Database\Seeders;

use App\Models\Currency;
use App\Models\DealProvider;
use App\Models\PaymentMethod;
use App\Models\Product;
use App\Models\Subscription;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class SubscriptionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {

        for ($i = 0; $i < 30; $i++) {
            Subscription::create([
                'user_id' => User::inRandomOrder()->first()->id,
                'payment_at' => now(),
                'type' => $faker->company,
                'billing_cycle_count' => 3,
                'billing_cycle_type' => 'test',
                'price' => random_int(10, 999),
                'currency_id' => Currency::inRandomOrder()->first()->id,
                'folder' => 'test',
                'refund_days' => '30',
                'expired_at' => Carbon::now()->addMonth(2),
                // 'payment_method_id' => PaymentMethod::inRandomOrder()->first()->id,
                'support_email' => $faker->email,
                'deal_url' => 'https://www.google.com',
                'product_id' => Product::inRandomOrder()->first()->id,
                'deal_provider_id' => DealProvider::inRandomOrder()->first()->id,
            ]);
        }
    }
}
