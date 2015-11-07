@extends("layouts.master")

@section("content")
    <div class="detail_container">
        <div class="project-info">
            <div class="project-info-text">
                @if($user->image == 'default.jpg')
                    <img class="img-circle" src="/assets/images/{!! $user->image !!}" alt="">
                @else
                    <img class="img-circle" src="/uploads/profilepictures/{!! $user->image !!}" alt="">
                @endif
                <h2>{!! $project['title'] !!} <span>by <a href="/profile/{!! $user['id'] !!}"><strong>{!! $user['firstname'] . " " . $user['lastname'] !!}</strong></a>{!! " " . $project['created_at'] !!}</span></h2>

                <img src="/uploads/{!! $project['img'] !!}" alt="">

                <p>{!! $project['body'] !!}</p>
            </div>

            <ul>



                <li class="border-bottom-info">
                    <a href="/"><span class="glyphicon glyphicon-eye-open"></span>Views</a>
                </li>
                <li class="border-bottom-info">
                    <a href="/"><span class="glyphicon glyphicon-thumbs-up"></span>Likes</a>
                </li>
                <li class="border-bottom-info">
                    <a href="/"><span class="glyphicon glyphicon-heart-empty"></span>Favorite</a>
                </li>

                <li class="border-bottom-info">
                    <div class="pallets">
                        <span class="glyphicon glyphicon-tint"></span>

                        @for($i=0; $i<count($palette); $i++)
                            <a class="pallet-styling" href="{!! $palette[$i] !!}" style="background-color: {!! $palette[$i] !!};">{!! $palette[$i] !!}</a>
                        @endfor
                    </div>
                    <div class="clearfix"></div>
                </li>
                <li class="tag-border">
                    <a href="/">{!! $project['tags'] !!}</a>
                </li>

            </ul>
        </div>
<div class="clearfix"></div>

    <form method="POST" class="form" action="{!! $project['id'] !!}">
        {!! csrf_field() !!}
        <h3>Commets</h3>
        <textarea class="form-control" rows="3" name="body"></textarea>
                
        <input type="hidden" name="project_id" value="{{ $project->id }}" class="form-control">
        </br>

        <button class="btn btn-default" type="submit">Submit comment</button>

    </form>
    </div>


@stop