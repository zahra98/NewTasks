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
                        echo "<h> ";
                        echo $books[$x]->title;
                        echo "</h>";
                      echo "<br>";
                      echo "<br>";
                      } 
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
