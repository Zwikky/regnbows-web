<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create([
            "name" => "Corporate World",
            "imageUrl" => "../images/categories/corporate.jpg",
            "order" => 1
        ]);

        Category::create([
            "name" => "Fashion",
            "imageUrl" => "../images/categories/fashion.jpg",
            "order" => 2
        ]);

        Category::create([
            "name" => "Food Court",
            "imageUrl" => "../images/categories/corporate.jpg",
            "order" => 3
        ]);
    }
}