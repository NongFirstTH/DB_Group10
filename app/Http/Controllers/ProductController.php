<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    // Function to show the product page
    public function showProductPage($id)
    {
        // Fetch the product from the database
        $product = Product::find($id);

        // Check if the product exists
        if (!$product) {
            // Instead of redirecting, you can return a custom error view or message
            return view('errors.product_not_found');
        }

        // Product exists, so render the product page
        return view('product.show', compact('product'));
    }

    public function addToCart(Request $request)
    {
        // Validate the incoming request
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1',
            'price' => 'required|numeric|min:0', // Ensure the price is provided
        ]);

        $user = Auth::user();

        $product = Product::find($request->product_id);
        $cartItem = Cart::where('user_id', $user->id)
            ->where('product_id', $request->product_id)
            ->first();

        if ($cartItem) {
            // If the product is already in the cart, increase the quantity
            $cartItem->quantity += $request->quantity;
            $cartItem->total_amount = $cartItem->quantity * $product->price;
            $cartItem->save();
        } else {
            // If the product is not in the cart, create a new cart item
            $totalAmount = $product->price * $request->quantity;
            
            Cart::create([
                'user_id' => $user->id,
                'product_id' => $request->product_id,
                'quantity' => $request->quantity,
                'total_amount' =>  $totalAmount,
            ]);
        }

        return view('product.show', compact('product'));
    }
}
