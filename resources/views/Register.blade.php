<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" >
<head>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
   
    <link rel="stylesheet" type="text/css" href="{{ asset('LogIn.css') }}" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
 
    <style>
            body {
                font-family: 'Nunito';
            }

            .card0 {
       box-shadow: 0px 4px 8px 0px #757575;
       border-radius: 0px
   }
   
   .card2 {
       margin: 0px 40px
   }
   
   .logo {
       width: 200px;
       height: 100px;
       margin-top: 20px;
       margin-left: 35px
   }
   
   .image {
       width: 190px;
       height: 200px
   }
   
   .border-line {
       border-right: 1px solid #EEEEEE
   }

   input,
   textarea {
       padding: 10px 12px 10px 12px;
       border: 1px solid lightgrey;
       border-radius: 2px;
       margin-bottom: 5px;
       margin-top: 2px;
       width: 100%;
       box-sizing: border-box;
       color: #2C3E50;
       font-size: 14px;
       letter-spacing: 1px
   }
   
   input:focus,
   textarea:focus {
       -moz-box-shadow: none !important;
       -webkit-box-shadow: none !important;
       box-shadow: none !important;
       border: 1px solid #304FFE;
       outline-width: 0
   }
   
   button:focus {
       -moz-box-shadow: none !important;
       -webkit-box-shadow: none !important;
       box-shadow: none !important;
       outline-width: 0
   }
   
   a {
       color: inherit;
       cursor: pointer
   }
   
   .btn-blue {
       background-color: #1A237E;
       width: 150px;
       color: #fff;
       border-radius: 2px
   }
   
   .btn-blue:hover {
       background-color: #000;
       cursor: pointer
   }
   
   .bg-blue {
       color: #fff;
       background-color: #1A237E
   }
   
   @media screen and (max-width: 991px) {
       .logo {
           margin-left: 0px
       }
   
       .image {
           width: 300px;
           height: 220px
       }
   
       .border-line {
           border-right: none
       }
   
       .card2 {
           border-top: 1px solid #EEEEEE !important;
           margin: 0px 15px
       }
   }


        </style>


</head>
<body>
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

</body>
</html>
