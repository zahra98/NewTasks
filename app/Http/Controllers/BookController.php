<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\Book;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
class BookController extends Controller
{

    public function __construct()
    {
        $this->middleware(['auth' => 'verified']);
    }

    public function index()
    {
        return view('addBook');
    }
    //
    protected function addBook(Request $request)
    {

        $book = Book::create([
            'user_id'=>Auth::id(),
            'title' => $request->input('title'),
            'auther' => $request->input('auther'),
            'catagory' => $request->input('catagory'),
            'copies'=> $request->input('copies'),
            'ispn'=> $request->input('ispn'),
            'price'=> $request->input('price'),
        ]
    );
       $book -> save();
       return view('addBook');
        
    }

    protected function showBook()//get all the catagories
    {
        $book = DB::table('books')
                ->select('catagory')
                ->groupBy('catagory')
                ->get();
        return view('showBooks', [
            'books' => $book
        ]);

    }

}
