<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AjaxController;

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
Route::get('/welcome', function () {
    return 'Hello World';
});

Route::get('/weather', function () {
    return view('weather');
});
Route::get('ajax-request', [App\Http\Controllers\AjaxController::class, 'create']  );
Route::post('ajax-request', [App\Http\Controllers\AjaxController::class, 'store']);