<?php

namespace App\Repositories;

use App\Interfaces\ProductInterface;
use App\Models\Product;

class ProductRepositories implements ProductInterface
{
    public function findAll()
    {
        $product = Product::get();
        if (is_null($product)) return;
        return $product;
    }
    public function findById($id)
    {
        $product = Product::find($id);
        if (is_null($product)) return;
        return $product;
    }
}
