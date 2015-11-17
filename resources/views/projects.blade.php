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
                        <form class="form" action="/projects/{{ $project->id }}/edit">
                            <div class="form-group">
                                <div class="">
                                    <button type="submit" class="btn btn-default">Edit</button>
                                </div>
                            </div>
                        </form>
                        <form class="form" action="/projects/delete/{{ $project->id }}">
                            <div class="form-group">
                                <div class="">
                                    <button type="submit" class="btn btn-default">Delete</button>
                                </div>
                            </div>
                        </form>
                        <img src="/uploads/{!! $project->img !!}" alt="">
                        <p>{{$project->body}}</p>
                    </li>

            @endforeach
        </ul>
    </div>
@stop
