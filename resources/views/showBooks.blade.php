@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Book Store') }}</div>

                <div class="card-body">
                    
                  <h> Choose a catagory:</h>
                  <br>
                  <br>
                 

                    <?php
                  //  echo count($books);
                    for ($x = 0; $x < count($books); $x++) {
                        $cat = $books[$x]->catagory;
                        echo "<a href='/catagory/?cat=$cat' > ";
                        echo $books[$x]->catagory;
                        echo "</a>";
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