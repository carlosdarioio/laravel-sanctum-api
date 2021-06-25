@extends('layouts.app')
@section('content')
<div class="jumbotron text-center">
    <h1>{{$title}}</h1>
    <p>This is a laravel app form the "laravel from scracth you tu be series"</p>
    <p>
        <a href="/login" class="btn btn-primary btn-lg" role="button">Login</a>
        <a href="/register" class="btn btn-info btn-lg" role="button">Register</a>
    </p>
</div>

@endsection