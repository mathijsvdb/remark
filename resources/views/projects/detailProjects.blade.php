@extends("layouts.master")

@section("content")
    @if(Session::has('error'))
        <div class="alert alert-danger alert-dismissible fade in">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <p>{{ Session::get('error') }}</p>
        </div>
    @endif
    <h2>{!! $project['title'] !!}</h2>
    <p>by <a href="/profile/{!! $user['id'] !!}"><strong>{!! $user['firstname'] . " " . $user['lastname'] !!}</strong></a>{!! " " . $project['created_at'] !!}</p>
    <img style="width: 150px; height: 120px;" src="/uploads/{!! $project['img'] !!}" alt="">
    <a href="/projects/{{ $project['id'] }}/like"><span class="glyphicon glyphicon-heart"></span> Like</a>
    <a href="/projects/{{ $project['id'] }}/favorite"><span class="glyphicon glyphicon-star"></span> Favorite</a>
    <div class="detail_container">
        <h2>{!! $project['title'] !!}</h2>
        <p>by <a href="/profile/{!! $user['id'] !!}"><strong>{!! $user['firstname'] . " " . $user['lastname'] !!}</strong></a>{!! " " . $project['created_at'] !!}</p>
        <img style="width: 150px; height: 120px;" src="/uploads/{!! $project['img'] !!}" alt="">

        <div>
            <span class="glyphicon glyphicon-tint"></span>

            @for($i=0; $i<count($palette); $i++)
                <a style="display: block;background-color: {!! $palette[$i] !!}; width: 30px; height: 10px;"></a>
            @endfor
        </div>

        <p>{!! $project['body'] !!}</p>
        <a href="/">{!! $project['tags'] !!}</a>
    </div>
@stop