<?php

namespace App\Http\Controllers\API\Product;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\ProductResource;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $per_page = $request->query('per_page');
        $products = Product::withTrashed()->with('store')->paginate($per_page);
        return ProductResource::collection($products);
    }

    public function show($id)
    {
        $product = Product::find($id);
        return ProductResource::make($product);
    }
}
