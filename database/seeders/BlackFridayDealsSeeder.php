<?php

namespace Database\Seeders;

use App\Models\BlackFridayDeal;
use Illuminate\Database\Seeder;

class BlackFridayDealsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        BlackFridayDeal::all()->map->forceDelete();
        $blackFridayDeals = file_get_contents(base_path('database/seeders/BlackFridayDeals.json'));
        $blackFridayDeals = json_decode($blackFridayDeals);

        foreach ($blackFridayDeals as $blackFridayDeal) {
            BlackFridayDeal::create([
                'deal_name' => $blackFridayDeal->deal_name,
                'url' => $blackFridayDeal->url,
                'from_date' => $blackFridayDeal->from_date,
                'to_date' => $blackFridayDeal->to_date,
                'year' => $blackFridayDeal->year,
                'discount' => $blackFridayDeal->discount,
                'coupon_code' => $blackFridayDeal->coupon_code,
                'deal_details' => $blackFridayDeal->deal_details,
                'tier_1' => $blackFridayDeal->tier_1,
                'tier_2' => $blackFridayDeal->tier_2,
                'tier_3' => $blackFridayDeal->tier_3,
            ]);
        }
    }
}
