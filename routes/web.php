<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Redirect;

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

Auth::routes();

Route::get('/', function () {
    return Redirect::route('bears.index');
});

Route::get('bears/{longitude}/{laditude}', [\App\Http\Controllers\BearController::class, 'index']);

Route::prefix('admin')->group(function () {
    Route::resource('bears', \App\Http\Controllers\Admin\BearController::class);
});
