@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h4>Dashboard</h4>
                </div>
                <div class="btn-group" role="group" aria-label="Add data">
                    <a
                        class="btn btn-secondary nav-link"
                        href="/books/create">
                        Add book
                    </a>
                    <a
                        class="btn btn-secondary nav-link"
                        href="/authors/create">
                        Add author
                    </a>
                    <a
                        class="btn btn-secondary nav-link"
                        href="/publishers/create">
                        Add publisher
                    </a>
                    <a
                        class="btn btn-secondary nav-link"
                        href="/contacts/create">
                        Add contact
                    </a>
                </div>

                <div class="card-body">

                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
