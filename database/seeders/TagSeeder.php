<?php

namespace Database\Seeders;

use App\Models\Tag;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        Tag::create(['title' => 'AI',]);
        Tag::create(['title' => 'Client Management']);
        Tag::create(['title' => 'CRM']);
        Tag::create(['title' => 'Data Analysis']);
        Tag::create(['title' => 'Design']);
        Tag::create(['title' => 'Ecommerce']);
        Tag::create(['title' => 'Education']);
        Tag::create(['title' => 'Hosting']);
        Tag::create(['title' => 'HR']);
        Tag::create(['title' => 'Lead Generation']);
        Tag::create(['title' => 'Productivity']);
        Tag::create(['title' => 'Security']);
        Tag::create(['title' => 'Sales']);
        Tag::create(['title' => 'SEO']);
        Tag::create(['title' => 'Social Media']);
        Tag::create(['title' => 'Visual']);
        Tag::create(['title' => 'Support']);
        Tag::create(['title' => 'Video']);
        Tag::create(['title' => 'Web Development']);
        Tag::create(['title' => 'WordPress']);
        Tag::create(['title' => 'Other']);

    }
}
