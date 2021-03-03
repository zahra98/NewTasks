@extends('layouts.app')
    <!-- Fonts -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>  
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
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
                    <h>Start Date: {{ $rent->startDate }}</h><br>
                    <h>Due Date: {{ $rent->dueDate }}</h><br>
                   
                    <br>
                    <br>


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