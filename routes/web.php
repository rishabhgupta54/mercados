<?php

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

Auth::routes([
    'register' => FALSE,
    'forget-password' => FALSE,
]);

Route::middleware('auth')->group(function() {
    Route::resource('/', \App\Http\Controllers\IndexController::class);
    Route::resource('/users', \App\Http\Controllers\UserController::class);
});
