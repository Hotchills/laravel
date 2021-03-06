<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <head>

        <title>Do your top</title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Abel">
        <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Tangerine">
        <link rel="stylesheet" href="/css/menu.css">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        <!-- CSRF Token -->
      
        <meta name="csrf-token" content="{{ csrf_token() }}">

   <!--  <title>{{ config('app.name', 'Laravel') }}</title>-->
        <meta name="keywords" content="footer, address, phone, icons" >
        <link href="http://fonts.googleapis.com/css?family=Cookie" rel="stylesheet" type="text/css">

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    </head>

    <div class="site">

        @include('layouts.header')    
        @include('layouts.menu')   

        @yield('content')

        <div class="footer">
            @include('layouts.footer')  
        </div>
    </div>
    <!-- Scripts -->

    <script type="text/javascript" src="{{ URL::asset('/javascript/myScript.js') }}"></script>

</html>
