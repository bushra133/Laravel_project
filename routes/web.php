<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\App;
// يجب تضمين الكنترولر
use App\http\Controllers\Dashboard;
use App\http\Controllers\Shopping;


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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [Dashboard::class,'Index'])->name('index');
Route::get('/dashboard/products', [Dashboard::class,'GetProducts'])->name('products');
Route::post('/dashboard/createproduct', [Dashboard::class,'CreateProduct'])->name('create-product');
Route::get('/delete/{id}', [Dashboard::class,'DeleteProduct'])->name('delete-product');
Route::get('/edit/{id}', [Dashboard::class,'EditProduct'])->name('edit-product');
Route::post('/dashboard/update',[Dashboard::class,'UpdateProduct'])->name('update-product');
Route::post('/dashboard/search',[Dashboard::class,'Search'])->name('search-product');

Route::get('/test',[Dashboard::class,'test'])->name('test-product');

Route::get('/logout',[Dashboard::class,'logout'])->name('logout');

Route::get('/dashboard/productsDetails', [Dashboard::class,'GetProductsDetails'])->name('products-details');
Route::post('/dashboard/createproductsDetails', [Dashboard::class,'CreateProductDetails'])->name('create-product-details');
Route::get('/delete/{id}', [Dashboard::class,'DeleteProductDetails'])->name('delete-product-details');
Route::get('/edit/{id}', [Dashboard::class,'EditProductDetails'])->name('edit-product-details');
Route::post('/dashboard/update',[Dashboard::class,'UpdateProduct'])->name('update-product-details');


Route::get('/shopping/showitems', [Shopping::class,'ShowListItems'])->name('items-list');
Route::get('/shopping/details/{id}', [Shopping::class,'ShowItemDetails'])->name('item-details');

Route::get('/shopping/addToCart/{id}', [Shopping::class,'AddToCart'])->name('add-to-cart');
Route::get('/shopping/cart', [Shopping::class,'Cart'])->name('cart');
Route::get('/deletefromcart/{id}', [Shopping::class,'DeleteFromCart'])->name('delete-from-cart');



// locals the language
Route::get('language/{locale}', function($locale){
    App::setlocale($locale);
    session()->put('locale',$locale);
    return redirect()->back();
});

// API
Route::get('/getcoffee',[Shopping::class,'GetHotCafe']);
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

