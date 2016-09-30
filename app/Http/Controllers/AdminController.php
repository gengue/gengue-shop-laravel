<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Product;
use App\Sale;
use App\Order;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth.admin');
    }


    public function index()
    {
        return view('admin/home');
    }

    public function list_products()
    {
        $products = Product::all();
        return view('admin/list_products', ['products' => $products]);
    }

    public function new_product()
    {
        return view('admin/product_form');
    }

    public function create_product(Request $request)
    {
        $product = new Product;
        $product->name = $request->get('name');
        $product->description = $request->get('description');
        $product->features = $request->get('features');
        $product->price = $request->get('price');
        $product->stock = $request->get('stock');
        $product->slug = str_slug($product->name);

        if($file = $request->file('img')){
            $imageName = '_'.$file->getClientOriginalName();
            $path = base_path() . '/public/images/products/';
            $file->move($path, $imageName);
            $product->img = '/images/products/'.$imageName;
        }
        $product->save();

        return redirect('/admin/products');
    }

    public function edit_product($id)
    {
        $product = Product::find($id);

        return view('admin/product_form', ['product' => $product]);
    }

    public function update_product(Request $request, $id)
    {
        $product = Product::find($id);
        $product->name = $request->get('name');
        $product->description = $request->get('description');
        $product->features = $request->get('features');
        $product->price = $request->get('price');
        $product->stock = $request->get('stock');

        if($file = $request->file('img')){
            $imageName = '_'.$file->getClientOriginalName();
            $path = base_path() . '/public/images/products/';
            $file->move($path, $imageName);
            $product->img = '/images/products/'.$imageName;
        }
        $product->save();
        return redirect('/admin/products');
    }


    public function list_sales()
    {
        $sales = Sale::all();
        return view('admin/list_sales', ['sales' => $sales]);
    }

    public function destroy_product($id)
    {
        $product = Product::find($id);
        $product->delete();
        return redirect('/admin/products');
    }
}
