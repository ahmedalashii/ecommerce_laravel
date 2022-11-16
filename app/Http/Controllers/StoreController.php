<?php

namespace App\Http\Controllers;

use App\Models\Store;
use Illuminate\Http\Request;
use App\Http\Requests\StoreRequest;
use Illuminate\Support\Facades\Storage;

class StoreController extends Controller
{
    public function index()
    {
        $paginate = 6;
        $stores = Store::withTrashed()->paginate();
        return view('admin.store.index')->with('stores', $stores);
    }

    public function create()
    {
        return view('admin.store.create');
    }

    public function store(StoreRequest $request)
    {
        /*
        1. Getting The File From The Request
        2. Determine The path which the file will be uploaded in.
        3. Determine the name of the file.'
        4. Upload/Move/Put the file.
        5. Verify.
        */

        $name = $request->input('name');
        $address = $request->input('address');
        $logo = $request->file('logo');
        $path = 'public/images/'; // in the storage/app implicitly ..
        $logo_name = time() + rand(1, 1000000) . '.' . $logo->getClientOriginalExtension();

        Storage::disk('local')->put($path . $logo_name, file_get_contents($logo));
        $status = Storage::disk('local')->exists($path . $name); // to detect if the storing process has been successfully ended.

        $store = new Store();
        $store->name = $name;
        // Storing the logo's path in database:
        $store->logo = $path . $logo_name;
        $store->save();
        return redirect()->back(); // send the status and a success message must be shown
    }

    public function edit($id)
    {
        $store = Store::find($id);
        return view('admin.store.edit')->with('store', $store);
    }

    public function update(StoreRequest $request)
    {
    }


    public function destroy($id)
    {
        /*
            Soft Delete:
            deleted_at >> timestamp >> null
            when deleting the row >> deleted_at = current timestamp 
        */
        $store = Store::find($id);
        $destroy = $store->delete();
        if ($destroy) {
            // showing success message
        }
        return redirect()->back();
    }

    public function restore($id)
    {
        Store::onlyTrashed()->find($id)->restore();
        return redirect()->back();
    }
}
