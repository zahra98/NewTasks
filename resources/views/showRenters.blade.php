@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
       
            <div class="card">
            
                <div class="card-header">{{ __('Book Store') }}</div>

                <div class="card-body">
                  <br>
                  @foreach ($renters as $rent)
                  <div  id="rcorners2">
                    <h>This is rent Number : {{ $rent->id }}</h> 
                    <br>
                    <br>
                
                    <a href='/bookdetails/?book={{$rent->rentedBook_id }}' >Book: {{ $rent->rentedBook_id }}</a> <br>
                    <h>Renter: {{ $rent->renter_id }}</h> <br>
                
                    <h>Start Date: {{ $rent->startDate }}</h><br>
                    <h>Due Date: {{ $rent->dueDate }}</h><br>
                   
                    <br>
                    <br>
                    @if($rent->status == 'pending')
                    <a class="btn btn-primary" href='/returnbook/?rent={{$rent->id }}' >Returned</a> 
                    <a class="btn btn-primary" href='/notifyrenter/?rent={{$rent->id }}' >Notify</a> <br>
                    @elseif($rent->status == 'confirmed')
                    <a class="btn btn-primary" >Confirmed</a> <br>
                    @elseif($rent->status == 'rented')
                    <a class="btn btn-primary" >Rented</a> <br>
                    @else
                    <a class="btn btn-primary" >Update</a> <br>
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