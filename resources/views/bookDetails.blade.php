@extends('layouts.new')

@section('content')
<section class="section colored">
<div class="container">
<div class="row">
                <!-- ***** Pricing Item Start ***** -->
                @foreach ($books as $book)

                <div class="col-lg-4 col-md-6 col-sm-12" data-scroll-reveal="enter bottom move 50px over 0.6s after 0.4s">
                    <div class="pricing-item active">
                    @if ($book->copies == 0)
                    &nbsp;
                    &nbsp;
                    <div class="pricing-header">
                            <h3 class="pricing-title">Not Available</h3>
                        </div>
                    @endif

                        <div class="pricing-body">
                            <div class="price-wrapper">
                                <span class="currency">$</span>
                                <span class="price">{{ $book->price }}</span>
                            </div>

                            <ul class="list">
                                <li class="active" >Title : {{ $book->title }}</li>
                                <li class="active">Auther: {{ $book->auther }}</li>
                                <li class="active">ISPN : {{ $book->ispn }}</li>
                                <li class="active">Number of copies: {{ $book->copies }}</li>
                            
                            </ul>
                        </div>
                  
                        @if (!$requests->isEmpty())
                        <div class="pricing-footer">
                            <a class="main-button">{{$requests[0]->status}}</a>
                            
                        </div>

                    @elseif($book->user_id == Auth::user()->id )
                    <div class="pricing-footer">
                            <a class="main-button">update</a>
                            
                        </div>
                   
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

                   <div class="pricing-footer">
                            <a href="/sendEmail/?bookid={{$book->id}}" class="main-button">Ask to rent</a>
                            
                        </div>
                   @endif

                   <br>
                   <br>
                   <br>
               
                   <br>
                   </div>
                   <br>
                   <br>
                    </div>
                </div>
                <!-- ***** Pricing Item End ***** -->

          
            @endforeach
            </div>
</div>
</section>
@endsection
