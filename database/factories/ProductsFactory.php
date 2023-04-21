<?php

namespace Database\Factories;

use App\Models\Products;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Products>
 */
class ProductsFactory extends Factory
{
    protected $model = Products::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'country_code' => 'IN',
            'user_id' => 1,
            'category_id' => 1,
            'post_type_id' => 1,
            'post_for' => 'Buy',
            'title' =>  $this->faker->sentence,
            'description' => $this->faker->paragraph,
            'additional_description' => $this->faker->paragraph,
            'tags' => $this->faker->words(3, true),
            'price' => $this->faker->numberBetween(100, 1000),
            'price_2' => $this->faker->numberBetween(100, 1000),
            'negotiable' => $this->faker->boolean,
            'contact_name' => 'Dealacode',
            'email' => 'admin@dealcode.org',
            'phone' => '+91-1234567890',
            'city_id' => 2325,
            'ip_addr' => $this->faker->ipv4,
            // 'tmp_token' => $this->faker->word,
            'verified_email' => 1,
            'verified_phone' => 1,
            'accept_terms' => 1,
            'reviewed' => 1,
            'url' => $this->faker->url,
            'dealtype' => rand(1,2),
            'product_links' => $this->faker->url,
            'trend_id' => rand(1,5),
            'is_providers' => 0,
            'status' => 1,
            'comment' => $this->faker->sentence,
            'sec_image' => $this->faker->imageUrl(),
            'product_type' => 1,
            'category_ids' => rand(1,5),
            'provider_id' => 1,
            'deal_types' => 0,
        ];
    }
}
