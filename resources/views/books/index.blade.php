@extends('layouts.app')

@section('content')
    <h1>{{$title}}</h1>
    @if(count($books) > 0)
        {{-- TODO: Add search --}}
        @foreach ($books as $book)
            <div class="row no-gutters border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
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
                <div class="col-auto d-none d-lg-block">
                    <img
                        class="img-fluid cover"
                        src="/storage/cover_images/{{ $book->cover ? $book->cover : 'noImage.png' }}"
                        alt="Book cover image">
                </div>
            </div>
        @endforeach
        {{ $books->links() }}
    @else
    <p>Nothing to show...</p>
    @endif

@endsection
