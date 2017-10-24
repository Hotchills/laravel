
<a  href="{{ url('/') }}">
   {{ config('app.name', 'Laravel') }}
</a>

@guest
<a href="{{ route('login') }}">Login</a>
<a href="{{ route('register') }}">Register</a>
@else                         
<a href="#"  data-toggle="dropdown" role="button" aria-expanded="false">
   {{ Auth::user()->name }} 
</a>

<a href="{{ route('logout') }}"
   onclick="event.preventDefault();
               document.getElementById('logout-form').submit();">
   Logout
</a>
<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
   {{ csrf_field() }}
</form>

@endguest                 
@yield('content')
