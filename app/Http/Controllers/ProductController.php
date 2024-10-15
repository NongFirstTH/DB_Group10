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
}

    
   

