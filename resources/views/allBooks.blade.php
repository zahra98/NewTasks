@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Book Store') }}</div>

                <div class="card-body">
                    
                  <h> Books realated to : {{$books[0]->catagory}}</h>
                  <br>
                  <br>
                 

                    <?php
                  //  echo count($books);
                    for ($x = 0; $x < count($books); $x++) {
                        $bookNumber = $x +1;
                        echo " $bookNumber - ";
                        echo "<br> ";
                        echo "Title : ";
                        echo "<h> ";
                        echo $books[$x]->title;
                        echo "</h>";
                        echo "<br> ";
                        echo "Auther : ";
                        echo "<h> ";
                        echo $books[$x]->auther;
                        echo "</h>";
                        echo "<br> ";
                        echo "ISPN : ";
                        echo "<h> ";
                        echo $books[$x]->ispn;
                        echo "</h>";
                        echo "<br> ";
                        echo "Available Copies : ";
                        echo "<h> ";
                        echo $books[$x]->copies;
                        echo "</h>";


                        echo "<br> ";
                        echo "<br> ";
                      } 
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
