<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>TipTop</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        <link href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css" rel="stylesheet" />

        <!-- Styles -->
        <style>
            <!-- Styles laravel welocome page-->

            html, body {
                             
                background-color: #fff;
                color: #636b6f;
             
                font-weight: 100;
                height: 100vh;
                margin: 0;
            }
            
            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }


            <!-- Styles menu style-->     

            .navbar-nav>li>.dropdown-menu {
                border-top-left-radius:4px;
                border-top-right-radius:4px;
            }
            .navbar-default .navbar-nav>li>a {
                font-weight:bold;	
            }

            .mega-dropdown {
                position: static !important;
                display: block;
            }
            .mega-dropdown-menu {
                padding: 20px 0px;
                width: 100%;
                box-shadow: none;
                -webkit-box-shadow: none;
            }

            .mega-dropdown-menu > li > ul {
                padding: 0;
                margin: 0;
            }
            .mega-dropdown-menu > li > ul > li {
                list-style: none;
            }
            .mega-dropdown-menu > li > ul > li > a {
                display: block;
                padding: 3px 20px;
                clear: both;
                font-weight: normal;
                line-height: 1.428571429;
                color: #999;
                white-space: normal;
            }
            .mega-dropdown-menu > li ul > li > a:hover,
            .mega-dropdown-menu > li ul > li > a:focus {
                text-decoration: none;
                color: #444;
                background-color: #f5f5f5;
            }

            .mega-dropdown-menu .dropdown-header {
                color: #428bca;
                font-size: 18px;
                font-weight:bold;
            }
            .mega-dropdown-menu form {
                margin:3px 20px;
            }
            .mega-dropdown-menu .form-group {
                margin-bottom: 3px;
            }
            
            .vertical-align {
    display: flex;
    align-items: center;
}

        </style>
    </head>
    <body>
        <div class="container">
              @include('layouts.menu')  

        <main style="padding:10px;border:1px solid Gainsboro;border-radius: 5px;">
            
            
            @yield('content')
            
        </main>
        
 </div>
              
              
        <script src="http://code.jquery.com/jquery-2.1.3.min.js"></script> 
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
        <script src="bootstrap-hover-dropdown.min.js"></script>

    </body>
</html>
