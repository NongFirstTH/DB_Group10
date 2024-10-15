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
        'price_per_item' => 2,
        'quantity' => 2,
      ]
    ]);
  }
}