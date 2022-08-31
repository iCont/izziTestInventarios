<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\UsersAdminController;
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

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('auth');

Route::get('/usersAdmin',[UsersAdminController::class,'index'])->name('users.index')->middleware('auth')->middleware('admin');
Route::post('usersAdmin',[UsersAdminController::class,'store'])->name('users.store')->middleware('auth')->middleware('admin');
Route::post('/usersAmin/{user}',[UsersAdminController::class,'update'])->name('users.update')->middleware('auth')->middleware('admin');
Route::post('/usersAmin/{user}/edit',[UsersAdminController::class,'estado'])->name('users.estado')->middleware('auth')->middleware('admin');
Route::delete('usersAdmin/{user}',[UsersAdminController::class,'destroy'])->name('users.destroy')->middleware('auth')->middleware('admin');

Route::get('/products',[ProductController::class,'index'])->name('products.index')->middleware('auth')->middleware('admin');
Route::get('/productsCreate',[ProductController::class,'create'])->name('products.create')->middleware('auth');
Route::get('/productsShow/{product}',[ProductController::class,'show'])->name('products.show')->middleware('auth')->middleware('admin');
Route::put('/productsEdit/{product}',[ProductController::class,'update'])->name('products.update')->middleware('auth')->middleware('admin');
Route::post('/productsRegister',[ProductController::class, 'store'])->name('products.store')->middleware('auth');
Route::delete('/products/{product}',[ProductController::class, 'destroy'])->name('products.destroy')->middleware('auth')->middleware('admin');
