<?php

namespace App\Http\Controllers;
use App\Models\User;
class RegisterController {
 public function show($slug){


//$post = \DB::table('users')-> where('user_id',$slug)->first();
$book = Book:: where ('catagory',$slug)->firstOrFail();
  //  return view('welcome', [
  //      'post' => $post
  //  ]);
  return $book;
 }
}


