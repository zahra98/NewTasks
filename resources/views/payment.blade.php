@extends('layouts.new')

@section('content')
<section class="section colored">
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
       
            <div class="card">
            
                <div class="card-header">{{ __('Payment') }}</div>

                <div class="card-body">
                  <br>

                  @if (!$payment->isEmpty())
                 
                  <?php
                        echo "<h   > ";
                        echo "Your Balance: ";
                        echo $payment[0]->balance ;
                        echo "</h>";
                    ?>

               <form method = "post" action="{{ route('pay.payment') }}" >
                @csrf

                <label for="name" class="col-md-4 col-form-label text-md-left">{{ __('Amount') }}</label>

                            <div class="col-md-6">
                            <input id="amount" type="number" class="form-control @error('name') is-invalid @enderror" name="amount" value="{{ old('amount') }}" required autocomplete="name" autofocus>
                            </div>
                            <br>
                         
                            <button type="submit" class="main-button">
                                    {{ __('Charge My Account') }}
                                </button>

                  @else
                  <form method = "GET" action="{{ route('activate.account') }}" >
                @csrf
                <button type="submit" class="main-button">
                                    {{ __('Activate ') }}
                                </button>
                </form>

                @endif
                </div>
            </div>
        </div>
    </div>
</div>
</section>
@endsection