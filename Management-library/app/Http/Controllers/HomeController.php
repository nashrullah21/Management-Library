<?php

namespace App\Http\Controllers;

use App\Models\Product;

class HomeController extends Controller
{

    public function getAllProduct()
    {
        $products = Product::all();
        return view('/home',)->with('products', $products);
    }
}
