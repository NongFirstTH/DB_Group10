<?php
namespace App\Http\Controllers;
use App\Models\OrderDetail;
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

    // $request->validate([
    //     'total_amount' => 'required|numeric',
    // ]);

    // $products = $request->products;
    // $subtotal = $request->subtotal;
    // $discount = $request->discount;
    // $total = $request->total;

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

    $discount = 0;
    if ($subtotal > 1000) {
      $discount = 0.1 * $subtotal;
    }

    Cart::where('user_id', $user->id)->delete();

    // Create a new order
    Order::create([
      'user_id' => $user->id,
      'total_amount' => $subtotal,
      'payment' => $subtotal - $discount,
      'discount' => $discount,
    ]);

    // Get the latest order id
    $order_id = Order::latest()->first()->id;

    // Insert the cart products into the order details table
    foreach ($cartProducts as $cartProduct) {
      $total_price = $cartProduct->price * $cartProduct->quantity;
      OrderDetail::create([
        'order_id' => $order_id,
        'product_id' => $cartProduct->product_id,
        'quantity' => $cartProduct->quantity,
        'total_price' => $total_price,
      ]);
    }

    // Reduce the stock
    foreach ($cartProducts as $cartProduct) {
      $product = DB::table('products')->where('id', $cartProduct->product_id)->first();
      $new_quantity = $product->quantity - $cartProduct->quantity;
      DB::table('products')->where('id', $cartProduct->product_id)->update(['quantity' => $new_quantity]);
    }


    return redirect()->route('cart')->with('success', 'Order has been placed successfully!');
  }
}