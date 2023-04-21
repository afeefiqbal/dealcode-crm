<?php

namespace Database\Seeders;

use App\Models\Profession;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProfessionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $professions = [
            ['title' => 'Accountants'],
            ['title' => 'Authors'],
            ['title' => 'Bloggers'],
            ['title' => 'Bloggers'],
            ['title' => 'Consultants'],
            ['title' => 'Content creators'],
            ['title' => 'Copywriters'],
            ['title' => 'Course creators'],
            ['title' => 'Crypto'],
            ['title' => 'Customer support'],
            ['title' => 'Developers'],
            ['title' => 'Ecommerce'],
            ['title' => 'Educators'],
            ['title' => 'Entrepreneur-curious'],
            ['title' => 'Event organizers'],
            ['title' => 'Freelancers'],
            ['title' => 'Graphic designers'],
            ['title' => 'Influencers'],
            ['title' => 'IT/security agencies'],
            ['title' => 'Marketing agencies'],
            ['title' => 'Nonprofits'],
            ['title' => 'Online coaches'],
            ['title' => 'Photographers'],
            ['title' => 'Podcasters'],
            ['title' => 'Product designers'],
            ['title' => 'Product managers'],
            ['title' => 'Project managers'],
            ['title' => 'Real estate'],
            ['title' => 'Recruiters'],
            ['title' => 'Remote teams'],
            ['title' => 'SaaS'],
            ['title' => 'Sales managers'],
            ['title' => 'Small businesses'],
            ['title' => 'Social media managers'],
            ['title' => 'Social media marketers'],
            ['title' => 'Solopreneurs'],
            ['title' => 'Videographers'],
            ['title' => 'Virtual assistants'],
            ['title' => 'Visual artists'],
            ['title' => 'Web design agencies'],
            ['title' => 'Web designers'],
            ['title' => 'YouTubers'],
        ];
        Profession::insert($professions);
    }
}
