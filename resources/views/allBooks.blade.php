@extends('layouts.new')

@section('content')

<section class="section colored">
<div class="container">
            <!-- ***** Section Title Start ***** -->

            <!-- ***** Section Title End ***** -->
          

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
                        <div class="pricing-footer">
                            <a href="/bookdetails/?book={{ $book->id }}" class="main-button">More Details</a>
                            
                        </div>
                    </div>
                </div>
                <!-- ***** Pricing Item End ***** -->

          
            @endforeach
            </div>
  </div>
</section>
@endsection
