<?php

namespace Database\Seeders;

use App\Models\Cart;
use Illuminate\Database\Seeder;
use SebastianBergmann\Type\VoidType;

class CartSeeder extends Seeder
{
  public function run(): void
  {
    DB::table('carts')->insert(values: [
      [
        'user_id' => 1,
        'product_id' => 1,
        'quantity' => 2,
      ],
      [
        'user_id' => 1,
        'product_id' => 2,
        'quantity' => 1,
      ],
      [
        'user_id' => 1,
        'product_id' => 3,
        'quantity' => 3,
      ],
    ]);
  }
}