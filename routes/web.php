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


Auth::routes();

Route::redirect('/', '/admin');

Route::get('/admin', [HomeController::class, 'index'])->name('admin');
// Admin Dashboard Routing
Route::group(['prefix' => 'admin/', 'as' => 'admin.', 'middleware' => 'auth'], function () {
    Route::get('/settings', [EditAdminInfoController::class, 'index'])->name('settings');
    Route::post('/edit/info/{id}', [EditAdminInfoController::class, 'update'])->name('edit.info');
    // Store:
    Route::get('/store/index', [StoreController::class, 'index'])->name('store.index');
    Route::get('/store/add', [StoreController::class, 'create'])->name('store.add');
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
});
