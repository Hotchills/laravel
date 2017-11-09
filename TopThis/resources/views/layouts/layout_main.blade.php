<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
   <head>

      <title>Do your top</title>
      <meta charset="utf-8">
      <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Abel">
      <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Tangerine">
      <link rel="stylesheet" href="/css/menu.css">
      <meta name="viewport" coSntent="width=device-width, initial-scale=1">

      <meta http-equiv="X-UA-Compatible" content="IE=edge">

      <!-- CSRF Token -->
      <meta name="csrf-token" content="{{ csrf_token() }}">

   <!--  <title>{{ config('app.name', 'Laravel') }}</title>-->

   </head>

  <div Style="min-width:640px;max-width:960px;margin:0 auto;">
      <div Style="height: 150px;">
      @include('layouts.header') 
      </div>
      <div Style="height: 80px;">
      @include('layouts.menu')   
      </div>
      <body>
         
         @yield('content')
         
      </body>
      
      <div class="footer">
         @include('layouts.footer')  
      </div>
</div>
   <!-- Scripts -->

   <script type="text/javascript" src="{{ URL::asset('/javascript/myScript.js') }}"></script>

</html>
