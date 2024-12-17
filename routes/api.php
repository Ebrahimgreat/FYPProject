<?php

use App\Http\Controllers\authController;
use App\Http\Controllers\brandController;
use App\Http\Controllers\Customer;
use App\Http\Controllers\orderController;
use App\Http\Controllers\productController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\unitsController;
use App\Models\Supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/register', [AuthController::class, 'register']);
Route::post('/logout', [AuthController::class, 'logout']);
Route::get('/',function(){
    return "Hello World";
});
Route::get('/customers',[Customer::class,'index']);

Route::get('/suppliers',[SupplierController::class,'index']);
Route::get('/brands',[BrandController::class,'index']);
Route::get('/units',[unitsController::class,'index']);
Route::get('/products',[ProductController::class,'index']);
Route::get('/pos',[orderController::class,'index']);
Route::get('/createCustomer',[Customer::class,'store']);
