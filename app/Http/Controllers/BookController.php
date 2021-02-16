<?php

namespace App\Http\Controllers;
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
        ]
    );
       $book -> save();
       return view('addBook');
        
    }
    protected function showBook()
    {
        $book = Book::all();
        return view('bookList', [
            'books' => $book
        ]);
    }

}
