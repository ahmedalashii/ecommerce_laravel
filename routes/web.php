<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\StoreController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\PublicSite\PublicController;
use App\Http\Controllers\PublicSite\StoresController;
use App\Http\Controllers\Admin\EditAdminInfoController;
use App\Http\Controllers\PublicSite\ProductCheckoutController;
use App\Http\Controllers\PublicSite\ProductsController;
use App\Http\Controllers\Admin\PurchaseTransactionController;
use App\Models\PurchaseTransaction;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Authentication routing:
Auth::routes();

// Admin Dashboard Routing
Route::get('/admin', [HomeController::class, 'index'])->name('admin');
Route::group(['prefix' => 'admin/', 'as' => 'admin.', 'middleware' => 'auth'], function () {
    Route::get('/site/settings', [HomeController::class, 'edit'])->name('site.settings');
    Route::post('/site/settings', [HomeController::class, 'update']);

    Route::get('/edit/info', [EditAdminInfoController::class, 'index'])->name('info.edit');
    Route::post('/update/info/{id}', [EditAdminInfoController::class, 'update'])->name('update.info');
    
    // Store:
    Route::get('/store/index', [StoreController::class, 'index'])->name('store.index');
    Route::get('/store/create', [StoreController::class, 'create'])->name('store.create');
    Route::post('/store/store', [StoreController::class, 'store'])->name('store.store');
    Route::get('/store/edit/{store}', [StoreController::class, 'edit'])->name('store.edit');
    Route::post('/store/update/{store}', [StoreController::class, 'update'])->name('store.update');
    Route::post('/store/destroy/{store}', [StoreController::class, 'destroy'])->name('store.destroy');
    Route::post('/store/restore/{id}', [StoreController::class, 'restore'])->name('store.restore');
    
    // Product:
    Route::get('/product/index', [ProductController::class, 'index'])->name('product.index');
    Route::get('/product/add', [ProductController::class, 'create'])->name('product.add');
    Route::post('/product/store', [ProductController::class, 'store'])->name('product.store');
    Route::get('/product/edit/{product}', [ProductController::class, 'edit'])->name('product.edit');
    Route::post('/product/update/{product}', [ProductController::class, 'update'])->name('product.update');
    Route::post('/product/destroy/{product}', [ProductController::class, 'destroy'])->name('product.destroy');
    Route::post('/product/restore/{id}', [ProductController::class, 'restore'])->name('product.restore');

    // Purchase Transactions:
    Route::get('/purchase_transaction/index', [PurchaseTransactionController::class, 'index'])->name('purchase_transaction.index');
    Route::get('/purchase_transaction/report', [PurchaseTransactionController::class, 'report'])->name('purchase_transaction.report');

    // Note: We can shorten some or most of these lines above by using resource :) 
});

// Public Site Routing
Route::redirect('/', '/public');
Route::get('/public', [PublicController::class, 'index'])->name('public');

Route::group(['prefix' => 'public/', 'as' => 'public.'], function () {
    Route::get('/stores', [StoresController::class, 'index'])->name('stores');
    // General Search for products
    Route::get('/products/search', [ProductsController::class, 'search'])->name('products.search');
    // Search for a specific store products
    Route::get('/products/{store}/{start_price?}/{end_price?}/{search_value?}', [ProductsController::class, 'index'])->name('products');
    // Sorting based on the discount price
    Route::get('/products/{store}/sort', [ProductsController::class, 'index'])->name('products.sort');
    Route::get('/product/{product}/order', [ProductCheckoutController::class, 'index'])->name('product.order');
    Route::post('/product/{product}/checkout', [ProductCheckoutController::class, 'checkout'])->name('product.checkout');
});
