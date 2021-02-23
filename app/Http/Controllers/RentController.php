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
use Illuminate\Http\Request;

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
        $address = $_SERVER['HTTP_HOST'];
        $toEmail = $owner->email;

        $request = Requests::create([
            'user_id'=>Auth::id(),
            'book_id' =>  $bookid ,
            'owner_id'=> $owner_id ,
        ]
    );
       $request -> save();

       // Mail::to(  $toEmail )->send(new rentRequest($user,$books,$owner, $address));
       return view('/emailSent')->with('message','request sent') ;
    }

    protected function confirmRent()
    {
       
        $user_id = request('user');
        $bookid = request('book');
        $user = User::where('id',  $user_id )->firstOrfail();
        $email = $user->email;
       // Mail::to( $email )->send(new rentResponse($bookid));
       // $requests = Requests::where( 'user_id', '=',$user_id,'and')->where('book_id', '=',$bookid) ->firstOrfail();
        // $requwstId=  $requests->id; 
        // $request2 = Requests::find($requwstId);
        // return  $request2;
        // $request2->status='confirmed';
        // $request2->save();
         return 'OK' ;
    }

    protected function ownerConfirm()
    {
       
        $requestId = request('request');
        $requests = Requests::where('id',  $requestId  )->firstOrfail();
        $requests->status='confirmed';
        $requests->save();
        return redirect('/showRequests');
    }

    protected function declineRent()
    {
        $bookid = request('bookid');
        $user_id = request('user');
        $user = User::where('id',   $user_id )->firstOrfail();
        $email = $user->email;
       // Mail::to( $email )->send(new rentdecline($bookid));
        return redirect('/home');




    }
}
