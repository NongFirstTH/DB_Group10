<?php

namespace App\Http\Controllers;

use App;
use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use App\Models\Cart;
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
    $user = Auth::user();

    // ตรวจสอบว่าสินค้าอยู่ในตะกร้าอยู่แล้วหรือไม่
    $cartItem = Cart::where('user_id', $user->id)
                    ->where('product_id', $request->product_id)
                    ->first(); // ใช้ first() เพื่อดึงข้อมูลจริง

    if ($cartItem) {
        // ถ้ามีสินค้าในตะกร้าแล้ว ให้เพิ่มจำนวนสินค้า
        $cartItem->quantity += $request->quantity;
        $cartItem->total_amount = $cartItem->quantity * $request->price;
        $cartItem->save();
    } else {
        // ถ้ายังไม่มีในตะกร้า ให้สร้างรายการใหม่
        Cart::create([
            'user_id' => $user->id,
            'product_id' => $request->product_id,
            'quantity' => $request->quantity,
            'total_amount' => $request->quantity * $request->price,
        ]);
    }

    // ตอบกลับข้อมูลเป็น JSON โดยไม่เปลี่ยนหน้า
    return response()->json([
        'status' => 'success',
        'message' => 'Product added to cart successfully!',
        'cartItemCount' => Cart::where('user_id', $user->id)->count() // จำนวนสินค้าทั้งหมดในตะกร้า
    ]);
}

}

    
   

