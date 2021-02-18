@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Your requedt has been sent') }}</div>

                <div class="card-body">

                    {{ __('Your request to rent this book has been sent, wait for the owner respond.') }}
                  
                 
                </div>
            </div>
        </div>
    </div>
</div>
@endsection