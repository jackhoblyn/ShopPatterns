<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class SearchController extends Controller
{
    public function show(Request $request)
    {
    	$search = request('q');

    	$sort = trim($request->input('sort'));
    	$sort = in_array($sort, ['id', 'manufacturer', 'category', 'price']) ? $sort : 'name';

    	$products = Product::search($search)->orderBy($sort)->paginate(100);

    	if (request()->expectsJson()) {
    		return $products;
    	}

    	return view('products/index', compact('products'));
    }

    public function adminshow(Request $request)
    {
        $search = request('q');

        $sort = trim($request->input('sort'));
        $sort = in_array($sort, ['id', 'manufacturer', 'category', 'price']) ? $sort : 'name';

        $products = Product::search($search)->orderBy($sort)->paginate(100);

        if (request()->expectsJson()) {
            return $products;
        }

        return view('admin/home', compact('products'));
    }
}
