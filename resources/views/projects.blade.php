@extends('layouts.master')



@section("content")

    <h1>Projects<a href="/projects/add" class="btn btn-primary plus-project"><span>+</span> Add a project</a></h1>
    <hr class="hr_left">

    <div class="projects-container">
        <ul class="row">
            @foreach($projects as $project)
                    <li class="col-xs-3 project content-box">
                        <div class="projects-title">
                            <a href="/projects/{{ $project->id }}">
                                <span>{{ $project->title }}</span>

                                <p>{{$project->body}}</p>
                            </a>
                            <img src="/uploads/{!! $project->img !!}" alt="">

                        </div>
                    </li>
            @endforeach
        </ul>
    </div>
@stop
