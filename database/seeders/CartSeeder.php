<?php

namespace Database\Seeders;

use App\Models\Cart;
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
        'total_amount' => 120,
        'quantity' => 2,
      ],
      [
        'user_id' => 1,
        'product_id' => 2,
        'total_amount' => 360,
        'quantity' => 1,
      ],
      [
        'user_id' => 1,
        'product_id' => 3,
        'total_amount' => 450,
        'quantity' => 3,
      ],
    ]);
  }
}