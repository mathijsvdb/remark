@extends("layouts.master")

@section("content")

    @foreach($spotlight as $work)
        <div class="col-md-4">
            <a href="/projects/{!! $work->id !!}">
                <img style="width: 300px; height: 300px;list-style: none" src="/uploads/{!! $work->img !!}" alt="">
            </a>
            <a href="/profile/{!! $work->user_id !!}">
                <p style="text-transform: uppercase">{!! $work->username !!}</p>
            </a>
        </div>
    @endforeach

@stop

@section("scripts")
@stop