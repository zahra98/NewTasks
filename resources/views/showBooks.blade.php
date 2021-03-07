@extends('layouts.new')

@section('content')
<section class="mini">
<div class="mini-content">
            <div class="container">

                <!-- ***** Mini Box Start ***** -->
                <div class="row">
                @foreach ($books as $book)

                    <div class="col-lg-2 col-md-3 col-sm-6 col-6">
                        <a href="/catagory/?cat={{$book->catagory}}" class="mini-box">
                            <i><img src="assets/images/work-process-item-01.png" alt=""></i>
                            <strong>{{$book->catagory}}</strong>
                            <span>Here you can find all the books related to {{$book->catagory}} </span>
                         
                        </a>

                    </div>
                 @endforeach

                </div>
                <!-- ***** Mini Box End ***** -->
            </div>
        </div>
</section >
@endsection
