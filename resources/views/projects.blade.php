@extends('layouts.master')



@section("content")

    <h1>Projects<a href="/projects/add" class="btn btn-primary plus-project"><span>+</span> Add a project</a></h1>


    <div class="projects-container">
        <ul class="row ">
            @foreach($projects as $project)
                    <li class="col-xs-3 project content-box">
                        <div class="projects-title">
                            <a href="/projects/{{ $project->id }}">{{ $project->title }}</a>
                        </div>

                        <a href="/projects/{{ $project->id }}/edit/" class="btn btn-default">Edit</a>

                        <form class="form" action="/projects/{{ $project->id }}/delete" method="post" onclick="return confirm('Are you sure you want to delete this project?');">
                            {!! csrf_field() !!}
                            <button type="submit" class="btn btn-default">Delete</button>
                        </form>
                        <img src="/uploads/{!! $project->img !!}" alt="">
                        <p>{{$project->body}}</p>
                    </li>

            @endforeach
        </ul>
    </div>
@stop
