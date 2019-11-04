@extends('layouts.app')

@section('content')
    <h1>Edit Book</h1>
    {!! Form::open(['action' => ['BooksController@update', $book->id], 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
        <div class="form-group">
          {{ Form::label('name', 'Title') }}
          {{ Form::text('name', $book->name, ['class'=>'form-control', 'placeholder'=>'Book title']) }}
        </div>
        <div class="form-group">
          {{ Form::label('author', 'Author') }}
          {{ Form::select('author', $authors, $book->authors->pluck('id')->first(), ['class'=>'form-control', 'placeholder' => 'Select an author...'])}}
        </div>
        <div class="form-group">
          {{ Form::label('publisher', 'Publisher') }}
          {{ Form::select('publisher', $publishers, $book->publisher_id,['class'=>'form-control', 'placeholder' => 'Select a publisher...'])}}
        </div>
        <div class="form-group">
          {{ Form::label('edition', 'Edition') }}
          {{ Form::text('edition', $book->edition, ['class'=>'form-control', 'placeholder'=>'Book edition']) }}
        </div>
        <div class="form-group">
          {{ Form::label('published_at', 'Published at') }}
          {{ Form::text('published_at', $book->published_at, ['class'=>'form-control', 'placeholder'=>'Book publication date']) }}
        </div>
        <div class="form-group">
          {{ Form::label('isbn', 'ISBN') }}
          {{ Form::text('isbn', $book->isbn, ['class'=>'form-control', 'placeholder'=>'Book International Standard Book Number (ISBN)']) }}
        </div>
        <div class="form-group">
            {{ Form::label('cover', 'Cover image') }}
            {{ Form::file('cover') }}
        </div>
        <div class="form-group">
          {{ Form::label('copies', 'Copies') }}
          {{ Form::text('copies', $book->copies, ['class'=>'form-control', 'placeholder'=>'Book copies owned']) }}
        </div>
        <div class="form-group">
          {{ Form::label('location', 'Location') }}
          {{ Form::text('location', $book->location, ['class'=>'form-control', 'placeholder'=>'Book location']) }}
        </div>
        <div class="form-group">
          {{ Form::label('review', 'Review') }}
          {{ Form::textarea('review', $book->review, ['class'=>'form-control', 'placeholder'=>'Book review']) }}
        </div>
        {{Form::hidden('_method', 'PUT')}}
        {{Form::submit('Submit', ['class'=>'btn btn-primary'])}}
    {!! Form::close() !!}

@endsection
