<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,300,400,500,700,900" rel="stylesheet">
    <script src="assets/js/jquery-2.1.0.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>  
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/popper.js"></script>


    <script src="assets/js/bootstrap.min.js"></script>

    <!-- Plugins -->
    <script src="assets/js/scrollreveal.min.js"></script>
    <script src="assets/js/waypoints.min.js"></script>
    <script src="assets/js/jquery.counterup.min.js"></script>
    <script src="assets/js/imgfix.min.js"></script> 

    <!-- Global Init -->
    <script src="assets/js/custom.js"></script>
  


    <title>My Library</title>
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">

    <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.css">

    <link rel="stylesheet" href="assets/css/templatemo-softy-pinko.css">

    </head>
    
    <body>
    
    <!-- ***** Preloader Start ***** -->
    <div id="preloader">
        <div class="jumper">
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>  

    <header class="header-area header-sticky">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav class="main-nav">
                        <!-- ***** Logo Start ***** -->
                        <a href="#" class="logo">
                            Library
                            
                        </a>

                        @guest
                        <ul class="nav">
                            <li><a  href="{{ route('login') }}">{{ __('Login') }}</a></li>
                            <li> <a  href="{{ route('register') }}">{{ __('Register') }}</a></li>
                           </ul>
                                                       </nav>
                           </div>
                         </div>
                         </div>
                           </header>
                            
                         <!-- ***** Logo End ***** -->
                         <!-- ***** Menu Start ***** -->
                        @else
                           @can('add_books',Auth::user())
                             <ul class="nav">
                              <li><a href="/home" class="active">Home</a></li>
                              <li><a href="/addBook">Add Books</a></li>
                              <li><a href="/showRequests">Show Requests</a></li>
                              <li><a href="/showrenters">Show Renters</a></li>
                              <li><a href="/showBooks">Show Books</a></li>
                              <li><a href="/mypayment">Payment Account</a></li>
                              <li><a href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form></li>
                             </ul>
                              <a class='menu-trigger'>
                              <span>Menu</span>
                              </a>
                             <!-- ***** Menu End ***** -->
                              </nav>
                              </div>
                              </div>
                              </div>
                              </header>
                            @else   
                              <ul class="nav">
                              <li><a href="/home" class="active">Home</a></li>
                              <li><a href="/showBooks">Show Books</a></li>
                              <li><a href="/rentedbooks">Rented Books</a></li>
                              <li><a href="/mypayment">Payment Account</a></li>
                              <li><a href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form></li>
                              </ul>
                              <a class='menu-trigger'>
                              <span>Menu</span>
                              </a>
                             <!-- ***** Menu End ***** -->
                              </nav>
                              </div>
                              </div>
                              </div>
                              </header>
                              @endcan



                        @endguest
    <!-- ***** Header Area End ***** -->

    <!-- ***** Welcome Area Start ***** -->
    <div class="welcome-area" >

        <!-- ***** Header Text Start ***** -->
      
 
        <!-- ***** Header Text End ***** -->
    </div>
    <!-- ***** Welcome Area End ***** -->

    <!-- ***** Features Small Start ***** -->
    <main>
    @yield('content')
</main>


    <!-- ***** Contact Us End ***** -->
    
    <!-- ***** Footer Start ***** -->
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <ul class="social">
                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                        <li><a href="#"><i class="fa fa-rss"></i></a></li>
                        <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                    </ul>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <p class="copyright">Copyright &copy; 2020 Softy Pinko Company - Design: TemplateMo</p>
                </div>
            </div>
        </div>
    </footer>
    
    <!-- jQuery -->

    <!-- Bootstrap -->


  </body>
</html>
