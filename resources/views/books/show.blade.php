@extends('layouts.app')

@section('content')
    <a href="/books" class="btn btn-secondary">Go Back</a>
    <hr>

    <div class="row no-gutters  overflow-hidden flex-md-row mb-4 h-md-250 position-relative">
        <div class="col p-4 d-flex flex-column position-static">
            <h3 class="mb-0"><a href="/books/{{$book->id}}">{{ $book->name }}</a></h3>
            <strong class="d-inline-block mt-3 text-primary">Author(s): </strong>
            @foreach ($book->authors as $author)
                {{$author->last_name}}, {{$author->first_name}};
            @endforeach
            <strong class="d-inline-block mt-3 text-primary">Publisher:</strong>
            {{$book->publisher->name}}
            <small class="mt-3">Published at: {{$book->published_at}}</small>
        </div>
        <div class="col mt-4 p-4 d-flex flex-column position-static">
            <strong class="d-inline-block mt-3 text-primary">Review:</strong>
            {{$book->review}}
        </div>
        <div class="col-auto d-none d-flex">
            <img
                class="img-fluid"
                width="200"
                height="250"
                src="/storage/cover_images/{{ $book->cover ? $book->cover : 'noImage.png' }}"
                alt="Book cover image">
        </div>
    </div>

    {{-- <h1>{{ $book->name }}</h1>
    <img src="/storage/cover_images/{{ $book->cover}}" alt="Cover image">
    <p>{{ $book->review }}</p> --}}
    @if(!Auth::guest())
    <hr>
    <div class="d-flex justify-content-between">
        <a href="/books/{{ $book->id }}/edit" class="btn btn-secondary">Edit</a>
        {!!Form::open(['action' => ['BooksController@destroy', $book->id], 'method'=>'POST', 'class' => 'form-inline'])!!}
            {{Form::hidden('_method', 'DELETE')}}
            {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
        {!!Form::close()!!}
    </div>
    @endif
@endsection
