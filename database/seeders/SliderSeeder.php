<?php

namespace Database\Seeders;

use App\Models\Slider;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SliderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Slider::create(['image' => asset('/images/slides/slide1.png'), 'link' => '#']);
        Slider::create(['image' => asset('/images/slides/slide2.png'), 'link' => '#']);
        Slider::create(['image' => asset('/images/slides/slide3.png'), 'link' => '#']);
        Slider::create(['image' => asset('/images/slides/slide4.png'), 'link' => '#']);
        Slider::create(['image' => asset('/images/slides/slide5.png'), 'link' => '#']);
        Slider::create(['image' => asset('/images/slides/slide6.png'), 'link' => '#']);
    }
}
