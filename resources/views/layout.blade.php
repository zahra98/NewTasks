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
@yield('content')
</body>
</html>
