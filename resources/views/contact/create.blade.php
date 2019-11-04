@extends('layouts.app')

@section('content')
    <h1>Contact</h1>
    {!! Form::open(['action' => 'ContactFormController@store', 'method' => 'POST']) !!}
        <div class="form-group">
        {{ Form::label('name', 'Name') }}
        {{ Form::text('name', old('name'), ['class'=>'form-control']) }}
        </div>
        <div class="form-group">
          {{ Form::label('email', 'Email') }}
          {{ Form::text('email', old('email'), ['class'=>'form-control', 'placeholder'=>"Your best email"]) }}
        </div>
        <div class="form-group">
          {{ Form::label('phone', 'Phone') }}
          {{ Form::text('phone', old('phone'), ['class'=>'form-control']) }}
        </div>
        <div class="form-group">
          {{ Form::label('message', 'Message') }}
          {{ Form::textarea('message', old('message'), ['class'=>'form-control', 'placeholder'=>"Tell us how can we help you..."]) }}
        </div>
        {{Form::submit('Submit', ['class'=>'btn btn-primary'])}}
    {!! Form::close() !!}

@endsection
