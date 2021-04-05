<?php

namespace Database\Seeders;

use App\Models\Slider;
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
        Slider::create([
            "title" => "Winter Clearance",
            "imageUrl" => "./assets/images/sliders/winter.jpg",
            "company" => 2,
            "duration" => 20,
            "status" => 1
        ]);

        Slider::create([
            "title" => "20% Accomodation Discount",
            "imageUrl" => "./assets/images/sliders/discount.jpg",
            "company" => 3,
            "duration" => 20,
            "status" => 1
        ]);

        Slider::create([
            "title" => "Free Lunch",
            "imageUrl" => "./assets/images/sliders/winter.jpg",
            "company" => 5,
            "duration" => 20,
            "status" => 1
        ]);

        Slider::create([
            "title" => "Small Loans",
            "imageUrl" => "./assets/images/sliders/loans.jpg",
            "company" => 6,
            "duration" => 20,
            "status" => 1
        ]);
    }
}