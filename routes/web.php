<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Models\Book;
use App\Models\Requests;

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
Route::get('/addBook', [App\Http\Controllers\BookController::class, 'index'])->name('page')->middleware('can:add_books,user');
Route::post('/addBook',[App\Http\Controllers\BookController::class, 'addBook'])->name('addBook');
Route::get('/showBooks', [App\Http\Controllers\BookController::class, 'showBook'])->name('showme');
Route::post('/home',[App\Http\Controllers\HomeController::class, 'updateImage'])->name('image.upload');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/catagory', function () {
    $catagory = request('cat');
    $books = Book::where('catagory', $catagory)->get();
    $requests = Requests::where('user_id', Auth::User()->id)->get();
    return view('allBooks',[
        'books' => $books,
        'requests' => $requests,

    ]);
})->middleware(['auth' => 'verified']);

Route::get('/sendEmail', [App\Http\Controllers\RentController::class, 'rent'])->middleware(['auth' => 'verified']);
Route::get('/bookdetails', function () {
    $bookId = request('book');
    $books = Book::where('id', $bookId)->get();
    $requests = Requests::where(
        'user_id', '=',Auth::User()->id,'and')->where('book_id', '=',$bookId)
    
    ->get();
    return view('bookDetails',[
        'books' => $books,
        'requests' => $requests,
        ]);

    });
Route::get('/confirmRent', [App\Http\Controllers\RentController::class, 'confirmRent'])->middleware(['auth' => 'verified']);
Route::get('/declineRent', [App\Http\Controllers\RentController::class, 'declineRent'])->middleware(['auth' => 'verified']);

