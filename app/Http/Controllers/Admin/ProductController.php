<?php

namespace App\Http\Controllers\Admin;

use App\Models\Store;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\Product\EditProductRequest;
use App\Http\Requests\Product\CreateProductRequest;
use App\Http\Traits\FileProcessingTrait;

class ProductController extends Controller
{
    use FileProcessingTrait;

    public function index()
    {
        $paginate = 5;
        $products = Product::withTrashed()->with('store:id,name')->paginate($paginate); // only the name and id to be got
        return view('admin.product.index')->with('products', $products);
    }

    public function create()
    {
        $stores = Store::select('id', 'name')->get();
        return view('admin.product.create')->with('stores', $stores);
    }

    public function store(CreateProductRequest $request)
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
        $status = $product->save();
        return redirect('admin/product/index')->with([$status ? 'success' : 'fail' => $status ?  'Product Added Successfully' : 'Something is wrong!', 'type' => $status ? 'success' : 'error']);
    }

    public function edit(Product $product)
    {
        $stores = Store::select('id', 'name')->get();
        return view('admin.product.edit')->with('product', $product)->with('stores', $stores);
    }

    public function update(EditProductRequest $request, Product $product)
    {
        $name = $request->input('name');
        $description = $request->input('description');
        $base_price = $request->input('base_price');
        $discount_price = $request->input('discount_price');

        $store_id = $request->input('store');
        $store = Store::find($store_id);

        $picture_link = $this->update_file($request, $product->picture, 'product_picture', 'uploads/images/products/' . $store->name . "/");

        $is_discount = $request->has('is_discount'); // if checked >> on >> true , otherwise >> off >> null >> false

        $product->name = $name;
        $product->description = $description;
        $product->base_price = $base_price;
        $product->discount_price = $discount_price;
        $product->store_id = $store_id;
        $product->is_discount = $is_discount;
        // Storing the logo's path in database:
        $product->picture = $picture_link;
        $status = $product->update();
        return redirect('admin/product/index')->with([$status ? 'success' : 'fail' => $status ? 'Product Updated Successfully' : 'Something is wrong!', 'type' => $status ? 'success' : 'error']);
    }

    public function destroy(Product $product)
    {
        /*
            Soft Delete:
            deleted_at >> timestamp >> null
            when deleting the row >> deleted_at = current timestamp 
        */
        $destroy = $product->delete();
        return redirect()->back()->with([$destroy ? 'success' : 'fail' => $destroy ?  'Product Deactivated Successfully' : 'Something is wrong!', 'type' => $destroy ? 'success' : 'error']);
    }

    public function restore($id)

    {
        $status = Product::onlyTrashed()->find($id)->restore();
        return redirect()->back()->with([$status ? 'success' : 'fail' => $status ? 'Product Activated Successfully' : 'Something is wrong!', 'type' => $status ? 'success' : 'error']);
    }
}
