<?php

namespace Database\Seeders;

use App\Models\Tier;
use Illuminate\Database\Seeder;

class TierSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Tier::create(['name' => 'Tier 1']);
        Tier::create(['name' => 'Tier 2']);
        Tier::create(['name' => 'Tier 3']);
    }
}
