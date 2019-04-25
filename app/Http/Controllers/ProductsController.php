<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class ProductsController extends Controller
{
    public function index() 

    {
    	$products = Product::orderBy('id', 'desc')->get();

    	return view('products/index', compact('products'));
    }

    public function show(Product $product)
    {
    	return view('products.show', compact('product'));
    }

}
