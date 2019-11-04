@extends('layouts.app')

@section('content')
    <h1>{{$title}}</h1>
    {!! Form::open(['action' => 'BooksController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
        <div class="form-group">
          {{ Form::label('name', 'Title') }}
          {{ Form::text('name', '', ['class'=>'form-control', 'placeholder'=>'Book title']) }}
        </div>
        <div class="form-group">
            {{ Form::label('author', 'Author') }}
            {{ Form::select('author', $authors, null, ['class'=>'form-control', 'placeholder' => 'Select an author...'])}}
        </div>
        <div class="form-group">
          {{ Form::label('publisher', 'Publisher') }}
          {{ Form::select('publisher', $publishers, null, ['class'=>'form-control', 'placeholder' => 'Select a publisher...'])}}
        </div>
        <div class="form-group">
          {{ Form::label('edition', 'Edition') }}
          {{ Form::text('edition', '', ['class'=>'form-control', 'placeholder'=>'Book edition']) }}
        </div>
        <div class="form-group">
          {{ Form::label('published_at', 'Published at') }}
          {{ Form::text('published_at', '', ['class'=>'form-control', 'placeholder'=>'Book publication date']) }}
        </div>
        <div class="form-group">
          {{ Form::label('isbn', 'ISBN') }}
          {{ Form::text('isbn', '', ['class'=>'form-control', 'placeholder'=>'Book International Standard Book Number (ISBN)']) }}
        </div>
        <div class="form-group">
            {{ Form::label('cover', 'Cover image') }}
            {{ Form::file('cover') }}
        </div>
        <div class="form-group">
          {{ Form::label('copies', 'Copies') }}
          {{ Form::text('copies', '', ['class'=>'form-control', 'placeholder'=>'Book copies owned']) }}
        </div>
        <div class="form-group">
          {{ Form::label('location', 'Location') }}
          {{ Form::text('location', '', ['class'=>'form-control', 'placeholder'=>'Book location']) }}
        </div>
        <div class="form-group">
          {{ Form::label('review', 'Review') }}
          {{ Form::textarea('review', '', ['class'=>'form-control', 'placeholder'=>'Book review']) }}
        </div>
        {{Form::submit('Submit', ['class'=>'btn btn-primary'])}}
    {!! Form::close() !!}

@endsection
