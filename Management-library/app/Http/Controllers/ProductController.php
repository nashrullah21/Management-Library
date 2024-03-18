<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class ProductController extends Controller
{
    public function productDetail($id)
    {
        $products = Product::find($id);
        // dd($products);
        return view('/detailProduct')->with('products', $products);
    }
    public function index()
    {
        $products = Product::all();
        return view('/home',)->with('products', $products);
    }
    public function showProducts()
    {
        return view('/addProduct');
    }
    public function addProducts(Request $request)
    {
        $this->validate($request, []);

        $imageName = null;
        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('images'), $imageName);
        }

        Product::create([
            'title' => $request->title,
            'image' => $imageName,
            'stock' => $request->stock,
            'price' => $request->price,
            'desc' => $request->desc,
        ]);

        return redirect('/');
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

        return redirect('/');
    }
    public function deletedProduct($id)
    {
        $product = Product::find($id);
        $product->delete();
        return redirect('/');
    }
    public function createTransaction(Request $request)
    {
        // dd($request->all());

        $this->validate($request, [
            'product_id' => 'required|integer',
            "quantity" => "required|integer|min:1"
        ]);
        DB::beginTransaction();

        try {

            // dd(Auth::user());
            $product = Product::findOrfail($request->product_id);
            if ($product->stock < $request->quantity) {
                throw new \Exception('Insufficient stock for product.');
            }
            $product->decrement('stock', $request->quantity);

            $product->save();
            $transaction = new Transaction;
            $transaction->product_id = $request->product_id;
            $transaction->quantity = $request->quantity;
            $transaction->total_price = $request->quantity * $product->price;
            $transaction->user_id = Auth::user()->id;
            $transaction->save();

            DB::commit();
            return redirect('/product');
        } catch (\Throwable $e) {
            DB::rollBack();
            return back()->with('error', $e->getMessage());
        }
    }
}
