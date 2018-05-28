@extends('layouts.app')

@section('content')

<div id="tag" class="firstmain">
    @if (session()->has('message'))
    <div class="alert alert-success">
        {{ session()->get('message') }}
    </div>
    @endif

    <div class="flex-center">
        <h2 >
            Page name :{!! $page->title !!} 
        </h2></div>
       <div class="flex-center">
        <div class="panel-heading"><p>  Main page : {!! $page->mainpage->name !!}&nbsp |&nbsp  Title : {{$page->title}}&nbsp| &nbsp   Body : {{$page->body}}</p></span>  
        </div>
    </div>
    
    <br>

    <section class="ShowTopsClass">
        @include('TopsPage')
    </section>


    @if (session()->has('message'))
    <div class="alert alert-success">
        {{ session()->get('message') }}
    </div>
    @endif
    <br>
    @if($page->page_type == 0)
    <a href="{{route('CreateTop',['main'=> $page->mainpage->name ,'page' => $page->name ])}}">CreateTop</a>
    @endif
    @if($page->page_type == 1)
    <a href="{{route('CreateTop',['main'=> $page->mainpage->name ,'page' => $page->name ])}}">AddMovie</a>
    @endif
</div>

@endsection