<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use Faker\Generator as Faker;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {

        $product_json = file_get_contents(base_path('database/seeders/productList.json'));
        $product_json = json_decode($product_json);

        foreach ($product_json->rows as $product) {
            if (!isset($product->title)) {
                continue;
            }

            Product::create([
                'title' => $product->title,
                'slug' => \Illuminate\Support\Str::slug($product->title),
                'category_id' => $product->category_id ?? 22,
                'image' => $product->featured_image_url ?? asset('/images/default_image.png'),
                'thumbnail' => $product->media_url ?? asset('/images/default_image.png'),
                'url' => $product->url,
                'product_url' => $product->url,
                'description' => $product->card_description ?? '',
                'tag_id' => $product->product_tag1 ?? 22,
                'deal_provider_id' => $product->provider_id ?? 1,
                'price' => $product->price ?? 0,
                'license1_tier_price' => $product->license1_Tier_price ?? 0,
                'license1_tier_features' => $product->license1_Tier_features ?? '',
                'license2_tier_price' => $product->license2_Tier_price ?? 0,
                'license2_tier_features' => $product->license2_Tier_features ?? '',
                'license3_tier_price' => $product->license3_Tier_price ?? 0,
                'license3_tier_features' => $product->license3_Tier_features ?? '',
                'tldr' => $product->tldr ?? '',
                'about_all' => $product->About_all ?? '',
            ]);
        }

    }
}
