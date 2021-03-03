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

                  
                    @if (!$requests->isEmpty())
                   
                    <?php
                        echo "<h class= 'btn btn-primary'  > ";
                        echo $requests[0]->status ;
                        echo "</h>";
                        
                    ?>
                     @elseif($book->user_id == Auth::user()->id )
                    <?php
                        echo "<h class= 'btn btn-primary'  > ";
                        echo "Update";
                        echo "</h>";
                    ?>
                    
                    @elseif($payment->isEmpty() )
                    <br>
                   
                    <?php
                        echo "<h class= 'war'  > ";
                        echo "You have to Create a Payment account";
                        echo "</h>";
                    ?>
                     @elseif($payment[0]->balance < $book->price  )
                     <br>
                    <?php
                        echo "<h class= 'war'  > ";
                        echo "You don't have enough Money to rent this book!!";
                        echo "</h>";
                    ?>

                    
                    @else
                    <?php
                        echo "<a class= 'btn btn-primary' href='/sendEmail/?bookid=$book->id' > ";
                        echo 'ask to rent';
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
