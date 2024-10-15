<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class CartController extends Controller
{
    //
    public function showCart()
    {
        $cart = DB::table('carts')->get();

        $cartProducts = DB::table('carts')
            ->join('products', 'carts.product_id', '=', 'products.id')
            ->select('carts.*', 'products.image', 'products.product_name', 'products.price')->where('carts.user_id', 1)
            ->get();


        $products = DB::table('products')->get();
        // return response()->json($cart);
        return view('cart', compact('cart', 'products', 'cartProducts'));
    }
}