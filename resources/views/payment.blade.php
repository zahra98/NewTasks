@extends('layouts.app')

@section('content')
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

                  @else
                  <form method = "GET" action="{{ route('activate.account') }}" >
                @csrf
                <button type="submit" class="btn btn-primary">
                                    {{ __('Activate') }}
                                </button>
                </form>

                @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection