<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Order;
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

        return view('cart', compact('cart', 'products', 'cartProducts', 'subtotal'));
    }

    public function cartToOrder(Request $request)
    {
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

        Order::create([
            'user_id' => $user->id,
            'total_amount' => $subtotal,
            'payment' => $subtotal,
            'discount' => 0,
        ]);

        return redirect()->route('profile.show-order');
    }


    // public function showTest()
    // {
    //     $cart = DB::table('carts')->get();

    //     $user_id = 1;
    //     $cartProducts = DB::table('carts')
    //         ->join('products', 'carts.product_id', '=', 'products.id')
    //         ->join('users', 'carts.user_id', '=', 'users.id')
    //         ->join('categories', 'products.category_id', '=', 'categories.id')
    //         ->select(
    //             'carts.*',
    //             'categories.category_name',
    //             'users.username as user_name',
    //             'products.image',
    //             'products.product_name',
    //             'products.price',
    //             DB::raw('products.price * carts.quantity as total_amount')
    //         )
    //         ->where('carts.user_id', $user_id) // Filter the cart products for the specific user
    //         ->get();

    //     if ($cartProducts->isNotEmpty()) {
    //         // Get the username from the first cart product
    //         $user_name = $cartProducts->first()->user_name; // Assuming all cart items have the same username
    //     } else {
    //         $user_name = null; // Handle the case where the cart is empty
    //     }

    //     $subtotal = $cartProducts->sum('total_amount');
    //     $products = DB::table('products')->get();
    //     // return response()->json($cart);

    //     return view('test', compact('cart', 'products', 'cartProducts', 'user_name', 'subtotal'));
    // }

}