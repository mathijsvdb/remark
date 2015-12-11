@extends('newdesign.layouts.master')

@section("content")
    <div class="project-top">
        <div class="container-fluid">
            <h1>Projects</h1>
            <a class="btn btn-primary" href="/projects/add"><span class="glyphicon glyphicon-plus"></span> Add a project</a>
        </div>
    </div>


    <div class="container-fluid">
        @if(1 == rand(0, 1))
            <ul class="list-unstyled" id="projects">
                @for($i= 0; $i < 20; $i++)
                    <li class="project">
                        <a href="" class="thumbnail">
                            <img src="http://placehold.it/250x250" alt="...">
                            <span>title</span>
                            <span class="pull-right">125 <span class="glyphicon glyphicon-heart"></span></span>
                        </a>
                    </li>
                @endfor
            </ul>
        @else
            <div class="text-center">
                <p>There are no projects yet, be the first to upload one!</p>
                <a class="btn btn-primary" href="/projects/add"><span class="glyphicon glyphicon-plus"></span> Add a project</a>
            </div>
        @endif
    </div>
@stop