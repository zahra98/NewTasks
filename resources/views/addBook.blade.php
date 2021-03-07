@extends('layouts.new')

@section('content')
<section class="section colored">
           
       
          
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Add Book') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('addBook') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="title" class="col-md-4 col-form-label text-md-right">{{ __('Title') }}</label>

                            <div class="col-md-6">
                                <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title') }}" required autocomplete="title" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="auther" class="col-md-4 col-form-label text-md-right">{{ __('Auther') }}</label>

                            <div class="col-md-6">
                                <input id="auther" type="text" class="form-control @error('auther') is-invalid @enderror" name="auther" value="{{ old('auther') }}" required autocomplete="auther">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
  
                        <div class="form-group row">
                            <label for="copies" class="col-md-4 col-form-label text-md-right">{{ __(' Number of Copies') }}</label>

                            <div class="col-md-6">
                                <input id="copies" type="text" class="form-control @error('copies') is-invalid @enderror" name="copies" value="{{ old('copies') }}" required autocomplete="copies">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="ispn" class="col-md-4 col-form-label text-md-right">{{ __(' ISPN') }}</label>

                            <div class="col-md-6">
                                <input id="ispn" type="text" class="form-control @error('ispn') is-invalid @enderror" name="ispn" value="{{ old('ispn') }}" required autocomplete="ispn">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="price" class="col-md-4 col-form-label text-md-right">{{ __(' Price') }}</label>

                            <div class="col-md-6">
                                <input id="price" type="text" class="form-control @error('price') is-invalid @enderror" name="price" value="{{ old('price') }}" required autocomplete="price">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="catagory" class="col-md-4 col-form-label text-md-right">{{ __(' Category') }}</label>

                            <div class="col-md-6">
                           
                                 <select name="catagory" id="catagory">
                                 <option value="ios">iOS Development</option>
                                 <option value="web">Web programming</option>
                                 <option value="android">Android</option>
                         
                                 </select>
                                 <br><br>
                            </div>
                        </div>

                       
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="main-button">
                                    {{ __('Add') }}
                                </button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</section>
@endsection
