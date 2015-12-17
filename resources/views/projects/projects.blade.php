@extends('layouts.master')

@section("content")
    <div class="project-top">
        <div class="container-fluid text-center">
            <h1>All Projects</h1>
            <a class="btn btn-primary" href="/projects/add"><span class="glyphicon glyphicon-plus"></span> Add a project</a>
        </div>
    </div>

    <ul class="list-unstyled" id="nav-2">
        <li id="recent" class="active">Recent</li>
        <li id="popular">Popular</li>
    </ul>

    <div class="container-fluid">
        @if(count($projects) > 0)
            <div class="text-center">
            {!! $projects->render() !!}
            </div>

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

            <div class="text-center">
                {!! $projects->render() !!}
            </div>
        @else
            <div class="text-center">
                <p>There are no projects yet, be the first to upload one!</p>
                <a class="btn btn-primary" href="/projects/add"><span class="glyphicon glyphicon-plus"></span> Add a project</a>
            </div>
        @endif
    </div>

    <script>
        $.ajaxSetup({
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}
        });
        $(document).ready(function(){
            $("#popular").on("click", function(e){

                var _token = $("#tokenPopular").val();
                var dataString = "&token="+_token;

                $.ajax({
                    type: "POST",
                    url: "ajax/projects/popular",
                    data: dataString,
                    success: function(data){

                        $('#projects').html('');

                        $(data).each(function(i) {
                            $('#projects').append(
                                    '<li class="project">' +
                                    '<a href="/projects/' + this.id + '" class="thumbnail project-thumbnail">' +
                                    '<img src="/uploads/' + this.img + '" alt="">' +
                                    '<div class="project-details">' +
                                    '<p class="title">' + this.title + '</p>' +
                                    '<p class="description">' + this.body + '</p>' +
                                    '</div>' +
                                    '</a>' +
                                    '<a href="/profile/' + this.username + '" class="username pull-left">' + this.username  + '</a>' +
                                    '<span class="pull-right">' + this.likes + ' <span class="glyphicon glyphicon-heart"></span></span>' +
                                    '<span class="pull-right">' + this.favorites + ' <span class="glyphicon glyphicon-star"></span>&nbsp;</span>' +
                                    '</li>'
                            );
                        });

                    },
                    error: function(xhr, status, error) {
                        //var err = eval(xhr.responseText);
                        console.log(error,status, xhr.responseText);
                    }
                });

                $(this).addClass('active');
                $('#recent').removeClass('active');

                e.preventDefault();
            });
            $("#recent").on("click", function(e){

                var _token = $("#tokenPopular").val();
                var dataString = "&token="+_token;

                $.ajax({
                    type: "POST",
                    url: "ajax/projects/recent",
                    data: dataString,
                    success: function(data){

                        $('#projects').html('');

                        $(data).each(function(i) {
                            $('#projects').append(
                                    '<li class="project">' +
                                    '<a href="/projects/' + this.id + '" class="thumbnail project-thumbnail">' +
                                    '<img src="/uploads/' + this.img + '" alt="">' +
                                    '<div class="project-details">' +
                                    '<p class="title">' + this.title + '</p>' +
                                    '<p class="description">' + this.body + '</p>' +
                                    '</div>' +
                                    '</a>' +
                                    '<a href="/profile/' + this.username + '" class="username pull-left">' + this.username  + '</a>' +
                                    '<span class="pull-right">' + this.likes + ' <span class="glyphicon glyphicon-heart"></span></span>' +
                                    '<span class="pull-right">' + this.favorites + ' <span class="glyphicon glyphicon-star"></span>&nbsp;</span>' +
                                    '</li>'
                            );
                        });

                    },
                    error: function(xhr, status, error) {
                        //var err = eval(xhr.responseText);
                        console.log(error,status, xhr.responseText);
                    }
                });

                $(this).addClass('active');
                $('#popular').removeClass('active');

                e.preventDefault();
            });

        });
    </script>
@stop