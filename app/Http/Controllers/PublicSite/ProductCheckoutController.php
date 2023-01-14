<?php

namespace App\Http\Controllers\PublicSite;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\PublicSite\ProductCheckoutRequest;
use App\Models\PurchaseTransaction;

class ProductCheckoutController extends Controller
{

    public function index(Product $product)
    {
        $total = 0;
        // if array of products in the cart >> doing other stuff
        $total += $product->price;
        return view('public_site.product_order')->with('product', $product)->with('total', $total);
    }


    public function checkout(ProductCheckoutRequest $request, Product $product)
    {
        $name = $request->input('name');
        $address = $request->input('address');
        $phone = $request->input('phone');
        $email = $request->input('email');

        $purchase_transaction = new PurchaseTransaction();
        $purchase_transaction->name = $name;
        $purchase_transaction->address = $address;
        $purchase_transaction->phone = $phone;
        $purchase_transaction->email = $email;
        $purchase_transaction->product_id = $product->id;
        $purchase_transaction->purchase_price = $product->price;
        $status = $purchase_transaction->save();
        return redirect('public/products/' . $product->store_id)->with([$status ? 'success' : 'fail' => $status ? 'Product Purchased Successfully' : 'Something is wrong!', 'type' => $status ? 'success' : 'error']);
    }
}
