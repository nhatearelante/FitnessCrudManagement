@extends('layouts.app')

@section('title', 'Welcome')

@section('content')
    <div class="jumbotron">
        <h1 class="display-4">Welcome to My Laravel App!</h1>
        <p class="lead">This is a simple Laravel application using Bootstrap 5.</p>
        <hr class="my-4">
        <p>Learn more about Laravel and Bootstrap by visiting the official documentation:</p>
        <a class="btn btn-primary btn-lg" href="https://laravel.com/docs" role="button">Laravel Docs</a>
        <a class="btn btn-secondary btn-lg" href="https://getbootstrap.com/docs/5.0/getting-started/introduction/" role="button">Bootstrap Docs</a>
    </div>
@endsection
