<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
class HomePageController extends Controller
{
    public function showCategory()
    {
        $categories = DB::table('categories')
            ->get();

        return view('homepage.index', compact('categories'));
        // return response()->json( $categories );
    }

    public function getProduct(string $category_name)
    {
        $category_id = DB::table('categories')
            ->where('category_name', $category_name)
            ->select('id')
            ->first();

        $products = DB::table('products')
            ->where('category_id', $category_id->id)
            ->get();

        return view('homepage.show-product', compact('products'));
    }
}
