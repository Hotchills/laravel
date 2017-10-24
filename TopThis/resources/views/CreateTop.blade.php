@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                    {{Form::open(['route'=>'top.store','method'=>'POST'])}}

                    {{Form::label('page_id','Page id:')}}
                    {{Form::text('page_id','1')}}


                    {{Form::label('title','Title:')}}
                    {{Form::text('title','Title')}}
<br>
                    {{Form::label('body','body:')}}
                    {{Form::textarea('body','Body')}}

                    {{Form::submit('Add top')}}    


                    {{ Form::close() }}
                    
                 </div>
        </div>
    </div>
</div>               
@endsection