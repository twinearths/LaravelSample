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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/simple', 'App\Http\Controllers\MyController@simpleScreen');

Route::get('/one', function () {
    return view('screen1');
});

Route::get('/two', function () {
    return view('screen2');
});
