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
        return view('cart', compact('cart'));
        // return response()->json($cart);
    }
}