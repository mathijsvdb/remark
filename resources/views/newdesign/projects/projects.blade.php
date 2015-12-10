@extends('newdesign.layouts.master')

@section("content")
    <div class="project-top">
        <div class="container-fluid">
            <h1>Projects</h1>
            <a class="btn btn-primary" href="/projects/add"><span class="glyphicon glyphicon-plus"></span> Add a project</a>
        </div>
    </div>


    <div class="container-fluid">
        <ul class="list-unstyled" id="projects">
            @for($i= 0; $i < 20; $i++)
                <li class="project">
                    <a href="" class="thumbnail">
                        <img src="http://placehold.it/200x200" alt="...">
                        <span>title</span>
                        <span class="pull-right">125 <span class="glyphicon glyphicon-heart"></span></span>
                    </a>
                </li>
            @endfor
        </ul>
    </div>
@stop