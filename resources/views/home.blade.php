@extends('layouts.new')

@section('content')
<section class="section colored">
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Your Profile') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div>
                    <img src="{{ Auth::user()->image }}" height="100px" width="100px" />
                    </div> 
                    <form action="{{ route('image.upload') }}" method="post" enctype="multipart/form-data">
                    @csrf
                      <input type="file" class="mb-1" name="fileToUpload" id="fileToUpload">
                           <input type="submit" class="btn btn-blue text-center" value="Upload Image" name="submit">
                               </form>
                            
                               <br>
                    <div>
                    <h> {{__('Name : ') }}</h>
                   <h> {{ Auth::user()->name }}</h>
                    <br>
                    <h> {{ __('Email : ')   }}</h>
                   <h>  {{ Auth::user()->email }} </h>
                   <br>
                   <h> {{ __(' Address :')  }}</h>
                   <h> {{ Auth::user()->address }} </h>
                   <br>
                   </div>
                 

                </div>
            </div>
        </div>
    </div>
</div>
</section>
@endsection
