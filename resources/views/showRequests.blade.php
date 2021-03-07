@extends('layouts.new')

@section('content')
<section class="section colored">
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
       
            <div class="card">
            
                <div class="card-header">{{ __('Book Store') }}</div>

                <div class="card-body">
                  
                <div class="row">
                  @foreach ($requests as $request)
                  <div  class="col-lg-4 col-md-6 col-sm-12">
                  <div  class="team-item">
                  <div style="text-align:center;">
                    <br>

                    <h class = "user-name" >This is request Number : {{ $request->id }}</h> 
                    <br>
                    <br>
                    <a  href='/bookdetails/?book={{$request->book_id }}' >Book: {{ $request->book_id }}</a> <br>
                    <h   >Sender: {{ $request->user_id }}</h> <br>
                    <h  >Status: {{ $request->status }}</h><br>
                   
                    <br>
                    <br>
                    @if($request->status == 'pending')
                    <a class="main-button" href='/ownerconfirm/?request={{$request->id }}' >Confirm</a> 
                    <a class="main-button" href='/ownerdecline/?request={{$request->id }}' >Decline</a> <br>
                    @elseif($request->status == 'confirmed')
                    <a class="main-button" >Confirmed</a> <br>
                    @elseif($request->status == 'rented')
                    <a class="main-button" >Rented</a> <br>
                    @else
                    <a class="main-button" >Update</a> <br>
                    @endif

                    <br>
                    <br>
                    <br>
                
                    <br>
                    </div>
                    </div>
                   </div>
                   
                 

                  @endforeach
                  </div>
                </div>
            </div>
        </div>
    </div>
</div>
</section>
@endsection
