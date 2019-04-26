<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $showProducts = Product::orderBy('id')->take(3)->get();
        
        $products = Product::orderBy('stock', 'asc')
            ->take(12)
            ->where('stock', '>', 0)
            ->get();

        return view('home', compact('products', 'showProducts'));
    }
}
