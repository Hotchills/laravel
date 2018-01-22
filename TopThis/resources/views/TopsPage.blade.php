
<div class="showtops">
    @foreach($tops as $top)    
    <div id="top_nr{{$top->id}}" class="top-heading" onclick="show({{$top->id}})">                    
        <h1>{{$top->title}}</h1>            
        <br>
        <p >{{$top->body}}</p>               
    </div> 
    <button  onclick="show({{$top->id}})">Show {{$top->id}}</button>
    <div id="idi{{$top->id}}" class="ascunde">
        <h1>{{$top->title}}</h1>  

        @guest
        <p> Please login to add comment</p>
        @else                         
        <button onclick="show_comments({{$top->id}})">Click to add a new comment</button>
        <div id="ds{{$top->id}}" class="newcommentarea" Style="display:none;">  
            <p>{{Auth::user()->name}}</p>
            {{ Form::open(['route'=>['comment.store',$top->id],'method'=>'POST'])}}                               
            {{Form::textarea('body','Comment')}}<br>
            {{Form::submit('Comment')}}    
            {{ Form::close() }} 
        </div>  
        @endguest  
       
       
      
        
        <section class="ShowCommentsClass">
              
            @include('CommentsPage')
           
        </section>

    </div>
    <br>
    @endforeach 
</div>


{{-- paginate comments + tops
@include('pagination.pagination_stats', ['paginator' => $tops])
{{ $tops->links('pagination.pagination_links') }} 
--}}