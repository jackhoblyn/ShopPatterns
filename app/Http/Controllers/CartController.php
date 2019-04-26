<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Darryldecode\Cart\CartCondition;
use App\Order;
use App\Product;


class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $userId = auth()->user()->id; 

        $items = \Cart::session($userId)->getContent();

        return view('products/cart', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $userId = auth()->user()->id; // get this from session or wherever it came from

        $id = request('id');
        $name = request('name');
        $price = request('price');
        $qty = request('qty');
        $image = request('image');
        $manufacturer = request('manufacturer');

        $customAttributes = ['manufacturer' => $manufacturer, 'image' => $image];
        
        $item = \Cart::session($userId)->add($id, $name, $price, $qty, $customAttributes);

        return redirect()->route('home')->with('message', 'Item added to cart');

            
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $userId = auth()->user()->id;

        if(request()->ajax())
        {
            $items = [];
            \Cart::session($userId)->getContent()->each(function($item) use (&$items)
            {
                $items[] = $item;
            });
            return response(array(
                'success' => true,
                'data' => $items,
                'message' => 'cart get items success'
            ),200,[]);
        }
        else
        {
            return redirect()->route('cart.index');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function checkout()
    {
        $userId = auth()->user()->id; 

        $items = \Cart::session($userId)->getContent();

        return view('products/checkout', compact('items'));
    }

    public function pay()
    {
        $userId = auth()->user()->id;

        // $name = request('name');
        // $address1 = request('address1');
        // $address2 = request('address2');
        // $country = request('country');
        // $cardnum = request('name');
        // $expMonth = request('expMonth');
        // $expYear = request('expYear');
        // $cvc = request('CVC');

        $items = \Cart::session($userId)->getContent();

        $amount = $items->sum('price');

        $order = Order::create([
            'user_id' => $userId,
            'name' => request('name'),
            'address1' => request('address1'),
            'address2' => request('address2'),
            'country' => request('country'),
            'card_number' => request('cardnum'),
            'expMonth' => request('expMonth'),
            'expYear' => request('expYear'),
            'CVC' => request('CVC'),
            'amount' => $amount
        ]);

        foreach ($items as $item)
        {
            $product = Product::find($item->id);
            $product->buy();
        }

        \Cart::session($userId)->clear();

        return redirect()->route('home')->with('message', 'Thank you for your purchase!');


        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $userId = auth()->user()->id;

        \Cart::session($userId)->remove($id);

        return redirect()->route('cart.index');

        //dd('delete' . $id);
    }
}
