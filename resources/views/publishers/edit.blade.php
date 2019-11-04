@extends('layouts.app')

@section('content')
    <h1>Edit Publisher</h1>
    {!! Form::open(['action' => ['PublishersController@update', $publisher->id], 'method' => 'POST']) !!}
        <div class="form-group">
          {{ Form::label('name', 'Name') }}
          {{ Form::text('name', $publisher->name, ['class'=>'form-control', 'placeholder'=>"Publisher's name"]) }}
        </div>
        {{Form::hidden('_method', 'PUT')}}
        {{Form::submit('Submit', ['class'=>'btn btn-primary'])}}
        {!! Form::close() !!}
@endsection
