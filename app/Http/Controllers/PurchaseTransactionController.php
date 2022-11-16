<?php

namespace App\Http\Controllers;

use App\Models\PurchaseTransaction;
use Illuminate\Http\Request;

class PurchaseTransactionController extends Controller
{
    public function index()
    {
        $purchase_transactions = PurchaseTransaction::withTrashed()->get();
        return view('admin.purchase_transaction.index')->with('purchase_transactions', $purchase_transactions);
    }
}
