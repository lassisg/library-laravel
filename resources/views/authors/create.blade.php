@extends('layouts.app')

@section('content')
    <h1>{{$title}}</h1>
    {!! Form::open(['action' => 'AuthorsController@store', 'method' => 'POST']) !!}
        <div class="form-group">
          {{ Form::label('first_name', 'First name') }}
          {{ Form::text('first_name', '', ['class'=>'form-control', 'placeholder'=>"Author's first name"]) }}
        </div>
        <div class="form-group">
          {{ Form::label('last_name', 'Last name') }}
          {{ Form::text('last_name', '', ['class'=>'form-control', 'placeholder'=>"Author's last name"]) }}
        </div>
        <div class="form-group">
          {{ Form::label('observations', 'Observations') }}
          {{ Form::text('observations', '', ['class'=>'form-control', 'placeholder'=>"Observations on author"]) }}
        </div>
        {{Form::submit('Submit', ['class'=>'btn btn-primary'])}}
    {!! Form::close() !!}
@endsection
