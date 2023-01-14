<?php

namespace App\Http\Controllers\API\Store;

use App\Models\Store;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\StoreResource;

class StoreController extends Controller
{
    public function index(Request $request)
    {
        $per_page = $request->query('per_page');
        $stores = Store::with('products')->paginate($per_page);
        return StoreResource::collection($stores);
    }

    public function show($id)
    {
        $store = Store::with('products')->find($id);
        return StoreResource::make($store);
    }
}
