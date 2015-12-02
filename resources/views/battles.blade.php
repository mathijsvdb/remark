@extends("layouts.master")

@section("content")

    <div class="battle_container ">
        <h1>{{$active_battle->name}}</h1>
        <div class="information_battle"><p>{{$active_battle->description}}</p></div>
        <ul class="row">
            @foreach($battle_projects as $project)
                <li class="col-md-2 content-box">
                    <a href="/projects/{{ $project->id }}">{{ $project->title }} <span class="glyphicon glyphicon-heart"> {{ $project->likes }}</span></a>
                    <img src="/uploads/{!! $project->img !!}" alt="">
                    <p>{{$project->body}}</p>

                </li>
            @endforeach
        </ul>
    </div>
@stop

@section("scripts")
@stop