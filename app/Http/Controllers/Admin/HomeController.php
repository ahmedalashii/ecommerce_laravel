<?php

namespace App\Http\Controllers\Admin;


use App\SiteSetting;
use App\Models\Store;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\PurchaseTransaction;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\SiteSettingRequest;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // Statistics:
        $stores_count = Store::count(); // non-trashed
        $products_count = Product::count();
        $purchase_transactions_count = PurchaseTransaction::count();

        $last_transactions = PurchaseTransaction::withTrashed()->with(['product', 'product.store'])->take(6)->get();

        // we can use compact
        return view('admin.index')->with('stores_count', $stores_count)->with('products_count', $products_count)->with('purchase_transactions_count', $purchase_transactions_count)->with('last_transactions', $last_transactions);
    }

    public function edit()
    {
        $settings = SiteSetting::first();
        $currencies = ["$" => "USD", "€" => "EURO", "₪" => "SHEKEL"];
        return view('admin.settings.edit')->with('settings', $settings)->with('currencies', $currencies);
    }

    public function update(SiteSettingRequest $request)
    {
        $settings = SiteSetting::first();

        $dashboard_logo = $settings->dashboard_logo;
        if ($request->hasFile('dashboard_logo')) {
            // Deleting Old Logo Then Replacing it with the new one:
            Storage::disk('public')->delete($dashboard_logo);
            $logo_file = $request->file('dashboard_logo');

            $path = 'uploads/images/logos';
            $dashboard_logo =  $logo_file->store($path, ['disk' => 'public']);
        }

        $site_logo = $settings->public_site_logo;
        if ($request->hasFile('site_logo')) {
            // Deleting Old Logo Then Replacing it with the new one:
            Storage::disk('public')->delete($site_logo);
            $logo_file = $request->file('site_logo');

            $path = 'uploads/images/logos';
            $site_logo =  $logo_file->store($path, ['disk' => 'public']);
        }

        $site_light_logo = $settings->public_site_light_logo;
        if ($request->hasFile('site_light_logo')) {
            // Deleting Old Logo Then Replacing it with the new one:
            Storage::disk('public')->delete($site_light_logo);
            $logo_file = $request->file('site_light_logo');

            $path = 'uploads/images/logos';
            $site_light_logo =  $logo_file->store($path, ['disk' => 'public']);
        }

        $country = $request->input('country');
        $address = $request->input('address');
        $currency = $request->input('currency');
        $description = $request->input('description');


        $settings->country = $country;
        $settings->address = $address;
        $settings->description = $description;
        $settings->currency = $currency;
        // Storing the logo's path in database:
        $settings->dashboard_logo = $dashboard_logo;
        $settings->public_site_logo = $site_logo;
        $settings->public_site_light_logo = $site_light_logo;
        $settings->update();
        return redirect()->back()->with(['success' => 'Site Settings Updated Successfully', 'type' => 'success']);
    }
}
