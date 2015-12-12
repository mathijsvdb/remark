@extends('newdesign.layouts.master')

@section('content')
    <div class="welcome text-center">
        <div class="container">
            <div class="jumbotron">
            @if(!Auth::check())
                <header>
                    <h1>Do you want to make the most of your design?</h1>
                    <p>At remark <b> students </b> like you post a design, then other students, start giving other students feedback on the design so that the students can learn from each other!</p>
                    <a href="{{ url('/register') }}" class="btn btn-primary">Start here, It's FREE!</a>
                </header>
            @else
                <header>
                    <h1>Get remarks and learn</h1>
                    <a class="btn btn-primary" href="/projects/add"><span class="glyphicon glyphicon-plus"></span> Add a project</a>
                </header>
            @endif
            </div>
        </div>
    </div>

    <div class="container-fluid">
        @if(count($spotlight) > 0)
            <ul class="list-unstyled" id="spotlight">
                @foreach($spotlight as $project)
                    <li class="project">
                        <a href="/projects/{{ $project->id }}" class="thumbnail project-thumbnail">
                            <img src="/uploads/{{ $project->img }}" alt="">

                            <div class="project-details">
                                <p class="title">{{ $project->title }}</p>
                                <p class="description">{{ $project->body }}</p>
                            </div>
                        </a>
                        <a href="#" class="username pull-left">{{ $project->user->username }}</a>
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