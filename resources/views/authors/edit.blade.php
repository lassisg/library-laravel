@extends('layouts.app')

@section('content')
    <h1>Edit Author</h1>
    {!! Form::open(['action' => ['AuthorsController@update', $author->id], 'method' => 'POST']) !!}
        <div class="form-group">
          {{ Form::label('first_name', 'First name') }}
          {{ Form::text('first_name', $author->first_name, ['class'=>'form-control', 'placeholder'=>"Author's first name"]) }}
        </div>
        <div class="form-group">
          {{ Form::label('last_name', 'Last name') }}
          {{ Form::text('last_name', $author->last_name, ['class'=>'form-control', 'placeholder'=>"Author's last name"]) }}
        </div>
        <div class="form-group">
          {{ Form::label('observations', 'Observations') }}
          {{ Form::text('observations', $author->observations, ['class'=>'form-control', 'placeholder'=>"Observations on author"]) }}
        </div>
        {{Form::hidden('_method', 'PUT')}}
        {{Form::submit('Submit', ['class'=>'btn btn-primary'])}}
        {!! Form::close() !!}
@endsection
