<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StoreController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\EditAdminInfoController;

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
    Route::get('/store/add', [StoreController::class, 'create'])->middleware('auth')->name('store.add');
    Route::post('/edit/info/{id}', [EditAdminInfoController::class, 'update'])->middleware('auth')->name('edit.info');
});
// })->prefix('admin')->name('admin'); // instead of the array passed above

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
