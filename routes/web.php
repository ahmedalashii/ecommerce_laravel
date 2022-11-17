<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StoreController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\EditAdminInfoController;
use App\Http\Controllers\ProductController;

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


// 404 Error page
Route::get('404', function () {
    return view("errors.404");
});
Route::fallback(function () {
    return redirect('404');
});

// Admin Dashboard Routing
Route::get('/', [HomeController::class, 'index'])->middleware('auth')->prefix('admin')->name('admin');

Route::group(['prefix' => 'admin/', 'as' => 'admin.'], function () {
    Route::get('/settings', [EditAdminInfoController::class, 'index'])->middleware('auth')->name('settings');
    Route::post('/edit/info/{id}', [EditAdminInfoController::class, 'update'])->middleware('auth')->name('edit.info');
    // Store
    Route::get('/store/index', [StoreController::class, 'index'])->middleware('auth')->name('store.index');
    Route::get('/store/add', [StoreController::class, 'create'])->middleware('auth')->name('store.add');
    Route::post('/store/store', [StoreController::class, 'store'])->middleware('auth')->name('store.store');
    Route::get('/store/edit/{store}', [StoreController::class, 'edit'])->middleware('auth')->name('store.edit');
    Route::post('/store/update/{id}', [StoreController::class, 'update'])->middleware('auth')->name('store.update');
    Route::post('/store/destroy/{id}', [StoreController::class, 'destroy'])->middleware('auth')->name('store.destroy');
    Route::post('/store/restore/{id}', [StoreController::class, 'restore'])->middleware('auth')->name('store.restore');

    // Product
    Route::get('/product/index', [ProductController::class, 'index'])->middleware('auth')->name('product.index');
    Route::get('/product/add', [ProductController::class, 'create'])->middleware('auth')->name('product.add');
    Route::post('/product/store', [ProductController::class, 'store'])->middleware('auth')->name('product.store');
    
});
// })->prefix('admin')->name('admin'); // instead of the array passed above

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
