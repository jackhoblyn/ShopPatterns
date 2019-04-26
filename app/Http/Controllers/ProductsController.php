<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class ProductsController extends Controller
{
    public function index() 

    {
    	$products = Product::orderBy('stock', 'asc')
    		->take(100)
    		->where('stock', '>', 0)
    		->get();

    	return view('products/index', compact('products'));
    }

    public function show(Product $product)
    {
    	return view('products.show', compact('product'));
    }

    public function increase(Product $product)
    {
        $product->restock();

        return redirect()->route('admin.dashboard');
    }

    public function decrease(Product $product)
    {
        $product->buy();

        return redirect()->route('admin.dashboard');
    }

    public function edit(Product $product)

    {
         return view('products.edit', compact('product'));

    }

    public function update(Product $product)

     {
        $stock = request('stock');

        $product->stock = $stock;
        $product->save();
       
        return redirect()->route('admin.dashboard');
    }



}
