@extends('layouts.app')

@section('content')
    <a href="/authors" class="btn btn-secondary">Go Back</a>
    <h1>{{ $author->last_name }}, {{$author->first_name}}</h1>
    <p>{{$author->observations}}</p>
    @if(!Auth::guest())
    <hr>
    <div class="d-flex justify-content-between">
        <a href="/authors/{{ $author->id }}/edit" class="btn btn-secondary">Edit</a>
        {!!Form::open(['action' => ['AuthorsController@destroy', $author->id], 'method'=>'POST', 'class' => 'form-inline'])!!}
            {{Form::hidden('_method', 'DELETE')}}
            {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
        {!!Form::close()!!}
    </div>
    @endif
@endsection
