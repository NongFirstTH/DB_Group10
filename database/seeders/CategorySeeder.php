<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    public function run()
    {
        DB::table('categories')->insert([
            ['id' => 1, 'category_name' => 'Dog_Food'],
            ['id' => 2, 'category_name' => 'Dog_Toys'],
            ['id' => 3, 'category_name' => 'Dog_Grooming'],
        ]);
    }
}