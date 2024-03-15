<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('/product',)->with('product', $products);
    }
    public function showProducts()
    {
        return view('/addProduct');
    }
    public function addProducts(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'image' => 'required',
            'stock' => 'required',
            'price' => 'required',
            'desc' => 'required',
        ]);
        Product::create([
            'title' => $request->title,
            'image' => $request->image,
            'stock' => $request->stock,
            'price' => $request->price,
            'desc' => $request->desc,
        ]);
        return redirect('/product');
    }

    public function showEditProduct($id)
    {
        $findproductByid = Product::find($id);
        return view('editProduct', ['Product' => $findproductByid]);
    }
    public function editProduct($id, Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'image' => 'required',
            'stock' => 'required',
            'price' => 'required',
            'desc' => 'required',
        ]);
        $product = Product::find($id);
        $product->title = $request->title;
        $product->image = $request->image;
        $product->stock = $request->stock;
        $product->price = $request->price;
        $product->desc = $request->desc;
        $product->save();

        return redirect('/product');
    }
    public function deletedProduct($id)
    {
        $product = Product::find($id);
        $product->delete();
        return redirect('/product');
    }
}
