@extends ('layouts.layout')

@section('content')

<div class="container-fluid px-1 px-md-5 px-lg-1 px-xl-5 py-5 mx-auto">
        <div class="card card0 border-0">
            <div class="row d-flex">
                <div class="col-lg-6">
                    <div class="card1 pb-5">
                  
                        <div class="row px-3 justify-content-center mt-4 mb-5 border-line"> <img src="https://thumbs.dreamstime.com/z/librarian-online-service-platform-knowledge-education-idea-llibrary-bookshelves-guid-isolated-vector-illustration-191844276.jpg" class="image"> </div>
                    </div>
                </div>

               
                <div class="col-lg-6">
                    <form action="../Controller/Register.php" method="post">
                    <div class="card2 card border-0 px-4 py-5">
                        <div class="row mb-4 px-3">
                            <h6 class="mb-0 mr-4 mt-2">Register</h6>
                        </div>
                        <div class="row px-3"> <label class="mb-1">
                            <h6 class="mb-0 text-sm">Name</h6>
                        </label> <input class="mb-4" type="text" name="name" placeholder="Enter your name" required > </div>
                        <div class="row px-3"> <label class="mb-1">
                                <h6 class="mb-0 text-sm">Email Address</h6>
                            </label> <input class="mb-4" type="email" name="email" placeholder="Enter a valid email address"required > </div>
                            <div class="row px-3"> <label class="mb-1">
                                <h6 class="mb-0 text-sm">Phone Number</h6>
                            </label> <input class="mb-4" type="number" size="10" name="phone" placeholder="Enter a valid Phone Number"required > </div>
                            <div class="row px-3"> <label class="mb-1">
                                <h6 class="mb-0 text-sm"> Address</h6>
                            </label> <input class="mb-4" type="text" name="address" placeholder="Enter your current address"required > </div>
                        <div class="row px-3"> <label class="mb-1">
                                <h6 class="mb-0 text-sm">Password</h6>
                            </label> <input type="password" name="password" placeholder="Enter password"required > </div>
                        <div class="row px-3 mb-4">
                         
                        </div>
                        <div class="row mb-3 px-3"> <button type="submit" class="btn btn-blue text-center">Register</button> </div>
                        
                    </div>
                </form>
                </div>
         
            </div>
            <div class="bg-blue py-4">
             
            </div>
        </div>
    </div>
@endsection
