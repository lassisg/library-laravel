@extends('layouts.app')

@section('content')
    <h1>{{$title}}</h1>
    {!! Form::open(['action' => 'PublishersController@store', 'method' => 'POST']) !!}
        <div class="form-group">
          {{ Form::label('name', 'Name') }}
          {{ Form::text('name', '', ['class'=>'form-control', 'placeholder'=>"Publisher's name"]) }}
        </div>
        {{Form::submit('Submit', ['class'=>'btn btn-primary'])}}
        {!! Form::close() !!}
@endsection
