<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::post('create-user', [UserController::class, 'createUser']);
Route::get('get-users', [UserController::class, 'getUsers']);
Route::get('get-single-user/{id}', [UserController::class, 'getSingleUser']);
Route::post('update-user/{id}', [UserController::class, 'updateUser']);
Route::delete('delete-user/{id}', [UserController::class, 'deleteUser']);

Route::post('create-Categories', [CategoriesController::class, 'createCategories']);
Route::get('get-categories', [CategoriesController::class, 'getCategories']);
Route::get('get-single-categories/{id}', [CategoriesController::class, 'getSinglecategories']);
Route::post('update-categories/{id}', [CategoriesController::class, 'updatecategories']);
Route::delete('delete-categories/{id}', [CategoriesController::class, 'deletecategories']);


Route::post('create-products', [ProductController::class, 'CreateProduct']);
Route::get('get-products', [ProductController::class, 'getProduct']);
Route::get('get-single-products/{id}', [ProductController::class, 'getSingleProducts']);
Route::post('update-products/{id}', [ProductController::class, 'updateProducts']);
Route::delete('delete-products/{id}', [ProductController::class, 'deleteproduct']);


Route::post('add-to-cart', [CartController::class, 'addToCart']);
Route::get('cart-products', [CartController::class, 'allcartProduct']);
Route::delete('delete-cart-products/{id}', [CartController::class, 'deletecartProduct']);

