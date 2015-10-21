@extends("layouts.master")

@section("content")


<h1>Projects</h1>

<a href="/projects/add">+ Add a project</a>

<div class="row">
    <div class="gallery">
<ul>
    @foreach($projects as $project)
        <div class="col-md-4">
            <li class="projectslist">
                <a class="projecttitle" href="/projects/{{ $project->id }}">{{ $project->title  }}</a><br>
                <a class="btn btn-default glyphicon glyphicon-hand-up"></a><a class="btn btn-default glyphicon glyphicon-star"></a>
                <img src="{{ $project->img  }}" alt=""><br>
                tag: <span>{{ $project->tags  }}</span>
            </li>
        </div>
    @endforeach
</ul>

        </div>
    </div>

@stop
