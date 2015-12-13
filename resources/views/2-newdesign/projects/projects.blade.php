@extends('2-newdesign.layouts.master')

@section("content")
    <div class="project-top">
        <div class="container-fluid">
            <h1>Projects</h1>
            <a class="btn btn-primary" href="/projects/add"><span class="glyphicon glyphicon-plus"></span> Add a project</a>
        </div>
    </div>

    <div class="container-fluid">
        @if(count($projects) > 0)
            <ul class="list-unstyled" id="projects">
                @foreach($projects as $project)
                    <li class="project">
                        <a href="/projects/{{ $project->id }}" class="thumbnail project-thumbnail">
                            <img src="/uploads/{{ $project->img }}" alt="">

                            <div class="project-details">
                                <p class="title">{{ $project->title }}</p>
                                <p class="description">{{ $project->body }}</p>
                            </div>
                        </a>
                        <a href="/profile/{{ $project->user->username }}" class="username pull-left">{{ $project->user->username }}</a>
                        <span class="pull-right">{{ $project->likes->count() }} <span class="glyphicon glyphicon-heart"></span></span>
                        <span class="pull-right">{{ $project->favorites->count() }} <span class="glyphicon glyphicon-star"></span>&nbsp;</span>
                    </li>
                @endforeach
            </ul>
        @else
            <div class="text-center">
                <p>There are no projects yet, be the first to upload one!</p>
                <a class="btn btn-primary" href="/projects/add"><span class="glyphicon glyphicon-plus"></span> Add a project</a>
            </div>
        @endif
    </div>
@stop