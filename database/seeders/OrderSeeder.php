<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Order;
use App\Models\OrderDetail;

class OrderSeeder extends Seeder
{
    public function run()
    {
        $orders = [
            [
                'user_id' => 1,
                'total_amount' => 150.75,
                'discount' => 10.00,
                'order_details' => [
                    ['product_id' => 1, 'quantity' => 2, 'total_price' => 40.00],
                    ['product_id' => 2, 'quantity' => 1, 'total_price' => 60.75],
                    ['product_id' => 3, 'quantity' => 3, 'total_price' => 50.00],
                ]
            ],
            [
                'user_id' => 1,
                'total_amount' => 200.00,
                'discount' => 5.00,
                'order_details' => [
                    ['product_id' => 4, 'quantity' => 1, 'total_price' => 200.00],
                ]
            ],
            [
                'user_id' => 1,
                'total_amount' => 89.99,
                'discount' => 0.00,
                'order_details' => [
                    ['product_id' => 5, 'quantity' => 2, 'total_price' => 45.00],
                    ['product_id' => 6, 'quantity' => 1, 'total_price' => 44.99],
                ]
            ],
            [
                'user_id' => 1,
                'total_amount' => 300.50,
                'discount' => 20.50,
                'order_details' => [
                    ['product_id' => 7, 'quantity' => 1, 'total_price' => 150.00],
                    ['product_id' => 8, 'quantity' => 2, 'total_price' => 150.50],
                ]
            ],
        ];

        foreach ($orders as $orderData) {
            // Calculate payment as total_amount - discount
            $payment = $orderData['total_amount'] - $orderData['discount'];

            // Create the order
            $order = Order::create([
                'user_id' => $orderData['user_id'],
                'total_amount' => $orderData['total_amount'],
                'payment' => $payment, // Insert calculated payment
                'discount' => $orderData['discount'],
            ]);

            // Insert order details
            foreach ($orderData['order_details'] as $detail) {
                OrderDetail::create([
                    'order_id' => $order->id,
                    'product_id' => $detail['product_id'],
                    'quantity' => $detail['quantity'],
                    'total_price' => $detail['total_price'],
                ]);
            }
        }
    }
}
