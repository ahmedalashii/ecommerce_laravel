<?php

namespace App\Http\Controllers;

use App\Models\Store;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Requests\ProductRequest;
use Illuminate\Support\Facades\Storage;

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

    public function store(ProductRequest $request)
    {
        $name = $request->input('name');
        $description = $request->input('description');
        $base_price = $request->input('base_price');
        $discount_price = $request->input('discount_price');

        $store_id = $request->input('store');
        $store = Store::find($store_id);

        $is_discount = $request->has('is_discount');
        $product_picture = $request->file('product_picture');

        $path = 'uploads/images/products/' . $store->name;

        $picture_link =  $product_picture->store($path, ['disk' => 'public']);

        $product = new Product();
        $product->name = $name;
        $product->description = $description;
        $product->base_price = $base_price;
        $product->discount_price = $discount_price;
        $product->store_id = $store_id;
        $product->is_discount = $is_discount;
        // Storing the logo's path in database:
        $product->picture = $picture_link;
        $product->save();
        return redirect('admin/product/index')->with(['success' => 'Product Added Successfully', 'type' => 'success']);
    }

    public function edit(Product $product)
    {
        $stores = Store::select('id', 'name')->get();
        return view('admin.product.edit')->with('product', $product)->with('stores', $stores);
    }

    public function update(ProductRequest $request, Product $product)
    {
        // Deleting Old Image Then Replacing it with the new one:
        Storage::disk('public')->delete($product->picture);
        $product_picture = $request->file('product_picture');

        $store_id = $request->input('store');
        $store = Store::find($store_id);

        $path = 'uploads/images/products/' . $store->name . "/";
        $picture_link =  $product_picture->store($path, ['disk' => 'public']);



        $name = $request->input('name');
        $description = $request->input('description');
        $base_price = $request->input('base_price');
        $discount_price = $request->input('discount_price');

        $store_id = $request->input('store');
        $store = Store::find($store_id);

        $is_discount = $request->has('is_discount');

        $path = 'uploads/images/products/' . $store->name . "/";


        $product->name = $name;
        $product->description = $description;
        $product->base_price = $base_price;
        $product->discount_price = $discount_price;
        $product->store_id = $store_id;
        $product->is_discount = $is_discount;
        // Storing the logo's path in database:
        $product->picture = $picture_link;
        $product->update();
        return redirect('admin/product/index')->with(['success' => 'Product Updated Successfully', 'type' => 'success']);
    }

    public function destroy(Product $product)
    {
        /*
            Soft Delete:
            deleted_at >> timestamp >> null
            when deleting the row >> deleted_at = current timestamp 
        */
        $destroy = $product->delete();
        if ($destroy) {
            // showing success message
        }
        return redirect()->back()->with(['success' => 'Product Deactivated Successfully', 'type' => 'success']);
    }

    public function restore($id)

    {
        Product::onlyTrashed()->find($id)->restore();
        return redirect()->back()->with(['success' => 'Product Activated Successfully', 'type' => 'success']);
    }
}
