<?php

namespace Database\Seeders;

use App\Models\Pricing;
use Illuminate\Database\Seeder;

class PricingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Pricing::all()->map->delete();
        $pricings = file_get_contents(base_path('database/seeders/Pricings.json'));
        $pricings = json_decode($pricings);

        foreach ($pricings as $pricing) {

            Pricing::create([
                'product_name' => $pricing->product_name,
                'price' => $pricing->price,
                'notes' => $pricing->notes,
                'tier' => $pricing->tier,
                'reseller' => $pricing->reseller,
            ]);
        }
    }
}
