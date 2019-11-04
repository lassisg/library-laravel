@extends('layouts.app')

@section('content')
<div class="jumbotron text-center">
    <h1>{{$title}}</h1>
</div>
<div class="container">
    <div class="card-deck">
        <div class="card" style="width: 18rem;">
            <div class="card-body">
                <h3 class="card-title">Last Releases</h3>
                <table class="table table-hover">
                    <tbody>
                        @foreach ($books as $book)
                        <tr>
                            <td>
                                <a href="/books/{{$book->id}}">{{ $book->name }}</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <h3 class="card-title">Best Sellers</h3>
                <table class="table table-hover">
                    <tbody>
                        @foreach ($bestSellers as $bestSeller)
                        <tr>
                            <td>
                                <a href="/books/{{ $bestSeller->id }}">{{ $bestSeller->name }}</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <h3 class="card-title">Main Authors</h3>
                <table class="table table-hover">
                    <tbody>
                        @foreach($authors as $author)
                        <tr>
                            <td>
                                <a href="/authors/{{$author->id}}">
                                    {{$author->first_name}} {{$author->last_name}}
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

  {{--
  <div id="busca">
      <form method="GET" action="busca.php">
          <p>
              Digite o nome do livro: <input type="text" name="nome_livro" size="15"><input type="submit" value="Buscar">
          </p>
      </form>
  </div>
  --}}
@endsection
