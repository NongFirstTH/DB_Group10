<?php

namespace App\Http\Controllers;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function showOrders()
    {   
        // $user = Auth::user();
        // $orders = Order::all();
        // // $orders = Order::where('user_id', Auth::user()->id)->get();
        $orders = Order::with('order_details')->where('user_id', Auth::id())->get();

        // dd($orders);
        // Log::info('User Orders:', $orders->toArray());

        return view('profile.show-order', compact('orders')); 
        // return response()->json($orders); 
    }
}