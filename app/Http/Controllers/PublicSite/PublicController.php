<?php

namespace App\Http\Controllers\PublicSite;

use App\Models\Store;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PublicController extends Controller
{
    public function index()
    {
        $stores = Store::with('products')->take(4)->get();
        return view('public_site.index')->with('stores', $stores);
    }
}
