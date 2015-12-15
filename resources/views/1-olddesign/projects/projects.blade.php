@extends('layouts.master')



@section("content")



    <div class="projects-container">

        <h1>Projects<a href="/projects/add" class="btn btn-primary plus-project"><span>+</span> Add a project</a></h1>
        <hr class="hr_left">
        <ul class="row">

            @if(isset($popular))
                @foreach($popular as $popwork)
                    <div class="col-md-4">
                        <a href="/projects/{{ $popwork->id }}">{{ $popwork->title }} <span class="glyphicon glyphicon-heart"> {{ $popwork->likes }}</span>
                            <img style="width: 300px; height: 300px;list-style: none" src="/uploads/{!! $popwork->img !!}" alt="">
                            <p>{{$popwork->body}}</p>
                        </a>
                    </div>
                @endforeach
                {{print_r($popular)}}
            @else
                @foreach($projects as $project)
                        <li class="col-xs-3 project content-box">
                            <div class="projects-title">
                                <a href="/projects/{{ $project->id }}">
                                    <span>{{ $project->title }}</span>

                                    <p>{{$project->body}}</p>
                                </a>
                                <img src="/uploads/{!! $project->img !!}" alt="">

                            </div>
                        </li>
                @endforeach
            @endif
        </ul>
    </div>
    <script>
        $.ajaxSetup({
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}
        });
        $(document).ready(function(){
            $("#popular").submit(function(e){
                e.preventDefault();
                var _token = $("#tokenPopular").val();
                var dataString = "&token="+_token;

                $.ajax({
                    type: "POST",
                    url: "projects/popular",
                    data: dataString,
                    success: function(data){
                        $("body").html(data);
                        //console.log(data);
                    },
                    error: function(xhr, status, error) {
                        //var err = eval(xhr.responseText);
                        console.log(error,status, xhr.responseText);
                    }
                });
            });

        });
    </script>
@stop
