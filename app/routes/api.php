<?php

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

Route::middleware('auth:sanctum')
    ->namespace('\\App\\Domains\\Customer\\Http\\Controllers')
    ->group(function () {
        Route::name('api.Customer.index')->get('customer/index', 'CustomerController@index');
        Route::name('api.Customer.create')->post('customer/create', 'CustomerController@store');
        Route::name('api.Customer.edit')->put('customer/edit/{customer}', 'CustomerController@update');
        Route::name('api.Customer.show')->get('customer/show/{customer}', 'CustomerController@show');
        Route::name('api.Customer.delete')->delete('customer/delete/{customer}', 'CustomerController@destroy');
    });
