<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Models\Book;
use App\Models\User;
use App\Models\Payment;
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
    $userId = Auth::User()->id;
    $bookId = request('book');
    $books = Book::where('id', $bookId)->get();
    $requests = Requests::where(
        'user_id', '=',Auth::User()->id,'and')->where('book_id', '=',$bookId)
    
    ->get();
    $payment = Payment::where('user_id', $userId)->get();
    return view('bookDetails',[
        'books' => $books,
        'requests' => $requests,
        'payment'=>$payment,
        ]);

    });
Route::get('/confirmRent', [App\Http\Controllers\RentController::class, 'confirmRent'])->name('confirm')->middleware(['auth' => 'verified']);
Route::get('/declineRent', [App\Http\Controllers\RentController::class, 'declineRent'])->middleware(['auth' => 'verified']);

Route::get('/showRequests', function () {
    $userId = Auth::User()->id;
    $books = Book::where('user_id', $userId)->get();
    $requests = Requests::where('owner_id', $userId)->get();
    return view('showRequests',[
        'books' => $books,
        'requests' => $requests,

    ]);
    //return  $requests;
})->middleware('can:add_books,user');
//rentedbooks
//ownerConfirm
Route::get('/ownerconfirm', [App\Http\Controllers\RentController::class, 'ownerConfirm'])->name('ownerconfirm')->middleware(['auth' => 'verified']);
Route::get('/ownerdecline', [App\Http\Controllers\RentController::class, 'ownerDecline'])->name('ownerdecline')->middleware(['auth' => 'verified']);
Route::get('/showrenters', [App\Http\Controllers\RentController::class, 'showRenters'])->name('showrenters')->middleware(['auth' => 'verified']);
Route::get('/returnbook', [App\Http\Controllers\RentController::class, 'returnBook'])->name('returnbook')->middleware(['auth' => 'verified']);
Route::get('/notifyrenter', [App\Http\Controllers\RentController::class, 'notifyRenter'])->name('notifyrenter')->middleware(['auth' => 'verified']);
Route::get('/rentedbooks', [App\Http\Controllers\RentController::class, 'rentedBooks'])->name('rentedbooks')->middleware(['auth' => 'verified']);
Route::get('/payment', function () {
    $userId = Auth::User()->id;
    $payment = Payment::where('user_id', $userId)->get();
    return view('payment',[
        'payment' =>  $payment,
       
    ]
);
});
Route::get('/ActivatePayment', function () {
    $userId = Auth::User()->id;
    $user = User::find($userId);
   $user->paymentAccount();
    return redirect('payment');

})->name('activate.account')->middleware(['auth' => 'verified']);
Route::post('filter', [App\Http\Controllers\RentController::class, 'filter']);