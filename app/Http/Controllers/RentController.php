<?php

namespace App\Http\Controllers;
use App\Models\Book;
use App\Models\Requests;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\rentRequest;
use App\Mail\rentResponse;
use App\Mail\rentdecline;
use App\Mail\Notify;
use Illuminate\Http\Request;
use App\Models\Rented;
use App\Models\Payment;
use Carbon\Carbon;
class RentController extends Controller

{
    public function __construct()
    {
        $this->middleware(['auth' => 'verified']);
    }

    public function index()
    {
        return view('sendEmail');
    }

    //

    protected function rent()
    {
        $bookid = request('bookid');
        $current_user_email = Auth::User()->email;
        $user = Auth::User();
        $books = Book::where('id',  $bookid )->firstOrfail();
        $owner_id = $books->user_id;
        $owner = User::where('id',  $owner_id )->firstOrfail();
        $address = request()->getHttpHost();

         $toEmail = $owner->email;

        $request = Requests::create([
            'user_id'=>Auth::id(),
            'book_id' =>  $bookid ,
            'owner_id'=> $owner_id ,
        ]
    );
       $request -> save();

        Mail::to(  $toEmail )->send(new rentRequest($user,$books,$owner, $address));
       return redirect('/bookdetails/?book='.$bookid) ;
   
    }

    protected function confirmRent()
    {
       
        $user_id = request('user');
        $bookid = request('book');
        $user = User::where('id',  $user_id )->firstOrfail();
        $email = $user->email;
        Mail::to( $email )->send(new rentResponse($bookid));
        return redirect('/home');
    }

    protected function ownerConfirm()
    {
       
        $requestId = request('request');
        $requests = Requests::where('id',  $requestId  )->firstOrfail();
        $requests->status='confirmed';
        $requests->save();
        $bookId = $requests->book_id; 
        $books = Book::where('id',$bookId )->firstOrfail();
        $books->copies=$books->copies - 1;
        $books->save();
        $owner = $books->user_id;
        $start = Carbon::now();
        $current = Carbon::now();
        $dueDate = $current->addDays(3);

        $rent = Rented::create([
            'renter_id'=>$requests->user_id,
            'rentedBook_id' =>  $bookId ,
            'startDate'=> $start  ,
            'dueDate'=>$dueDate,
            'request_id' => $requestId ,
            'owner_id'=> $owner 
        ]
    );
          $rent -> save();


          $renter_id = $requests->user_id;
          $payment = Payment::where('user_id',  $renter_id  )->firstOrfail();
          $payment->balance = $payment->balance - $books->price;
          $payment->save();
        return redirect('/showRequests');
    }

    protected function ownerDecline()
    {
       
        $requestId = request('request');
        $requests = Requests::where('id',  $requestId  )->firstOrfail();
        //$requests->status='confirmed';
        $requests->delete();
        return redirect('/showRequests');
    }

    protected function declineRent()
    {
        $bookid = request('bookid');
        $user_id = request('user');
        $user = User::where('id',   $user_id )->firstOrfail();
        $email = $user->email;
        Mail::to( $email )->send(new rentdecline($bookid));
        return redirect('/home');

    }

    protected function showRenters()
    {
        $user_id = Auth::id();
        $requestId = request('request');
        $renters = Rented::where('owner_id',  $user_id  )->get();
        return view('showRenters',[
            'renters' =>  $renters,
    
        ]);
    }

    protected function returnBook()
    {
        $rent_id = request('rent');
        $rent = Rented::where('id',$rent_id )->firstOrfail();
        $user_id = $rent->renter_id;
        $user = User::where('id',$user_id )->firstOrfail();
        $request = $rent->request_id;
        $requests = Requests::where('id',  $request  )->firstOrfail();
        $email = $user->email;
        //Mail::to( $email )->send(new rentdecline($bookid));
        $requests->delete();

        return redirect('/showrenters');




    }
    protected function notifyRenter()
    {
        $rent_id = request('rent');
        $rent = Rented::where('id',$rent_id )->firstOrfail();
        $user_id = $rent->renter_id;
        $user = User::where('id',$user_id )->firstOrfail();
        $email = $user->email;
        $book_id = $rent->rentedBook_id;
        $book = Book::where('id',  $book_id  )->firstOrfail();
        Mail::to( $email )->send(new Notify($book));
        return redirect('/showrenters');

    
    }

    protected function rentedBooks()
    {
        $user_id = Auth::id();
        //$rent_id = request('rent');
        $rent = Rented::where('renter_id',$user_id )->get();

        return view('rentedBooks',[
            'renters' =>  $rent,
        ]);


    }

    protected function filter(Request $request)
    {
        $filter_book = request('filter_book');
        $filter_user = request('filter_user');
        



    }
}
