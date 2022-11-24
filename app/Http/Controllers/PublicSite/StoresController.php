<?php

namespace App\Http\Controllers\PublicSite;

use App\Models\Store;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class StoresController extends Controller
{
    public function index()
    {
        $paginate = 6;
        $stores = Store::paginate($paginate);
        return view('public_site.stores')->with('stores', $stores);
    }
}
