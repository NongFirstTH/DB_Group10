<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class CategorySeeder extends Seeder
{
    public function run()
    {
        DB::table('categories')->insert([
            ['id' => 1, 'category_name' => 'Dog Foods'],
            ['id' => 2, 'category_name' => 'Dog Toys'],
            ['id' => 3, 'category_name' => 'Dog Items'],
        ]);
    }
}
