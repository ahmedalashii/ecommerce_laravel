<?php

namespace App\Http\Controllers\Admin;

use App\Models\Store;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Http\Traits\FileProcessingTrait;
use App\Http\Requests\Store\EditStoreRequest;
use App\Http\Requests\Store\CreateStoreRequest;

class StoreController extends Controller
{
    use FileProcessingTrait;

    public function index()
    {
        $paginate = 5;
        $stores = Store::withTrashed()->paginate($paginate);
        return view('admin.store.index')->with('stores', $stores);
    }

    public function create()
    {
        return view('admin.store.create');
    }

    public function store(CreateStoreRequest $request)
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
        $path = 'uploads/images/stores/';

        // First Way to save a file:
        // $logo_name = time() + rand(1, 1000000) . '.' . $logo->getClientOriginalExtension();
        // Storage::disk('public')->put($path . $logo_name, file_get_contents($logo));
        // $status = Storage::disk('local')->exists($path . $name); // to detect if the storing process has been successfully ended.

        // Second Way to save a file:
        $logo_link =  $logo->store($path, ['disk' => 'public']);

        $store = new Store();
        $store->name = $name;
        $store->address = $address;
        // Storing the logo's path in database:
        $store->logo = $logo_link;
        $status = $store->save();
        return redirect('admin/store/index')->with([$status ? 'success' : 'fail' => $status ? 'Store Added Successfully' : 'Something is wrong!', 'type' => $status ? 'success' : 'error']); // send the status and a success message must be shown
    }

    public function edit(Store $store)
    {
        return view('admin.store.edit')->with('store', $store);
    }

    public function update(EditStoreRequest $request, Store $store)
    {
        $logo_link = $this->update_file($request, $store->logo, 'logo', 'uploads/images/stores/');
        // More clean way:
        // $attributes = $request->validated();
        // $attributes["logo"] = $logo_link;
        // $store->update($attributes);

        $name = $request->input('name');
        $address = $request->input('address');

        $store->name = $name;
        $store->address = $address;
        $store->logo = $logo_link;
        // Updating Store:
        $status = $store->update();
        // with function with redirect creates a session
        return redirect('admin/store/index')->with([$status ? 'success' : 'fail' => $status ? 'Store Updated Successfully' : 'Something is wrong!', 'type' => $status ? 'success' : 'error']);
    }


    public function destroy(Store $store)
    {
        /*
            Soft Delete:
            deleted_at >> timestamp >> null
            when deleting the row >> deleted_at = current timestamp 
        */
        $destroy_status = false;
        // if the store doesn't have products >> then it's allowed to be deactivated >> that's kind of logic :)
        if ($store->productsWithTrashed->isEmpty()) {
            $destroy_status = $store->delete();
        }
        return redirect()->back()->with([$destroy_status ? 'success' : 'fail' => $destroy_status ? 'Store Deactivated Successfully' : $store->name . ' can\'t be deactivated, because it\'s linked to other products!', 'type' => $destroy_status ? 'success' : 'error']);
    }

    public function restore($id)
    {
        $status = Store::onlyTrashed()->find($id)->restore();
        return redirect()->back()->with([$status ? 'success' : 'fail' => $status ? 'Store Activated Successfully' : 'Something is wrong!', 'type' => $status ? 'success' : 'error']);
    }
}
