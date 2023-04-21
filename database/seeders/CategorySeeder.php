<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Faker\Generator as Faker;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        Category::create(['title' => 'AI', 'slug' => 'ai']);
        Category::create(['title' => 'Client Management', 'slug' => 'client-management']);
        Category::create(['title' => 'CRM', 'slug' => 'crm']);
        Category::create(['title' => 'Data Analysis', 'slug' => 'data-analysis']);
        Category::create(['title' => 'Design', 'slug' => 'design']);
        Category::create(['title' => 'Ecommerce', 'slug' => 'ecommerce']);
        Category::create(['title' => 'Education', 'slug' => 'education']);
        Category::create(['title' => 'Hosting', 'slug' => 'hosting']);
        Category::create(['title' => 'HR', 'slug' => 'hr']);
        Category::create(['title' => 'Lead Generation', 'slug' => 'lead-generation']);
        Category::create(['title' => 'Productivity', 'slug' => 'productivity']);
        Category::create(['title' => 'Security', 'slug' => 'security']);
        Category::create(['title' => 'Sales', 'slug' => 'sales']);
        Category::create(['title' => 'SEO', 'slug' => 'seo']);
        Category::create(['title' => 'Social Media', 'slug' => 'social-media']);
        Category::create(['title' => 'Visual', 'slug' => 'visual']);
        Category::create(['title' => 'Support', 'slug' => 'support']);
        Category::create(['title' => 'Video', 'slug' => 'video']);
        Category::create(['title' => 'Web Development', 'slug' => 'web-development']);
        Category::create(['title' => 'WordPress', 'slug' => 'wordpress']);
    }
}
