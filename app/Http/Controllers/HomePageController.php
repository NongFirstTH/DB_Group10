<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
class HomePageController extends Controller
{
    public function showHomePage() {
        $categories = DB::table('categories')
        // ->where('category_name' , 'food')
        ->get();

        $products = DB::table('products')
        ->get();

        return view('homepage.index', compact('categories' ,'products') );
        // return response()->json( $categories );
    }
}
