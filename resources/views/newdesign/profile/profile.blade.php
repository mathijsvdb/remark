@extends("newdesign.layouts.master")

@section("content")
    <div class="profile-top text-center">
        <div class="container-fluid">
            @if($user->image == 'default.jpg')
                <img class="img-circle img-profile" src="/assets/images/{!! $user->image !!}" alt="">
            @else
                <img class="img-circle img-profile" src="/uploads/profilepictures/{!! $user->image !!}" alt="">
            @endif

            <p><strong>{{ $user->firstname . " " . $user->lastname }}</strong></p>
            @if($user->bio != '')
            <p>{{ $user->bio }}</p>
            @endif

            @if(!empty($user->facebook || $user->twitter || $user->website))
            <ul class="social list-inline">
                @if(!empty($user->facebook))
                <li>
                    <a href="{{ $user->facebook }}">
                        <span class="fa-stack fa-lg">
                            <i class="fa fa-circle fa-stack-2x"></i>
                            <i class="fa fa-facebook fa-stack-1x fa-inverse"></i>
                        </span>
                    </a>
                </li>
                @endif
                @if(!empty($user->twitter))
                <li>
                    <a href="{{ $user->twitter }}">
                        <span class="fa-stack fa-lg">
                            <i class="fa fa-circle fa-stack-2x"></i>
                            <i class="fa fa-twitter fa-stack-1x fa-inverse"></i>
                        </span>
                    </a>
                </li>
                @endif
                @if(!empty($user->website))
                <li>
                    <a href="{{ $user->website }}">
                        <span class="fa-stack fa-lg">
                            <i class="fa fa-circle fa-stack-2x"></i>
                            <i class="fa fa-globe fa-stack-1x fa-inverse"></i>
                        </span>
                    </a>
                </li>
                @endif
            </ul>
            @endif

            @if(Auth::check())
            <a id="edit-profile" class="btn btn-default btn-xs" href="/update"><i class="fa fa-pencil"></i> Edit my profile</a>
            @endif
        </div>
    </div>

    <!-- navigatie voor eigen projecten/favorites/... -->
    <ul class="list-inline" id="nav-2">
        <li><a href="/userprojects">Projects</a></li>
        <li><a href="/userfavorites">Favorites</a></li>
        <li><a href="/userrewards">Rewards</a></li>
    </ul>

    @include('newdesign.profile.myprojects')
@stop