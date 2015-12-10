@extends('newdesign.layouts.master')

@section('content')
    <div class="welcome text-center">
        <div class="container">
            <div class="jumbotron">
            @if(!Auth::check())
                <header>
                    <div class="header-content">
                        <div class="header-content-inner">
                            <h1>Do you want to make the most of your design?</h1>
                            <p>At remark <b> students </b> like you post a design, then other students, start giving other students feedback on the design so that the students can learn from each other!</p>
                            <a href="{{ url('/register') }}" class="btn btn-primary">Start here, It's FREE!</a>
                        </div>
                    </div>
                </header>
            @else
                <header>
                    <div class="header-content">
                        <div class="header-content-inner">
                            <h1>Get remarks and learn</h1>
                            <a href="{{ url('/projects/add') }}" class="btn btn-primary">Add a project!</a>
                        </div>
                    </div>
                </header>
            @endif
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <ul class="list-unstyled" id="spotlight">
            @for($i= 0; $i < 20; $i++)
                <li class="spotlight-item">
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