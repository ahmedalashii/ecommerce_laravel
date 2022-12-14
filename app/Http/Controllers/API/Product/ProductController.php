<?php

namespace App\Http\Controllers\API\Product;

use App\Models\Store;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\ProductResource;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\Product\EditProductRequest;
use App\Http\Requests\Product\CreateProductRequest;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $per_page = $request->query('per_page');
        $products = Product::withTrashed()->with('store:id,name')->paginate($per_page);
        return ProductResource::collection($products);
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
        $result = $product->save();
        return ProductResource::make($product);
    }

    public function update(EditProductRequest $request, Product $product)
    {
        $picture_link = $product->picture;
        if ($request->hasFile('product_picture')) {
            // Deleting Old Image Then Replacing it with the new one:
            Storage::disk('public')->delete($product->picture);
            $product_picture = $request->file('product_picture');

            $store_id = $request->input('store');
            $store = Store::find($store_id);

            $path = 'uploads/images/products/' . $store->name . "/";
            $picture_link =  $product_picture->store($path, ['disk' => 'public']);
        }
        
        $name = $request->input('name');
        $description = $request->input('description');
        $base_price = $request->input('base_price');
        $discount_price = $request->input('discount_price');

        $store_id = $request->input('store');
        $store = Store::find($store_id);

        $is_discount = $request->has('is_discount'); // if checked >> on >> true , otherwise >> off >> null >> false

        $product->name = $name;
        $product->description = $description;
        $product->base_price = $base_price;
        $product->discount_price = $discount_price;
        $product->store_id = $store_id;
        $product->is_discount = $is_discount;
        // Storing the logo's path in database:
        $product->picture = $picture_link;
        $product->update();
        return ProductResource::make($product);
    }
}
