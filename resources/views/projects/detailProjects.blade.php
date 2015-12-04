@extends("layouts.master")

@section("content")
    @if(Session::has('error'))
        <div class="alert alert-danger alert-dismissible fade in">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <p>{{ Session::get('error') }}</p>
        </div>
    @endif
    <div class="detail_container">
        <div class="project-info">
            <div class="project-info-text">
                @if($user->image == 'default.jpg')
                    <img class="img-circle project_user_img" src="/assets/images/{!! $user->image !!}" alt="">
                @else
                    <img class="img-circle project_user_img" src="/uploads/profilepictures/{!! $user->image !!}" alt="">
                @endif
                <h2>
                    {!! $project['title'] !!} <span>by <a href="/profile/{!! $user['username'] !!}"><strong>{!! $user['firstname'] . " " . $user['lastname'] !!}</strong></a>{!! " " . $project['created_at'] !!}</span>
                    <form action="/" method="post" class="flag_project_user">
                        {!! csrf_field() !!}
                        <button class="flag_project" title="flag project" type=submit class="btn btn-xs" id="flag_project"><span style="color:darkred;" class="glyphicon glyphicon-flag"></span></button>
                    </form>

                </h2>
                <img id="project-img" src="/uploads/{!! $project['img'] !!}" alt="">

                <p>{!! $project['body'] !!}</p>
            </div>

            <ul>
                <li class="border-bottom-info">
                    <a href="/"><span class="glyphicon glyphicon-eye-open"></span>Views</a>
                </li>
                <li class="border-bottom-info" id="test">
                    @if(!$user_liked)
                        <span class="glyphicon glyphicon-heart" id="like-icon"></span><span id="n-likes">{{ $likes }}</span> Likes

                        @if(Auth::check())
                        <form action="/projects/{{ $project->id }}/like" method="post" id="like-form">
                            {!! csrf_field() !!}
                            <button type=submit class="btn btn-xs" id="like-btn">Like</button>
                        </form>
                        @endif
                    @else
                        <span class="glyphicon glyphicon-heart" style="color: crimson;" id="like-icon"></span><span id="n-likes">{{ $likes }}</span> Likes

                        <form action="/projects/{{ $project->id }}/unlike" method="post" id="like-form">
                            {!! csrf_field() !!}
                            <button type=submit class="btn btn-xs" id="unlike-btn">Unlike</button>
                        </form>
                    @endif
                </li>
                <li class="border-bottom-info">
                    @if(!$user_favorited)
                        <span class="glyphicon glyphicon-star" id="favorite-icon"></span><span id="n-favorites">{{ $favorites }}</span> Favorites

                        @if(Auth::check())
                        <form action="/projects/{{ $project->id }}/favorite" method="post" id="favorite-form">
                            {!! csrf_field() !!}
                            <button type=submit class="btn btn-xs" id="favorite-btn">Favorite</button>
                        </form>
                        @endif
                    @else
                        <span class="glyphicon glyphicon-star" style="color: gold;" id="favorite_icon"></span><span id="n-favorites">{{ $favorites }}</span> Favorites

                        <form action="/projects/{{ $project->id }}/unfavorite" method="post" id="favorite_form">
                            {!! csrf_field() !!}
                            <button type=submit class="btn btn-xs" id="unfavorite-btn">Unfavorite</button>
                        </form>
                    @endif
                </li>

                <li class="border-bottom-info">
                    <div class="pallets">
                        <span class="glyphicon glyphicon-tint"></span>

                        @for($i=0; $i<count($colorpieces); $i++)
                            <a class="pallet-styling" href="/projects/search/{!! $colorpieces[$i] !!}" style="background-color: #{!! $colorpieces[$i] !!};"></a>
                        @endfor
                    </div>
                    <div class="clearfix"></div>
                </li>
                <li class="tag-border">
                    <a href="/">{!! $project['tags'] !!}</a>
                </li>
                <li>
                <li class="tag-border">
                    <div class="fb-share-button sharebtndetail" id="detailed-fb-share" data-href="http://remark.weareimd.be" data-layout="button_count"></div>
                    <a href="https://twitter.com/share" class=" sharebtndetail twitter-share-button"{count} data-hashtags="remark"></a>
                    <div class="g-plus sharebtndetail" data-action="share" data-annotation="none" data-href=""></div>
                </li>

            </ul>
        </div>
