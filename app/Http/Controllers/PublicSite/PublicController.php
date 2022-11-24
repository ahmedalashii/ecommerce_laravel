<?php

namespace App\Http\Controllers\PublicSite;

use App\Models\Store;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PublicController extends Controller
{
    public function index()
    {
        $stores = Store::all()->take(4);
        return view('public_site.index')->with('stores', $stores);
    }
}
