@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
       
            <div class="card">
            
                <div class="card-header">{{ __('Book Store') }}</div>

                <div class="card-body">
                  <br>
                  @foreach ($requests as $request)
                  <div  id="rcorners2">
                    <h>This is request Number : {{ $request->id }}</h> 
                    <br>
                    <br>
                    <br>
                    <a href='/bookdetails/?book={{$request->book_id }}' >Book: {{ $request->book_id }}</a> <br>
                    <h>Sender: {{ $request->user_id }}</h> <br>
                    <h>Status: {{ $request->status }}</h><br>
                   
                    <br>
                    <br>
                    @if($request->status == 'pending')
                    <a class="btn btn-primary" href='/ownerconfirm/?request={{$request->id }}' >Confirm</a> 
                    <a class="btn btn-primary" href='/ownerdecline/?request={{$request->id }}' >Decline</a> <br>
                    @elseif($request->status == 'confirmed')
                    <a class="btn btn-primary" >Confirmed</a> <br>
                    @elseif($request->status == 'rented')
                    <a class="btn btn-primary" >Rented</a> <br>
                    @else
                    <a class="btn btn-primary" >Update</a> <br>
                    @endif



                        
<!-- 
                        <form method = "GET" action="{{ route('confirm') }}" >
                      @csrf
                      <button type="submit" class="btn btn-primary">
                                    {{ __('Conferm') }}
                                </button>
                          </form> -->

                    
                    

 

    

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
