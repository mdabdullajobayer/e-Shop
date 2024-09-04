<?php

use App\Http\Controllers\BrandController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PolicyController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\UserController;
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

Route::get('/', function () {
    return view('welcome');
});

// Brand API Route
Route::get('brand-list', [BrandController::class, 'getall']);
// Category API Route
Route::get('categroy-list', [CategoryController::class, 'getall']);
// Pruduct API Route
Route::get('list-product-catrgory/{id}', [ProductController::class, 'ListProductbyCategory']);
Route::get('list-product-brand/{id}', [ProductController::class, 'ListProductbyBrand']);
Route::get('list-product-remark/{id}', [ProductController::class, 'ListProductbyRemark']);

Route::get('list-product-slider', [ProductController::class, 'ListProductbySlider']);

Route::get('product-details/{id}', [ProductController::class, 'ProductDetailsbyId']);
Route::get('list-review/{product_id}', [ProductController::class, 'ListReviewProduct']);
// Policy API Route
Route::get('policy-type/{type}', [PolicyController::class, 'policy']);

// User API Routes 
Route::get('UserLogin/{UserEmail}', [UserController::class, 'UserLogin']);
Route::get('VerifyLogin/{UserMail}/{OTP}', [UserController::class, 'VerifyLogin']);
Route::get('UserLogout', [UserController::class, 'UserLogout']);
