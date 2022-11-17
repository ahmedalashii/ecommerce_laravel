<?php

namespace App\Http\Controllers\Admin;

use App\Models\Store;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\PurchaseTransaction;

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
        $stores_count = Store::count(); // non-trashed
        $products_count = Product::count();
        $purchase_transactions_count = PurchaseTransaction::count();
        return view('admin.index')->with('stores_count', $stores_count)->with('products_count', $products_count)->with('purchase_transactions_count', $purchase_transactions_count);
    }
}
