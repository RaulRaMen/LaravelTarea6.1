<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

//Home
Route::get('/', "App\Http\Controllers\HomeController@index")->name("home.index");
Route::get("/about", "App\Http\Controllers\HomeController@about")->name("home.about");
Route::get("/products", "App\Http\Controllers\ProductsController@index")->name("home.products");
Route::get("/products/{id}", "App\Http\Controllers\ProductsController@show")->name("products.show");

//Admin
Route::get("/admin","App\Http\Controllers\AdminHomeController@index")->name("admin.index");
Route::get('/admin/products', 'App\Http\Controllers\AdminProductController@index')->name("admin.products");
//Guardar
Route::post('/admin/products/store', 'App\Http\Controllers\AdminProductController@store')->name("admin.products.store");
//Borrar
Route::delete('/admin/products/delete{id}', 'App\Http\Controllers\AdminProductController@destroy')->name("admin.products.delete");
//Editar
Route::get("/admin/products/edit{id}","App\Http\Controllers\AdminProductController@edit")->name("admin.products.edit");
Route::put("/admin/products/update","App\Http\Controllers\AdminProductController@update")->name("admin.products.update");