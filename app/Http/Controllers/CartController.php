<?php
namespace App\Http\Controllers;
use App\Models\OrderDetail;
use App\Models\Product;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Order;
use App\Models\Cart;
use Illumincate\Support\Facades\Log;

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

    return view('cart', compact('cart', 'products', 'cartProducts', 'subtotal', 'discount'));
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
        DB::raw('products.price * carts.quantity as total_amount')
      )
      ->where('carts.user_id', $user->id) // Filter the cart products for the specific user
      ->get();



    $discount = 0;
    $subtotal = 0;
    $total = 0;
    // Handle zero value when nothing change
    // if ($validatedData['subtotalAmount'] != 0) {
    //   $subtotal = $validatedData['subtotalAmount'];
    //   $discount = $validatedData['discountAmount'];
    //   $total = $validatedData['totalAmount'];
    // } else {
    //   $subtotal = $cartProducts->sum('total_amount');
    //   if ($subtotal > 1000) {
    //     $discount = 0.1 * $subtotal;
    //     $total = $subtotal - $discount;
    //   }
    // }


    $subtotal = $validatedData['subtotalAmount'];
    $discount = $validatedData['discountAmount'];
    $total = $validatedData['totalAmount'];
    $products = $validatedData['products'];

    Cart::where('user_id', $user->id)->delete();

    // Create a new order
    Order::create([
      'user_id' => $user->id,
      'total_amount' => $subtotal,
      'payment' => $total,
      'discount' => $discount,
    ]);


    // Get the latest order id
    $order_id = Order::latest()->first()->id;

    foreach ($products as $cartProduct) {
      $product = Product::where('product_name', $cartProduct['name'])->first();
      OrderDetail::create([
        'order_id' => $order_id,
        'product_id' => $product->id,
        'quantity' => $cartProduct['quantity'],
        'total_price' => $product->price * $cartProduct['quantity'],
      ]);

      $new_quantity = $product->quantity - $cartProduct['quantity'];
      DB::table('products')->where('id', $product->id)->update(['quantity' => $new_quantity]);
    }

    // Insert the cart products into the order details table
    // foreach ($cartProducts as $cartProduct) {
    //   $total_price = $cartProduct->price * $cartProduct->quantity;
    //   OrderDetail::create([
    //     'order_id' => $order_id,
    //     'product_id' => $cartProduct->product_id,
    //     'quantity' => $cartProduct->quantity,
    //     'total_price' => $total_price,
    //   ]);
    // }

    // Reduce the stock
    // foreach ($products as $cartProduct) {
    //   $product = DB::table('products')->where('name', $cartProduct['name'])->first();
    //   $new_quantity = $product->quantity - $cartProduct['quantity'];
    //   DB::table('products')->where('name', $cartProduct['name'])->update(['quantity' => $new_quantity]);
    // }

    // Old Reduce the stock
    // foreach ($cartProducts as $cartProduct) {
    //   $product = DB::table('products')->where('id', $cartProduct->product_id)->first();
    //   $new_quantity = $product->quantity - $cartProduct->quantity;
    //   DB::table('products')->where('id', $cartProduct->product_id)->update(['quantity' => $new_quantity]);
    // }


    return redirect()->route('cart')->with('success', 'Order has been placed successfully!');
    // return response()->json([
    //   'message' => 'Checkout successful!',
    //   'user' => $user->name, // Example of returning user info
    //   'total' => $subtotal - $discount,
    //   'subtotal' => $subtotal,
    //   'discount' => $discount,

    // ]);
  }
}