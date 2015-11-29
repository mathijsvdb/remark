@extends("layouts.master")

@section("content")
    <h1>{{$active_battle->name}}</h1>
    <p>{{$active_battle->description}}</p>

    <ul>
        @foreach($battle_projects as $project)
            <li>
                <a href="/projects/{{ $project->id }}">{{ $project->title }}</a>
                <img src="/uploads/{!! $project->img !!}" alt="" style="width: 200px; height: 200px;">
                <p>{{$project->body}}</p>
                <span class="glyphicon glyphicon-heart"></span> {{ $project->likes }}
            </li>
        @endforeach
    </ul>

@stop

@section("scripts")
@stop