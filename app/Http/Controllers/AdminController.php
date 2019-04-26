<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\User;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $products = Product::orderBy('stock', 'asc')
            ->take(100)
            ->where('stock', '>', 0)
            ->get();

            
        return view('admin/home', compact('products'));
    }

     public function show(User $user)
    {
        return view('admin/show', compact('user'));
    }

    public function customers()
    {

        $customers = User::orderBy('id', 'desc')
            ->take(10)
            ->get();

            
        return view('admin/customers', compact('customers'));
    }
}
