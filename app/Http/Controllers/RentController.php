<?php

namespace App\Http\Controllers;
use App\Models\Book;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\rentRequest;
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
       


        Mail::to(  $current_user_email )->send(new rentRequest($user,$books,$owner));
    //     Mail::raw('it works',function($message){
    //    $current_user_email = Auth::User()->email;

    //    $bookid = request('bookid');
    //    $books = Book::where('id',  $bookid )->firstOrfail();
    //    $owner_id = $books->user_id;
    //    $owner = User::where('id',  $owner_id )->firstOrfail();
      
       
    //         $owner_email = $owner->email;
    //         $message->to($owner_email)->subject('hello there')->from($current_user_email);
    //     });

       return view('/emailSent')->with('message','request sent') ;




    }
}
