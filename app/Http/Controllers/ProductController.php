<?php

namespace App\Http\Controllers;

use App\Models\Store;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $paginate = 5;
        $products = Product::withTrashed()->paginate($paginate);
        return view('admin.product.index')->with('products', $products);
    }

    public function create()
    {
        $stores = Store::select('id', 'name')->get();
        return view('admin.product.create')->with('stores', $stores);
    }

    public function store()
    {
    }

    public function edit(Product $product)
    {
        $stores = Store::select('id', 'name')->get();
        return view('admin.product.edit')->with('product', $product)->with('stores', $stores);
    }

    public function update(Request $request, $id)
    {
    }

    public function destroy($id)
    {
    }

    public function restore($id)
    {
    }
}
