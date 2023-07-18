<?php

use Illuminate\Support\Facades\Route;
use  App\Http\Controllers\Controller;

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

Route::name('index')->get('/', [Controller::class,'index']);

Route::middleware('App\Http\Middleware\Authenticate')->name('home')->get('/home', 'Controller@home');

Route::name('login')->get('/login', function () {
    echo 'login';
});

Route::name('login')->post('/login', 'Auth\\AuthenticatedSessionController@store');
Route::name('logout')->post('/logout', 'Auth\\AuthenticatedSessionController@destroy');
