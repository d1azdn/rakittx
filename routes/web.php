<?php

use App\Models\Product;
use App\Models\Category;
use App\Models\Cart;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\BrandController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SparepartController;
use App\Http\Controllers\CartController;

use App\Http\Controllers\SupportController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\RegisterController;

Route::get('/', function () {
    return view('index',[
        'products' => Product::with(['category'])->orderBy('discount', 'desc')->take(5)->get(),
    ]);
});

Route::get('/rakitpc', function(){
    return view('rakitpc');
});

Route::get('/cart', [CartController::class, 'index'])->middleware('isLogin');
Route::post('/cart/{slug}', [CartController::class, 'store'])->middleware('isLogin');
Route::delete('/cart/{id}', [CartController::class, 'destroy'])->middleware('isLogin');
Route::put('/cart/{id}', [CartController::class, 'update'])->middleware('isLogin');

Route::get('/sparepart', [SparepartController::class, 'index']);
Route::get('/sparepart/{slug}', [SparepartController::class, 'show'])->middleware('isLogin');

Route::get('/support', [SupportController::class, 'index']);
Route::get('/support/{slug}', [SupportController::class, 'show']);

Route::get('/login', [LoginController::class, 'index'])->middleware('guest');
Route::post('/login', [LoginController::class, 'authentication']);

Route::get('/logout', function(){
    Auth::logout();
    return redirect('/');
});

Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');
Route::post('/register', [RegisterController::class, 'store']);


// Admin Section

Route::get('/dashboard', [CartController::class, 'adminIndex'])->middleware('isAdmin');
// Route::post('/dashboard/add/{slug}', [CartController::class, 'adminStore'])->middleware('isAdmin');
Route::delete('/dashboard/{id}', [CartController::class, 'adminDestroy'])->middleware('isAdmin');
Route::put('/dashboard/update/{id}', [CartController::class, 'adminUpdate'])->middleware('isAdmin');
Route::put('/dashboard/done/{id}', [CartController::class, 'adminDone'])->middleware('isAdmin');


Route::get('/dashboard/sparepart', [ProductController::class, 'index'])->middleware('isAdmin');
Route::post('/dashboard/sparepart', [ProductController::class, 'store'])->middleware('isAdmin');
Route::delete('/dashboard/sparepart/{id}', [ProductController::class, 'destroy'])->middleware('isAdmin');
Route::put('/dashboard/sparepart/{id}', [ProductController::class, 'update'])->middleware('isAdmin');


Route::get('/dashboard/brand', [BrandController::class, 'index'])->middleware('isAdmin');
Route::post('/dashboard/brand', [BrandController::class, 'store'])->middleware('isAdmin');
Route::delete('/dashboard/brand/{id}', [BrandController::class, 'destroy'])->middleware('isAdmin');
Route::put('/dashboard/brand/{id}', [BrandController::class, 'update'])->middleware('isAdmin');


Route::get('/dashboard/category', [CategoryController::class, 'index'])->middleware('isAdmin');
Route::post('/dashboard/category', [CategoryController::class, 'store'])->middleware('isAdmin');
Route::delete('/dashboard/category/{id}', [CategoryController::class, 'destroy'])->middleware('isAdmin');
Route::put('/dashboard/category/{id}', [CategoryController::class, 'update'])->middleware('isAdmin');


Route::get('/dashboard/support', [SupportController::class, 'adminIndex'])->middleware('isAdmin');
Route::post('/dashboard/support', [SupportController::class, 'adminStore'])->middleware('isAdmin');
Route::delete('/dashboard/support/{id}', [SupportController::class, 'adminDestroy'])->middleware('isAdmin');
Route::put('/dashboard/support/{id}', [SupportController::class, 'adminUpdate'])->middleware('isAdmin');
