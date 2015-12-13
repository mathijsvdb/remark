@extends('layouts.master')

@section("content")

    @if(empty($myFavorites))
        <h1>User has no favorites</h1>
    @else
        <h1>Favorites</h1>
    @endif

    <div class="projects-container">
        <ul class="row ">

            @foreach($myFavorites as $myFavorites)

                <li class="col-xs-3 project content-box">
                    <div class="projects-title">
                        <a href="/projects/{{ $myFavorites->id }}">{{ $myFavorites->title }}</a>
                    </div>

                    <img src="/uploads/{!! $myFavorites->img !!}" alt="">
                    <p>{{$myFavorites->body}}</p>
                </li>

            @endforeach
        </ul>
    </div>
@stop