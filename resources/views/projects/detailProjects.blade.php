@extends("layouts.master")

@section("content")
    <h2>{!! $project['title'] !!}</h2>
    <p>by <a href="/user/{!! $user['username'] !!}"><strong>{!! $user['firstname'] . " " . $user['lastname'] !!}</strong></a></p>
    
    <p>{!! $project['img'] !!}</p>
    <p>{!! $project['body'] !!}</p>
    <a href="/">{!! $project['tags'] !!}</a>
@stop