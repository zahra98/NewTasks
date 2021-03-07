@extends('layouts.new')

@section('content')
<section class="section colored">
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
       
            <div class="card">
            
                <div class="card-header">{{ __('Book Store') }}</div>

                <div class="card-body">
                <form method = "POST" action="{{ route('rent.request') }}" >
                @csrf
                <button type="submit" class="btn btn-primary">
                                    {{ __('Send') }}
                                </button>
                </form>
               
                </div>
            </div>
        </div>
    </div>
</div>
</section>
@endsection
