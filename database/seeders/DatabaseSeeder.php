<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            ProfessionSeeder::class,
            TagSeeder::class,
            UserSeeder::class,
            CategorySeeder::class,
            CurrencySeeder::class,
            DealTrendsSeeder::class,
            DealTypeSeeder::class,
            PaymentMethodSeeder::class,
            ProductSeeder::class,
            TierSeeder::class,
            ProductListingSeeder::class,
            DealProviderSeeder::class,
            NotificationSettingSeeder::class,
            SubscriptionSeeder::class,
            BookmarkSeeder::class,
            FacebookGroupSeeder::class,
            PageSeeder::class,
            SliderSeeder::class,
            AdminSeeder::class,
            SharableLinkSeeder::class,
            AlternativeToSeeder::class
        ]);
    }
}
