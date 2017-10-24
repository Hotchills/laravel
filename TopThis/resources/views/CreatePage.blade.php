@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                    {{Form::open(['route'=>'page.store','method'=>'POST'])}}
                    {{Form::label('name','Name:')}}
                    {{Form::text('name','')}}
                    {{Form::label('mainpage_id','ParentPageID:')}}
                    {{Form::text('mainpage_id','')}}

                    {{Form::label('title','Title:')}}
                    {{Form::text('title','Title')}}
<br>
                    {{Form::label('body','body:')}}
                    {{Form::textarea('body','Body')}}

                    {{Form::submit('Add page')}}    


                    {{ Form::close() }}
                    
                    </div>
        </div>
    </div>
</div>            
                    
                    @endsection