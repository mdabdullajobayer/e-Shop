<?php

use App\Http\Controllers\BrandController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\PolicyController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductReviewController;
use App\Http\Controllers\ProfileController;
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
    return view('pages.HomePage');
});

// Brand API Route
Route::get('brand-list', [BrandController::class, 'getall']);
// Category API Route
Route::get('categroy-list', [CategoryController::class, 'getall']);
// Pruduct API Route
Route::get('list-product-catrgory/{id}', [ProductController::class, 'ListProductbyCategory']);
Route::get('list-product-brand/{id}', [ProductController::class, 'ListProductbyBrand']);
Route::get('list-product-remark/{remark}', [ProductController::class, 'ListProductbyRemark']);

Route::get('list-product-slider', [ProductController::class, 'ListProductbySlider']);

Route::get('product-details/{id}', [ProductController::class, 'ProductDetailsbyId']);
Route::get('list-review/{product_id}', [ProductController::class, 'ListReviewProduct']);
// Policy API Route
Route::get('policy-type/{type}', [PolicyController::class, 'policy']);

// User API Routes 
Route::get('UserLogin/{UserEmail}', [UserController::class, 'UserLogin']);
Route::get('VerifyLogin/{UserMail}/{OTP}', [UserController::class, 'VerifyLogin']);
Route::get('UserLogout', [UserController::class, 'UserLogout']);

Route::middleware('verify_token')->group(function () {
    // User Profile API Routes
    Route::post('CreateUser', [ProfileController::class, 'CreateUser']);
    Route::get('ReadProfile', [ProfileController::class, 'ReadProfile']);
    // User Review API Routes
    Route::post('CreateReview', [ProductReviewController::class, 'CreateReview']);
    Route::post('ReadReview', [ProductReviewController::class, 'ReadReview']);

    // User Wishlist API Routes
    Route::post('ProductWishList', [ProductController::class, 'ProductWishList']);
    Route::post('CreateWishList/{product_id}', [ProductController::class, 'CreateWishList']);
    Route::post('RemoveWishList/{product_id}', [ProductController::class, 'RemoveWishList']);

    // User Cart API Routes
    Route::post('CreateCartList', [ProductController::class, 'CreateCartList']);
    Route::get('CartList', [ProductController::class, 'CartList']);
    Route::get('DeleteCartList/{product_id}', [ProductController::class, 'DeleteCartList']);

    // Invoice API Routes 
    Route::post('CreateInvoice', [InvoiceController::class, 'CreateInvoice']);
    Route::get("InvoiceList", [InvoiceController::class, 'InvoiceList']);
    Route::get("InvoiceProductList/{invoice_id}", [InvoiceController::class, 'InvoiceProductList']);
});

// payment API Routes
Route::post("/PaymentSuccess", [InvoiceController::class, 'PaymentSuccess']);
Route::post("/PaymentCancel", [InvoiceController::class, 'PaymentCancel']);
Route::post("/PaymentFail", [InvoiceController::class, 'PaymentFail']);
