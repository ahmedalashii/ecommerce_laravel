<?php

namespace App\Http\Controllers;

use App\Models\Store;
use Illuminate\Http\Request;

class StoreController extends Controller
{
    public function index()
    {
        $stores = Store::withTrashed()->get();
        return view('admin.product.index')->with('stores', $stores);
    }

    public function create()
    {
        return view('admin.product.create');
    }

    public function edit($id)
    {
        $store = Store::find($id);
        return view('admin.product.edit')->with('store', $store);
    }
}
