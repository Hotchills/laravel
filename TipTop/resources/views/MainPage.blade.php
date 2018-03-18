@extends('layouts.app')

@section('content')
<div class="firstmain">

    @if (session()->has('message'))
    <div class="alert alert-success">
        {{ session()->get('message') }}
    </div>
    @endif
    <br>


    <div class="flex-center">
        <h2 >
            Page name : {{$mainpage->name}}
        </h2></div>
    <div class="flex-center">
        <div class="panel-heading"><p>Page title : {{$mainpage->title}}</p></div>
        <div class="panel-heading"><p>Page Body : {{$mainpage->body}}</p></div>
    </div>
    <h3>Pages on this category:</h3>
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
    <a href="{{route('CreatePage')}}">CreatePage</a>
</div>
@endsection
