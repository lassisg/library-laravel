@extends('layouts.app')

@section('content')
    <a href="/publishers" class="btn btn-secondary">Go Back</a>
    <h1>{{ $publisher->name }}</h1>
    @if(!Auth::guest())
    <hr>
    <div class="d-flex justify-content-between">
        <a href="/publishers/{{ $publisher->id }}/edit" class="btn btn-secondary">Edit</a>
        {!!Form::open(['action' => ['PublishersController@destroy', $publisher->id], 'method'=>'POST', 'class' => 'form-inline'])!!}
            {{Form::hidden('_method', 'DELETE')}}
            {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
        {!!Form::close()!!}
    </div>
    @endif
@endsection
