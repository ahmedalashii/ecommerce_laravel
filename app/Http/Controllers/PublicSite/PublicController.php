<?php

namespace App\Http\Controllers\PublicSite;

use App\Models\Store;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class PublicController extends Controller
{
    public function index()
    {
        // These are the stores that selling the most (that has the most occurrences in purchase transactions) ..
        $stores = Store::select(DB::raw('COUNT(stores.id) as number_of_purchases, stores.*'))
            ->join('products', 'products.store_id', '=', 'stores.id')
            ->join('purchase_transactions', 'purchase_transactions.product_id', '=', 'products.id')
            ->orderBy('number_of_purchases', 'DESC')
            ->groupBy('stores.id')
            ->take(4)
            ->get();
        return view('public_site.index')->with('stores', $stores);
    }
}
