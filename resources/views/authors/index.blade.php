@extends('layouts.app')

@section('content')
    <h1>{{$title}}</h1>
    @if(count($authors) > 0)
        {{-- TODO: Add search --}}
        {{-- <div id="busca">
            <form method="GET">
                <p>
                    Digite o nome do autor: <input type="text" name="nome" size="15" value="{$smarty.get.nome}">
                    <input type="submit" value="Buscar">
                </p>

            </form>
        </div> --}}
        <ul class="list-group">
            @foreach ($authors as $author)
            <li class="list-group-item">
                <h5 class="mt-0">
                    <a href="/authors/{{$author->id}}">
                        {{ $author->last_name }}, {{ $author->first_name }}
                    </a>
                </h5>
                <p>{{$author->observations}}</p>
                <p><strong>Book(s): </strong>
                @foreach ($author->books as $book)
                    {{$book->name}};
                @endforeach
                </p>
            </li>
            @endforeach
        </ul>
        {{ $authors->links() }}
    @else
    <p>Nothing to show...</p>
    @endif

@endsection
