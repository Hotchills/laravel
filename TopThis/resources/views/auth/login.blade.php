@extends('layouts.app')

@section('content')



<form method="POST" action="{{ route('login') }}">
   {{ csrf_field() }}

   <div class="{{ $errors->has('login') ? ' has-error' : '' }}">
      <label for="login" >E-Mail Address</label>       
      <input type="text"  name="login" value="{{ old('login') }}" required autofocus>

      @if ($errors->has('email'))
      <strong>{{ $errors->first('login') }}</strong>
      @endif

   </div>

   <div class="{{ $errors->has('password') ? ' has-error' : '' }}">
      <label for="password">Password</label>
      <input type="password" name="password" required> 

      @if ($errors->has('password'))
      <strong>{{ $errors->first('password') }}</strong>

      @endif
   </div>
   <button type="submit" class="btn btn-primary">Login</button>
   <a class="" href="{{ route('register') }}">Register</a>

</form>


@endsection
