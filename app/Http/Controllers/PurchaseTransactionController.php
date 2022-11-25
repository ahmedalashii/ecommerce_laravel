<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\PurchaseTransaction;

class PurchaseTransactionController extends Controller
{
    public function index()
    {
        $per_page = 5;
        $purchase_transactions = PurchaseTransaction::withTrashed()->with(['product', 'product.store'])->paginate($per_page);
        return view('admin.purchase_transaction.index')->with('purchase_transactions', $purchase_transactions);
    }

    public function report()
    {
        $per_page = 5;
        // For Every product >> We want to get the total of purchase prices of this product
        // First Way doing this:
        // $purchase_transactions = PurchaseTransaction::withTrashed()->select(DB::raw('SUM(purchase_price) as total_purchases'), 'products.name')
        //     ->join('products', 'purchase_transactions.product_id', '=', 'products.id')
        //     ->orderBy('total_purchases', 'DESC')
        //     ->groupBy('products.name')
        //     ->get();

        // Second Way (Grouping by name, id, and store_name):
        $products = Product::withTrashed()->select(DB::raw('SUM(purchase_transactions.purchase_price) as total_purchases, MAX(purchase_transactions.created_at) as last_purchase'), 'products.name', 'products.id', 'stores.name as store_name')
            ->join('purchase_transactions', 'purchase_transactions.product_id', '=', 'products.id')
            ->join('stores', 'stores.id', '=', 'products.store_id')
            ->orderBy('total_purchases', 'DESC')
            ->groupBy('products.name', 'products.id', 'stores.name')
            ->paginate($per_page);

        return view('admin.purchase_transaction.report')->with('products', $products);
    }
}
