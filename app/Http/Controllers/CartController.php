<?php

namespace App\Http\Controllers;

use App\Models\OrderDetail;
use App\Models\Product;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Order;
use App\Models\Cart;

class CartController extends Controller
{
  //
  public function showCart()
  {
    $cart = DB::table('carts')->get();

    $user = Auth::user();

    $cartProducts = DB::table('carts')
      ->join('products', 'carts.product_id', '=', 'products.id')
      ->join('users', 'carts.user_id', '=', 'users.id')
      ->join('categories', 'products.category_id', '=', 'categories.id')
      ->select(
        'carts.*',
        'categories.category_name',
        'users.username as user_name',
        'products.image',
        'products.product_name',
        'products.price',
        'products.quantity as stock',
        DB::raw('products.price * carts.quantity as total_amount')
      )
      ->where('carts.user_id', $user->id) // Filter the cart products for the specific user
      ->get();

    $subtotal = $cartProducts->sum('total_amount');
    $products = DB::table('products')->get();

    $discount = 0;
    if ($subtotal > 1000) {
      $discount = 0.1 * $subtotal;
    }

    return view('cart.show', compact('cart', 'products', 'cartProducts', 'subtotal', 'discount'));
  }

  public function checkout(Request $request)
  {
    $user = Auth::user();

    $validatedData = $request->validate([
      'subtotalAmount' => 'required|numeric',
      'discountAmount' => 'required|numeric',
      'totalAmount' => 'required|numeric',
      'products' => 'required|array',
    ]);

    $subtotal = $validatedData['subtotalAmount'];
    $discount = $validatedData['discountAmount'];
    $total = $validatedData['totalAmount'];
    $products = $validatedData['products'];

    foreach ($products as $cartProduct) {
      $product = DB::table('products')->where('product_name', $cartProduct['name'])->first();

      // Check if the product exists
      if (!$product) {
        return redirect()->route('cart.show')->with('error', 'Product not found: ' . $cartProduct['name']);
      }

      // Check if ordered quantity exceeds stock
      if ($cartProduct['quantity'] > $product->quantity) {
        return redirect()->route('cart.show')->with('error', 'Order failed! ' . $product->product_name . ' stock is not enough!');
      }
    }

    // Create a new order
    $order = Order::create([
      'user_id' => $user->id,
      'total_amount' => $subtotal,
      'payment' => $total,
      'discount' => $discount,
    ]);

    // Get the latest order id
    $order_id = $order->id;

    foreach ($products as $cartProduct) {
      $product = DB::table('products')->where('product_name', $cartProduct['name'])->first();

      // Skip added to order_detail if quantity is 0
      if ($cartProduct['quantity'] == 0) {
        continue;
      }

      OrderDetail::create([
        'order_id' => $order_id,
        'product_id' => $product->id,
        'quantity' => $cartProduct['quantity'],
        'total_price' => $product->price * $cartProduct['quantity'],
      ]);

      // Reduce the stock
      $new_quantity = $product->quantity - $cartProduct['quantity'];
      DB::table('products')->where('id', $product->id)->update(['quantity' => $new_quantity]);
    }

    // Clear the cart
    Cart::where('user_id', $user->id)->delete();

    return view('order.confirmation');
    // return redirect()->route('cart.show')->with('success', 'Checkout Succesfully!');
  }

  public function update(Request $request, $id)
  {
    $item = Cart::find($id); // Find the cart item

    // Validate input quantity
    // If user is increasing or decreasing using buttons
    if ($request->action === 'increase') {
      if ($item->quantity >= $item->product->quantity) {
        $item->quantity = $item->product->quantity;
      } else {
        $item->quantity++;
      }
    } elseif ($request->action === 'decrease' && $item->quantity > 1) {
      $item->quantity--;
    } else {
      if ($request->quantity > $item->product->quantity) {
        $item->quantity = $item->product->quantity;
      } else {
        $item->quantity = $request->quantity;
      }
    }
    $item->save(); // Save changes to the database

    return redirect()->route('cart.show')->with('success', 'Cart updated successfully.');
  }

  // Remove an item from the cart
  public function destroy($id)
  {
    $item = Cart::find($id); // Find the cart item
    $item->delete(); // Delete the item

    return redirect()->route('cart.show')->with('success', 'Item removed from cart.');
  }
}