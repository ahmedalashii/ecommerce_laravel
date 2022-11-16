<?php

namespace App\Http\Controllers;

use App\Models\Store;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::withTrashed()->get();
        return view('admin.product.index')->with('products', $products);
    }

    public function create()
    {
        $stores = Store::select('id', 'name')->get();
        return view('admin.product.create')->with('stores', $stores);
    }

    public function edit($id)
    {
        $product = Product::find($id);
        $stores = Store::select('id', 'name')->get();
        return view('admin.product.edit')->with('product', $product)->with('stores', $stores);
    }
}
