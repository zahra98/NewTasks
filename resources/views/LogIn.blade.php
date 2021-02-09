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
                    <div class="card2 card border-0 px-4 py-5">
                        <div class="row mb-4 px-3">
                            <h6 class="mb-0 mr-4 mt-2">Sign in</h6>
                        </div>
                        <form action="../Controller/LogIn.php" method="post">
                        <div class="row px-3"> <label class="mb-1">
                                <h6 class="mb-0 text-sm">Email Address</h6>
                            </label> <input class="mb-4" type="text" name="email" placeholder="Enter a valid email address"> </div>
                        <div class="row px-3"> <label class="mb-1">
                                <h6 class="mb-0 text-sm">Password</h6>
                            </label> <input type="password" name="password" placeholder="Enter password"> </div>
                       
                            <div class="row mb-4 px-3"> <small class="font-weight-bold">Forgot your password? <a href="Reset.html" class="text-danger ">Reset</a></small> </div>
                     
                        <div class="row mb-3 px-3"> <button type="submit" name = "login" class="btn btn-blue text-center">Login</button> </div>
                        <div class="row mb-4 px-3"> <small class="font-weight-bold">Don't have an account?! <a href="Register.html" class="text-danger ">Register</a></small> </div>
                       

                    </form>
                    </div>
                </div>
            </div>
            <div class="bg-blue py-4">
             
            </div>
        </div>
    </div>

@endsection