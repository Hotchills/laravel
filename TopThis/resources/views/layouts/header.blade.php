<!-- Head-------------------------------------------->      
<div class="header">

   <div id="meniubarall" style="padding:0px;top:0%;margin:0px;height:40px;">
      <div id="mediabar" style="padding:0px; display:block;margin:0;height:100%;border-bottom:1px solid;">

         <!--   Start of login / logout
                 ------>    

         @guest
         <form method="POST" action="{{ route('login') }} " Style="float:right;">
            {{ csrf_field() }}
            <div class="{{ $errors->has('login') ? ' has-error' : '' }}"Style="float:left;">    
               <input  type="text"  name="login" value="E-Mail/User" required autofocus>

               @if ($errors->has('email'))
               <strong>{{ $errors->first('login') }}</strong>
               @endif

            </div>

            <div class="{{ $errors->has('password') ? ' has-error' : '' }}"Style="float:left;">
               <input type="password" value="password" name="password" required> 

               @if ($errors->has('password'))
               <strong>{{ $errors->first('password') }}</strong>
               @endif

            </div>
            <button type="submit"Style="float:left;">Login</button>
            <a Style="float:left;" href="{{ route('register') }}">Register</a>
         </form>
         @else                         
         <p Style="float:right" >
          You are now logged in  {{ Auth::user()->name }} 
         </p>
         <a Style="float:right"  href="{{ route('logout') }}"
            onclick="event.preventDefault();
                  document.getElementById('logout-form').submit();">
            Logout
         </a>
         <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            {{ csrf_field() }}
         </form>
         @endguest   
         <!--   Start of login / logout
                 ------>    
      </div>
   </div>
   <div id="iside" style="width:100% ;margin:0 auto;height:110px;">
      <a style="margin:0 auto;font-weight: bold; font-size: 28px;">Welcome to DO YOUR TOP Beta </a>

   </div>
   <!-- end of Head-->

</div>