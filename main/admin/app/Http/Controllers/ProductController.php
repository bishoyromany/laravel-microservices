<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(){
        return Product::all();
    }


    public function show(Product $product){
        return $product;
    }

    public function store(Request $request){
        $product = Product::create($request->only('title', 'image'));

        return response($product, 201);
    }


    public function update(Product $product, Request $request){
        $product->update($request->only('title', 'image'));

        return response($product, 202);
    }

    public function destroy(Product $product){
        $product->delete();

        return response(null, 204);
    }
}
