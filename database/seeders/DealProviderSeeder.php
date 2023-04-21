<?php

namespace Database\Seeders;

use App\Models\DealProvider;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class DealProviderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $deals = [
            ['code' => 'S01', 'type' => 'Seller', 'title' => 'Appsumo', 'short_description' => 'Lifetime Deals on Online tools and Digital Products, 13,000 + deals', 'link' => 'https://appsumo.com/'],
            ['code' => 'S02', 'type' => 'Seller', 'title' => 'SaasPirate', 'short_description' => 'Digital Products, claims nearly 6,000 entrepreneurs', 'link' => 'https://saaspirate.com/'],
            ['code' => 'S03', 'type' => 'Seller', 'title' => 'Dealmirror', 'short_description' => 'Affordable software solutions for every need. 1M+ clients in 82 countries', 'link' => 'https://dealmirror.com/'],
            ['code' => 'S04', 'type' => 'Seller', 'title' => 'Pitchground', 'short_description' => 'Help online businesses grow with education-first approach', 'link' => 'https://pitchground.com/deals'],
            ['code' => 'S05', 'type' => 'Seller', 'title' => 'Dealify', 'short_description' => 'Peals platform for growth hackers', 'link' => 'https://www.dealify.com/'],
            ['code' => 'S06', 'type' => 'Seller', 'title' => 'Saasmantra', 'short_description' => 'Help business owners connect with other entrepreneurs. 25K+ members', 'link' => 'https://saasmantra.com/deals'],
            ['code' => 'S07', 'type' => 'Seller', 'title' => 'DigitalThink', 'short_description' => 'Delivering value for startups', 'link' => 'https://digitalthink.io/'],
            ['code' => 'S08', 'type' => 'Seller', 'title' => 'DealFuel', 'short_description' => 'More for web designers and developers, themes & Templates', 'link' => 'https://www.dealfuel.com/'],
            ['code' => 'S09', 'type' => 'Seller', 'title' => 'SaaSWiz', 'short_description' => 'No clear USP', 'link' => 'https://saaswiz.com/'],
            ['code' => 'S10', 'type' => 'Seller', 'title' => 'Grabltd', 'short_description' => 'Price competitiveness on tools', 'link' => 'https://www.grabltd.com/'],
            ['code' => 'S11', 'type' => 'Seller', 'title' => 'Lifetimo', 'short_description' => 'Claims to be largest creator of Lifetime deals', 'link' => 'https://lifetimo.com/'],
            ['code' => 'S12', 'type' => 'Seller', 'title' => 'Earlyshark', 'short_description' => 'Curated deals ( but more of an aggregator )', 'link' => 'https://earlyshark.com/'],
            ['code' => 'S13', 'type' => 'Seller', 'title' => 'Convertdeal', 'short_description' => 'Aggregator', 'link' => 'https://convertdeal.com/'],
            ['code' => 'S14', 'type' => 'Aggregator', 'title' => 'Deal Mango', 'short_description' => 'Aggregator', 'link' => 'https://dealmango.com/'],
            ['code' => 'D01', 'type' => 'Direct', 'title' => 'Pabbly', 'short_description' => 'Lifetime Integrations with 800+ products', 'link' => 'https://www.pabbly.com/'],
            ['code' => 'D02', 'type' => 'Direct', 'title' => 'Bloo', 'short_description' => 'Project Management software', 'link' => 'https://www.bloo.io/']
        ];

        DealProvider::insert($deals);
    }
}
