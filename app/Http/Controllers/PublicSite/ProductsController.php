<?php

namespace App\Http\Controllers\PublicSite;

use App\Models\Store;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\PublicSite\SortProductRequest;

class ProductsController extends Controller
{
    public function index(SortProductRequest $request, Store $store, $start_price = null, $end_price = null)
    {
        $per_page = 6;
        $products = collect();
        if ($start_price != null && $end_price != null) {
            $products = Product::where('store_id', $store->id)->whereBetween('base_price', [$start_price, $end_price])->paginate($per_page);
            if ($products->isEmpty()) {
                $products = Product::where('store_id', $store->id)->whereBetween('discount_price', [$start_price, $end_price])->paginate($per_page);
            }
        } elseif ($start_price != null) {
            $products = Product::where('store_id', $store->id)->where('base_price', '>=', $start_price)->paginate($per_page);
        } else {
            $products = Product::where('store_id', $store->id)->paginate($per_page);
        }
        
        if ($request->has('search')) {
            $search_value = $request->input('search');
            $products = Product::where('store_id', $store->id)->where('name', 'LIKE', "%{$search_value}%")->paginate($per_page);
        }

        if ($request->has('sort_way')) {
            $sort_way = $request->input('sort_way');
            $products = Product::where('store_id', $store->id)->orderBy('discount_price', $sort_way)->paginate($per_page);
        }
        return view('public_site.products')->with('products', $products)->with('store', $store)->with('per_page', $per_page)->with('sort_way', $sort_way ?? null);
    }

    public function search(SortProductRequest $request)
    {
        $search_value = $request->input('search_value');
        $per_page = 6;
        $products = Product::where('name', 'LIKE', "%{$search_value}%")->paginate($per_page);
        if ($request->has('sort_way')) {
            $sort_way = $request->input('sort_way');
            $products = Product::with('store')->where('name', 'LIKE', "%{$search_value}%")->orderBy('discount_price', $sort_way)->paginate($per_page);
        }
        return view('public_site.product_search_results')->with('products', $products)->with('search_value', $search_value)->with('sort_way', $sort_way ?? null);
    }

    
    // Another way:
    
    // public function index2(Request $request)
    // {
    //     $products = Product::query()
    //         ->when($request->has('store_id'), fn ($query) => $query->where('store_id', $request->query('store_id')))
    //         ->when($request->has('start_price'), fn ($query) => $query->where('base_price', '>=', $request->query('start_price')))
    //         ->when($request->has('end_price'), fn ($query) => $query->where('base_price', '<=', $request->query('end_price')))
    //         ->when($request->has('search_value'), fn ($query) => $query->where('name', 'LIKE', "%{$request->query('store_id')}%"))
    //         ->when($request->has('sort_way'), fn ($query) => $query->where('name', 'LIKE', "%{$request->query('store_id')}%"));
    // }
}
