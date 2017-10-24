@extends('layouts.layout_main')

@section('content')

<div Style="min-height: 700px;">

   <div class="panel-heading"><p>Page name : {{$mainpage->name}}</p></div>
   <div class="panel-heading"><p>Page title : {{$mainpage->title}}</p></div>
   <div class="panel-heading"><p>Page Body : {{$mainpage->body}}</p></div>
   <div Style="margin-left:20px;"><p>Pages on this category:</p></div>
   <br>

   @foreach($pages as $page)    

   <div Style="margin-left:20px;">----------------</div>   

   <div Style="float:left;margin-left:20px;"><a href="/{{$mainpage->name}}/{{$page->name}}">{{$page->title}}</a></div>
   <div Style="float:left;margin-left:20px;">{{$page->body}}</div>
   <br> 
   @endforeach 

   @if (session('status'))
   <div class="alert alert-success">
      {{ session('status') }}
   </div>
   @endif
<br>
<br>

</div>
@endsection