<div class="clearfix"></div>
    <div class="add_comment_container">
    <form method="POST" class="form" action="{!! $project['id'] !!}">
        {!! csrf_field() !!}
        <h3>Comments</h3>
        <textarea class="form-control" rows="3" name="body"></textarea>
                
        <input type="hidden" name="project_id" value="{{ $project->id }}" class="form-control">
        </br>

        <button class="btn btn-default" type="submit">Submit comment</button>

    </form>
    </div>

        <div class="clearfix">
            @foreach($comments as $comment)

                <div class="content_comment content-box row">
                    <div class="col-lg-1">
                        @if($comment->image == 'default.jpg')
                            <img  src="/assets/images/{!! $comment->image !!}" class="user_image" alt="">
                        @else
                            <img src="/uploads/profilepictures/{{ $comment->image }}" class="user_image" alt="">
                        @endif

                    </div>

                    <div class="user_info_comment col-md-11">
                        <form action="#" method="post" class="flag_comment">
                            {!! csrf_field() !!}
                            <button disabled class="flag_user" title="flag user" type=submit class="btn btn-xs" id="flag_comment_user"><span style="color:darkred;" class="glyphicon glyphicon-flag"></span></button>
                        </form>

                        <h4 class="user_name_info">{{ $comment->firstname . ' ' . $comment->lastname }}</h4>
                        <p>{!! $comment->body !!}</p>
                    </div>
                    <div class="clearfix"></div>
                </div>

            @endforeach
        </div>
    </div>



    <div id="fb-root"></div>
@stop

@section('scripts')
    <script>
        $(function() {
            $('#like-form').on('click', '#like-btn', function(e) {
                $.ajax({
                    method: "POST",
                    url: "/ajax/projects/{{ $project->id }}/like",
                    dataType: 'json'
                })
                .done(function($data) {
                    console.log($data.feedback);
                    $('#like-icon').css('color', 'crimson');
                    $('#n-likes').text($data.likes);
                    $('#like-form').attr('action', '/projects/ $project->id /unlike')
                    $('#like-btn').attr('id', 'unlike-btn').text('Unlike');
                })

                e.preventDefault();
            });

            $('#like-form').on('click', '#unlike-btn', function(e) {
                $.ajax({
                    method: "POST",
                    url: "/ajax/projects/{{ $project->id }}/unlike",
                    dataType: 'json'
                })
                .done(function($data) {
                    console.log($data.feedback);
                    $('#like-icon').css('color', '');
                    $('#n-likes').text($data.likes);
                    $('#like-form').attr('action', '/projects/$project->id/like')
                    $('#unlike-btn').attr('id', 'like-btn').text('Like');
                })

                e.preventDefault();
            });

            $('#favorite-form').on('click', '#favorite-btn', function(e) {
                $.ajax({
                    method: "POST",
                    url: "/ajax/projects/{{ $project->id }}/favorite",
                    dataType: 'json'
                })
                .done(function($data) {
                    console.log($data.feedback);
                    console.log($data.favorites);
                    $('#favorite-icon').css('color', 'gold');
                    $('#n-favorites').text($data.favorites);
                    $('#favorite-form').attr('action', '/projects/ $project->id /unfavorite')
                    $('#favorite-btn').attr('id', 'unfavorite-btn').text('Unfavorite');
                })

                e.preventDefault();
            });

            $('#favorite-form').on('click', '#unfavorite-btn', function(e) {
                $.ajax({
                    method: "POST",
                    url: "/ajax/projects/{{ $project->id }}/unfavorite",
                    dataType: 'json'
                })
                .done(function($data) {
                    console.log($data.feedback);
                    console.log($data.favorites);
                    $('#favorite-icon').css('color', '');
                    $('#n-favorites').text($data.favorites);
                    $('#favorite-form').attr('action', '/projects/$project->id/favorite')
                    $('#unfavorite-btn').attr('id', 'favorite-btn').text('Favorite');
                })

                e.preventDefault();
            });
        });
    </script>

    <!-- Facebook Share Button -->
    <script>(function(d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) return;
            js = d.createElement(s); js.id = id;
            js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.5";
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));

        $('#detailed-fb-share').attr('data-href',window.location.href);
        $('.g-plus').attr('data-href',window.location.href);
    </script>

    <!-- Twitter Share Button -->
    <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>

    <!-- Google Share Button -->
    <script type="text/javascript">
        (function() {
            var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
            po.src = 'https://apis.google.com/js/platform.js';
            var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
        })();
    </script>
@stop