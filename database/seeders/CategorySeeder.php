<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    public function run()
    {
        $categories = [
            ['category_name' => 'Electronics'],
            ['category_name' => 'Clothing'],
            ['category_name' => 'Books'],
            ['category_name' => 'Home Appliances'],
            ['category_name' => 'Beauty Products'],
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }
    }
}
