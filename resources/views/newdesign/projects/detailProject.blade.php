@extends('newdesign.layouts.master')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12 project-top-section">
                @if($user->image == 'default.jpg')
                    <a href="/profile/{{ $user->username }}"><img class="img-circle project-user-img" src="/assets/images/{!! $user->image !!}" alt=""></a>
                @else
                    <a href="/profile/{{ $user->username }}"><img class="img-circle project-user-img" src="/uploads/profilepictures/{!! $user->image !!}" alt=""></a>
                @endif
                <div class="project-title-section">
                    <h1>{{ $project->title }}</h1>
                    <p>By <a href="/profile/{{ $user->username }}">{{ $user->firstname . " " . $user->lastname }}</a><small class="project-date">{{ $project->created_at->toFormattedDateString() }}</small></p>
                </div>
            </div>

            <div class="col-md-6 project-mid-left">
                <div class="thumbnail">
                    <img class="img-responsive project-img" src="/uploads/{{ $project->img }}" alt="">
                </div>

                <p>{{ $project->body }}</p>
            </div>

            <div class="col-md-6 project-mid-right">
                <div class="project-info-list">
                    @if(!Auth::check())
                        <i class="fa fa-heart fa-fw fa-lg" id="like-icon"></i><span id="n-likes">{{ $likes }}</span>
                    @else
                        @if(!$user_liked)
                            <form action="/projects/{{ $project->id }}/like" method="post" id="like-form">
                                {!! csrf_field() !!}
                                <button type=submit id="like-btn"><i class="fa fa-heart fa-fw fa-lg" id="like-icon"></i></span></button><span id="n-likes">{{ $likes }}</span>
                            </form>
                        @else
                            <form action="/projects/{{ $project->id }}/unlike" method="post" id="like-form">
                                {!! csrf_field() !!}
                                <button type=submit id="unlike-btn"><i class="fa fa-heart fa-fw fa-lg" style="color: crimson;" id="like-icon"></i></span></button><span id="n-likes">{{ $likes }}</span>
                            </form>
                        @endif
                    @endif
                </div>

                <div class="project-info-list">
                    @if(!Auth::check())
                        <i class="fa fa-star fa-fw fa-lg" id="favorite-icon"></i></span><span id="n-favorites">{{ $favorites }}</span>
                    @else
                        @if(!$user_favorited)
                            <form action="/projects/{{ $project->id }}/favorite" method="post" id="favorite-form">
                                {!! csrf_field() !!}
                                <button type=submit id="favorite-btn"><i class="fa fa-star fa-fw fa-lg" id="favorite-icon"></i></button><span id="n-favorites">{{ $favorites }}</span>
                            </form>
                        @else
                            <form action="/projects/{{ $project->id }}/unfavorite" method="post" id="favorite_form">
                                {!! csrf_field() !!}
                                <button type=submit id="unfavorite-btn"><i class="fa fa-star fa-fw fa-lg" id="favorite-icon" style="color: gold;"></i></button><span id="n-favorites">{{ $favorites }}</span>
                            </form>
                        @endif
                    @endif
                </div>

                <div class="project-info-list">
                    <i class="fa fa-tint fa-fw fa-lg"></i>
                    <div class="project-colors">
                        @for($i=0; $i<count($colorpieces); $i++)
                            <a href="/projects/search/{!! $colorpieces[$i] !!}" style="background-color: {!! '#' . $colorpieces[$i] !!};"></a>
                        @endfor
                    </div>
                </div>

                <div class="project-info-list">
                    <i class="fa fa-tags fa-fw fa-lg"></i>
                    <div class="project-tags">
                        <a href="/">{!! $project->tags !!}</a>
                    </div>
                </div>

                <div class="project-info-list project-sharing">
                    <div class="fb-share-button sharebtndetail" id="detailed-fb-share" data-href="http://remark.weareimd.be" data-layout="button_count"></div>
                    <a href="https://twitter.com/share" class=" sharebtndetail twitter-share-button"{count} data-hashtags="remark"></a>
                    <div class="g-plus sharebtndetail" data-action="share" data-annotation="none" data-href=""></div>
                </div>

                @if(Auth::check())
                    <div class="project-info-list project-user-actions">
                        @if(Auth::id() == $user->id)
                            <a href="/projects/{{ $project->id }}/edit" title="Edit this project" class="btn btn-default btn-xs btn-edit"><i class="fa fa-pencil fa-lg"></i> Edit</a>
                            <form action="/projects/{{ $project->id }}/delete" method="post" onclick="return confirm('Are you sure you want to delete this project?');">
                                {!! csrf_field() !!}
                                <button type="submit" title="Delete project" class="btn btn-danger btn-xs btn-delete"><i class="fa fa-trash fa-lg"></i> Delete</button>
                            </form>
                        @endif

                        <form action="/spam/{{ $project->id }}" method="post" onclick="return confirm('Are you sure you want to flag this project as spam?');">
                            {!! csrf_field() !!}
                            <button type="submit" title="Delete project as spam" class="btn btn-warning btn-xs btn-delete"><i class="fa fa-flag fa-lg"></i> Spam</button>
                        </form>
                    </div>
                @endif
            </div>

            <div class="col-md-12 project-comments-section">
                <h3>Comments</h3>
                @if(Auth::check())
                    <form method="POST" class="form" action="">
                        {!! csrf_field() !!}
                        <textarea name="body" class="form-control" rows="3"></textarea>
                        <input type="hidden" name="project_id" value="{{ $project->id }}">
                        <button class="btn btn-primary btn-comment pull-right" type="submit">Submit comment&nbsp;<i class="fa fa-paper-plane fa-inverse"></i></button>
                    </form>
                @else
                    <a href="/login" class="btn btn-primary btn-comment">Log in to comment</a>
                @endif

                @if(count($comments) > 0)
                    <ul class="list-unstyled project-comments">
                        @foreach($comments as $comment)
                            <li>
                                <blockquote class="project-comment">
                                    @if($comment->image == 'default.jpg')
                                        <a href="/profile/{{ $comment->username }}"><img  src="/assets/images/{!! $comment->image !!}" class="project-comment-user-img img-circle" alt=""></a>
                                    @else
                                        <a href="/profile/{{ $comment->username }}"><img src="/uploads/profilepictures/{{ $comment->image }}" class="project-comment-user-img img-circle" alt=""></a>
                                    @endif

                                    <div class="project-comment-body">
                                        <h4><a href="/profile/{{ $comment->username }}">{{ $comment->firstname . ' ' . $comment->lastname }}</a></h4>
                                        <p>{!! nl2br(e($comment->body)) !!}</p>
                                    </div>

                                    <form action="#" method="post" class="flag_comment">
                                        {!! csrf_field() !!}
                                        <button title="Flag this comment as spam" type=submit class="btn btn-warning btn-xs" id="flag_comment_user"><i class="fa fa-flag fa-fw fa-lg"></i></button>
                                    </form>
                                </blockquote>
                            </li>
                        @endforeach
                    </ul>
                @else
                    <p class="project-no-comments">There are no comments on this project yet.</p>
                @endif
            </div>
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
                            $('#like-form').attr('action', '/projects/{{$project->id}}/unlike');
                            $('#like-btn').attr('id', 'unlike-btn');
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
                            $('#like-form').attr('action', '/projects/{{$project->id}}/like');
                            $('#unlike-btn').attr('id', 'like-btn');
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
                            $('#favorite-form').attr('action', '/projects/{{$project->id}}/unfavorite');
                            $('#favorite-btn').attr('id', 'unfavorite-btn');
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
                            $('#favorite-form').attr('action', '/projects/{{$project->id}}/favorite');
                            $('#unfavorite-btn').attr('id', 'favorite-btn');
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