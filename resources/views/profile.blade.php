@extends("layouts.master")

@section("content")

    <h1>Hier komt de data van user!</h1>

    <p>{{ $user->firstname . " " . $user->lastname }}</p>
    <p>{{ $user->email }}</p>
    @if($user->id == Auth::user()->id)
	    <a href="/update">Edit my profile</a>
    @endif

    <hr />
    <ul>
        @foreach($projects as $work)
            <li>
                <a href="/projects/{!! $work['id'] !!}">
                    <img style="width: 150px; height: 150px;" src="/uploads/{!! $work['img'] !!}" alt="">
                </a>
            </li>
        @endforeach
    </ul>
@stop