<?php

namespace App\Http\Controllers;

use App\Models\Product;
use http\Env\Request;

class ProductController
{
public function create()
{
    $products = Product::all();
    return view('products.create');
}
    public function store(Request $request)
    {
        $request->validate
        ([
           'name' => 'required|min:3',
           'price' => 'required|numeric|min:0',
           'description' => 'string'
        ]);
        Product::create([
            'name' => 'required|min:3',
            'price' => 'required|numeric|min:0',
            'description' => 'string'
        ]);
        return redirect('/products');
    }
    public function edit(Product $product)
    {
        return view('products.edit',
        [
            'product' => $product,
        ]);
    }
    public function update(Request $request, Product $product)
    {
        $request->validate
        ([
            'name' => 'required|min:3',
            'price' => 'required|numeric|min:0',
            'description' => 'string'
        ]);
        $product->update([
            'name' => 'required|min:3',
            'price' => 'required|numeric|min:0',
            'description' => 'string'
        ]);
        return redirect('/products');
    }
    public function destroy(Product $product)
    {
        $product -> delete();
        return redirect('/products');
    }
    public function show(Product $product)
    {
        return redirect('products.show', ['product' => $product]);
    }
}
