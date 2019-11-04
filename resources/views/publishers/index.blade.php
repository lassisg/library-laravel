@extends('layouts.app')

@section('content')
    <h1>{{$title}}</h1>
    @if(count($publishers) > 0)
    {{-- TODO: Add search --}}
        {{-- <div id="busca">
            <form method="GET">
                <p>
                    Digite o nome da editora: <input type="text" name="nome" size="15" value="{$smarty.get.nome}">
                    <input type="submit" value="Buscar">
                </p>

            </form>
        </div> --}}
        <ul class="list-group">
            @foreach ($publishers as $publisher)
            <li class="list-group-item">
                <h5 class="mt-0">
                    <a href="/publishers/{{$publisher->id}}">
                        {{ $publisher->name }}
                    </a>
                </h5>
            </li>
            @endforeach
        </ul>
        {{ $publishers->links() }}
    @else
    <p>Nothing to show...</p>
    @endif

@endsection
