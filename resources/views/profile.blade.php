@extends("layouts.master")

@section("content")

    <h1>Hier komt de data van user!</h1>

    <p>{{ $user->name }}</p>
    <p>{{ $user->email }}</p>
	<a href="/update">Edit my profile</a>
	<a href="/logout">logout</a>
@stop