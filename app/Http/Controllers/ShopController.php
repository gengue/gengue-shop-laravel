<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Product;
use App\Sale;
use App\Order;

class ShopController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    //public function __construct()
    //{
        //$this->middleware('auth');
    //}
    //

    public function index()
    {
        $products = Product::all();
        return view('home', array('products' => $products));
    }

    public function detail($slug)
    {
        $product = Product::where('slug', '=', $slug)->first();
        $products = Product::all();
        return view('detail', ['product' => $product, 'products' => $products]);
    }

    public function get_payment()
    {
        $products = Product::all();
        return view('checkout', array('products' => $products));
    }

    public function post_payment(Request $request)
    {
        $input = $request->all();


        $total = 0;
        $sale = new Sale;
        $sale->user_id = \Auth::user()->id;
        $sale->save();
        foreach ($input['products'] as $data) {
            $product = Product::find($data['id']);
            $order = new Order;
            $order->product_id = $product->id;
            $order->sale_id = $sale->id;
            $order->units = $data['units'];
            $order->save();
            $total += intval($data['units']) * $product->price;
            $product -= $order->units;
            $product->save();
        }
        $sale->total = $total;
        $sale->save();
        return response()->json(['msg' => 'ok', 'status' => 201]);
    }
}
