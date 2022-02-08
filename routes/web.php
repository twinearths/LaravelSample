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
    return view('import-form');
});

Route::get('/simple', 'App\Http\Controllers\MyController@simpleScreen');

Route::get('/one', function () {
    return view('screen1');
});

Route::get('/two', function () {
    return view('screen2');
});

Route::get('/send', function () {
    return view('sendScreen');
});
Route::post('/receive', 'App\Http\Controllers\MyController@send');

Route:: get('/insertdb', 'App\Http\Controllers\MyController@insertdb');
Route:: get('/updatedb', 'App\Http\Controllers\MyController@updatedb');
Route:: get('/deletealldb', 'App\Http\Controllers\MyController@deletealldb');
Route:: get('/deletedb', 'App\Http\Controllers\MyController@deletedb');
Route:: get('/selectdb', 'App\Http\Controllers\MyController@selectdb');

Route:: get('/sheet', 'App\Http\Controllers\SpreadSheetController@store');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::post('/import', [App\Http\Controllers\ExcelDataController::class, 'import'])->name('exceldata.import');
Route::get('/export', [App\Http\Controllers\ExcelDataController::class, 'exportIntoCSV'])->name('exceldata.export');
