<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    // Function to show the product page
    public function showProductPage($id)
    {
        $product = Product::find($id);

        if (!$product) {
            return redirect()->back()->with('error', 'Product not found.');
        }

        
        return view('product.show', compact('product'));
    }
    public function getAllProducts()
    {
        $products = Product::all();
        return view('product.index', compact('products'));
    }

}
