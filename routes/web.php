<?php

use App\Http\Controllers\Admin\KategoriController;
use App\Http\Controllers\Admin\ProdukController;
use App\Http\Controllers\Customer\CustomerController;
use App\Http\Controllers\Customer\CartController;
use App\Http\Controllers\Customer\CheckoutController;
use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [CustomerController::class,'index']);
Route::get('kproduk', [CustomerController::class,'kategori']);
Route::get('produk/{id}', [CustomerController::class,'detailprodukSatuan']);
Route::get('show-category/{slug}', [CustomerController::class,'showcategory']);
Route::get('show-category/{cate_slug}/{id}', [CustomerController::class,'detailproduk']);

Auth::routes();

Route::post('add-to-cart', [CartController::class, 'addProduct']);
Route::post('delete-cart-item', [CartController::class, 'deleteProduct']);

Route::middleware(['auth',])->group(function () {
    Route::get('showcart', [CartController::class, 'viewcart']);
    Route::get('checkout', [CheckoutController::class, 'index']);
    Route::post('order', [CheckoutController::class, 'order']);
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Route::group(['middleware' => ['auth','isAdmin']], function () {

//     Route::get('/dashboard', function () {
//        return view('admin.dashboard');
//     });

//  });

 Route::middleware(['auth', 'isAdmin'])->group(function () {
    Route::get('/dashboard', 'Admin\FrontendController@index');

    Route::get('kategori', 'Admin\KategoriController@index');
    Route::get('add-kategori', 'Admin\KategoriController@add');
    Route::post('insert-kategori', 'Admin\KategoriController@insert');
    Route::get('edit-kategori/{id}', [KategoriController::class,'edit']);
    Route::put('update-kategori/{id}', [KategoriController::class,'update']);
    Route::get('delete-kategori/{id}', [KategoriController::class,'destroy']);

    Route::get('produk', [ProdukController::class,'index']);
    Route::get('add-produk', [ProdukController::class,'add']);
    Route::post('insert-produk', [ProdukController::class,'insert']);
    Route::get('edit-produk/{id}', [ProdukController::class,'edit']);
    Route::put('update-produk/{id}', [ProdukController::class,'update']);
    Route::get('delete-produk/{id}', [ProdukController::class,'destroy']);
 });
