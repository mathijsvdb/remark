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
                            <a class="btn btn-primary" href="/projects/add"><span class="glyphicon glyphicon-plus"></span> Add a project</a>
                        </div>
                    </div>
                </header>
            @endif
            </div>
        </div>
    </div>

    <div class="container-fluid">
        @if(1 == rand(0, 1))
            <ul class="list-unstyled" id="spotlight">
                @for($i= 0; $i < 20; $i++)
                    <li class="project">
                        <a href="" class="thumbnail project-thumbnail">
                            <img src="http://lorempixel.com/250/250/abstract" alt="...">

                            <div class="project-details">
                                <p class="title">Dit is een titel van een project en het is een mooi projects</p>
                                <p class="description">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolore et excepturi magnam molestias unde. At beatae consectetur deleniti fuga, harum hic iste itaque laboriosam Lorem ipsum dolor sit amet, consectetur adipisicing elit. Facilis, repellendus, soluta. Aperiam, beatae consequuntur culpa cum cupiditate dolores excepturi fuga hic id itaque iure, modi officia Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci architecto commodi deserunt eligendi, eos iure labore maiores, nam neque nisi praesentium tempora. Ad cum facere laudantium maxime minus nisi nulla.optio repellendus sunt voluptatibus!maiores nisi quidem quisquam tempore unde?</p>
                            </div>
                        </a>
                        <a href="#" class="username pull-left">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium animi asperiores assumenda atque cumque explicabo hic ratione rerum, sunt tempore. Blanditiis consectetur cum distinctio error iste molestias, quod voluptate. Saepe.</a>
                        <span class="pull-right">125 <span class="glyphicon glyphicon-heart"></span></span>
                        <span class="pull-right">35 <span class="glyphicon glyphicon-star"></span>&nbsp;</span>
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