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
                        <form class="form" action="/projects/edit/{{ $project->id }}">
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
                        <p>{{$project->body}}</p>
                    </li>

            @endforeach
        </ul>
<!---
<div class="row">
    <div class="gallery">
        <ul>
            @//foreach($projects as $project)
                <div class="col-md-4">
                    <li class="projectslist">
                        <a class="projecttitle" href="/projects/{{ $project->id }}">{{ $project->title  }}</a><br>
                        <a class="btn btn-default glyphicon glyphicon-hand-up"></a><a class="btn btn-default glyphicon glyphicon-star"></a>
                        <img src="{{ $project->img  }}" alt=""><br>
                        tag: <span>{{ $project->tags  }}</span>
                    </li>
                </div>
            @//endforeach
        </ul>
    </div>
</div>
--->
@stop
