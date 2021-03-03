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
                  @foreach ($books as $book)
                  <div  id="rcorners2">
                    <h>This is book Number : {{ $book->id }}</h> 
                    @if ($book->copies == 0)
                    &nbsp;
                    &nbsp;
                    <h class = "war">Not Available</h>
                    @endif
                    <br>
                    <br>
                    
                    <h>Title : {{ $book->title }}</h> <br>
                    <h>Auther: {{ $book->auther }}</h> <br>
                    <h>Price: {{ $book->price }}</h> <br>
                    <h>ISPN : {{ $book->ispn }}</h><br>
                    <h>Number of copies: {{ $book->copies }}</h> 
                    <br>
                    <br>


                    @if ($book->copies > 0)
                    <?php
                        echo "<a class= 'btn btn-primary' href='/bookdetails/?book=$book->id' > ";
                        echo 'View Details';
                        echo "</a>";
                    ?>
                    @endif
                    
                    <br>
                    <br>
                    <br>
                
                    <br>
                    </div>
                    <br>
                    <br>
                 

                  @endforeach
               
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
