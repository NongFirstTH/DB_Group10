<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    public function run()
    {
        $products = [
            [
                'category_id' => 1, // Electronics
                'product_name' => 'Smartphone',
                'description' => 'Latest model smartphone with advanced features.',
                'price' => 699.99,
                'quantity' => 50,
                'image' => 'images/smartphone.jpg'
            ],
            [
                'category_id' => 1, // Electronics
                'product_name' => 'Laptop',
                'description' => 'Powerful laptop suitable for gaming and work.',
                'price' => 1299.99,
                'quantity' => 30,
                'image' => 'images/laptop.jpg'
            ],
            [
                'category_id' => 2, // Clothing
                'product_name' => 'T-Shirt',
                'description' => 'Comfortable cotton t-shirt available in various colors.',
                'price' => 19.99,
                'quantity' => 100,
                'image' => 'images/tshirt.jpg'
            ],
            [
                'category_id' => 3, // Books
                'product_name' => 'Novel',
                'description' => 'A thrilling novel that keeps you on the edge of your seat.',
                'price' => 14.99,
                'quantity' => 200,
                'image' => 'images/novel.jpg'
            ],
            [
                'category_id' => 4, // Home Appliances
                'product_name' => 'Air Conditioner',
                'description' => 'Energy-efficient air conditioner for home use.',
                'price' => 499.99,
                'quantity' => 15,
                'image' => 'images/ac.jpg'
            ],
            [
                'category_id' => 5, // Beauty Products
                'product_name' => 'Face Cream',
                'description' => 'Moisturizing face cream for all skin types.',
                'price' => 29.99,
                'quantity' => 75,
                'image' => 'images/face_cream.jpg'
            ],
        ];

        foreach ($products as $product) {
            Product::create($product);
        }
    }
}
