@extends("layouts.master")

@section("content")
    <h2>{!! $project['title'] !!}</h2>
    <p>by <a href="/user/{!! $user['username'] !!}"><strong>{!! $user['firstname'] . " " . $user['lastname'] !!}</strong></a></p>
    <img style="width: 150px; height: 120px;" src="/uploads/{!! $project['img'] !!}" alt="">

    <div>
        <span class="glyphicon glyphicon-tint"></span>

        @for($i=0; $i<count($palette); $i++)
            <a style="display: block;background-color: {!! $palette[$i] !!}; width: 30px; height: 10px;"></a>
        @endfor
    </div>

    <p>{!! $project['body'] !!}</p>
    <a href="/">{!! $project['tags'] !!}</a>
@stop