<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CartSeeder extends Seeder
{
  public function run(): void
  {

    DB::table('carts')->insert(values: [
      [
        'user_id' => 1,
        'product_id' => 1,
        'quantity' => 2,
        'total_amount' => 100
      ],
      [
        'user_id' => 1,
        'product_id' => 2,
        'quantity' => 3,
        'total_amount' => 100
      ],
      [
        'user_id' => 1,
        'product_id' => 3,
        'quantity' => 4,
        'total_amount' => 100
      ],
      [
        'user_id' => 2,
        'product_id' => 4,
        'quantity' => 5,
        'total_amount' => 100
      ],
      [
        'user_id' => 2,
        'product_id' => 5,
        'quantity' => 10,
        'total_amount' => 100
      ],
      [
        'user_id' => 3,
        'product_id' => 6,
        'quantity' => 7,
        'total_amount' => 100
      ],
    ]);
  }
}