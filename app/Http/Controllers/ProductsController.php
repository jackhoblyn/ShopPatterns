<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class ProductsController extends Controller
{
    public function index() 

    {
    	$products = Product::orderBy('id', 'desc')
    		->take(100)
    		->where('stock', '>', 0)
    		->get();

    	return view('products/index', compact('products'));
    }

    public function show(Product $product)
    {
    	return view('products.show', compact('product'));
    }

}
