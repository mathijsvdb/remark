@extends("layouts.master")

@section("content")
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

    <form method="POST", action="{!! $project['id'] !!}">
        {!! csrf_field() !!}
                
        <textarea name="body"></textarea>
                
        <input type="hidden" name="project_id" value="{{ $project->id }}" class="form-control">
        </br>

        <button type="submit">Submit comment</button>

    </form>

    <div id="allwork">
        @foreach($comments as $comment)

            <div>
                <p>{!! $comment->body !!}</p>
            </div>
            
        @endforeach
    </div>

    

@stop