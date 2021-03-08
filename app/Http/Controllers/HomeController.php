<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth' => 'verified']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function updateImage()
    {
        $id = Auth::id();
        $user =  User::find($id);
        $image = request()->file('fileToUpload');
        $name = time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/images');
            $image->move($destinationPath, $name);
            $user -> image = '/images'. '/' . $name;
            $user-> save();
            return back()->with('success','Image Upload successfully');
        
    }

    
    public function show()
    {
        $post =User::all();
        return $post;
         
        
    }
}

