<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Models\Book;

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
    return view('WelcomePage');
});
Auth::routes( ['verify'=> true]);
Route::get('/addBook', [App\Http\Controllers\BookController::class, 'index'])->name('page');
Route::post('/addBook',[App\Http\Controllers\BookController::class, 'addBook'])->name('addBook');
Route::get('/showBooks', [App\Http\Controllers\BookController::class, 'showBook'])->name('showme');
Route::post('/home',[App\Http\Controllers\HomeController::class, 'updateImage'])->name('image.upload');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/catagory', function () {
    $catagory = request('cat');
    $books = Book::where('catagory', $catagory)->get();
    return view('allBooks',[
        'books' => $books
    ]);
})->middleware(['auth' => 'verified']);


//Route::get('/addBook', [App\Http\Controllers\BookController::class, 'index'])->name('home');
