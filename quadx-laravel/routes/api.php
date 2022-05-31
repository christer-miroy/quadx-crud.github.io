<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

/*
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
*/

//view customer list
Route::get('customers',[App\Http\Controllers\CustomerController::class,'customers']);

//add customer
Route::post('save_customer',[App\Http\Controllers\CustomerController::class,'saveCustomer']);

//delete customer
Route::delete('delete_customer/{id}',[App\Http\Controllers\CustomerController::class,'deleteCustomer']);

//populate the fields of the customer
Route::get('get_customer/{id}',[App\Http\Controllers\CustomerController::class,'getCustomer']);

//update selected customer
Route::post('update_customer/{id}',[App\Http\Controllers\CustomerController::class,'updateCustomer']);