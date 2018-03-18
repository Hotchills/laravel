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
            Page name :{!! $one !!} 
        </h2></div>
    <    <div class="flex-center">
        <div class="panel-heading"><p>  Main page : {!! $page->mainpage->name !!}&nbsp |&nbsp  Title : {{$page->title}}&nbsp| &nbsp   Body : {{$page->body}}</p></span>  
        </div>
    </div>
    <br>
    <h3>Tops on this category:</h3>
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

    <a href="{{route('CreateTop')}}">CreateTop</a>
</div>

@endsection