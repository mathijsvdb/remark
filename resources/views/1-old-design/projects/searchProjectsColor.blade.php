@extends("1-old-design.layouts.master")

@section("content")
    <h1>Projects by this color</h1>
    <div id="allwork">
        @for($i=0; $i < count($projectsByColor); $i++)
            <a href="/projects/{!! $projectsByColor[$i]->id !!}">
                <img class="projectimages" src="/uploads/{!! $projectsByColor[$i]->img !!}" alt="">
            </a>
        @endfor
    </div>
@stop