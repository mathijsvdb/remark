@extends("layouts.master")

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

            @if(Auth::id() == $user->id)
            <a id="edit-profile" class="btn btn-default btn-xs" href="/update"><i class="fa fa-pencil"></i> Edit my profile</a>
            @endif
        </div>
    </div>

    <!-- navigatie voor eigen projecten/favorites/... -->
    <ul class="list-unstyled" id="nav-2">
        <li id="user-projects" class="active">Projects</li>
        <li id="user-favorites">Favorites</li>
        <li id="user-rewards">Rewards</li>
    </ul>

    <div class="user-projects-section">
        @include('2-newdesign.profile.userprojects')
    </div>

    <div class="user-favorites-section hidden">
        @include('2-newdesign.profile.userfavorites')
    </div>

    <div class="user-rewards-section hidden">
        @include('2-newdesign.profile.userrewards')
    </div>
@stop

@section('scripts')
    <script>
        $('#user-projects').on('click', function() {
            $('.user-projects-section').removeClass('hidden');
            $('.user-favorites-section').addClass('hidden');
            $('.user-rewards-section').addClass('hidden');
            $('#user-projects').addClass('active');
            $('#user-favorites').removeClass('active');
            $('#user-rewards').removeClass('active');
        });

        $('#user-favorites').on('click', function() {
            $('.user-projects-section').addClass('hidden');
            $('.user-favorites-section').removeClass('hidden');
            $('.user-rewards-section').addClass('hidden');
            $('#user-projects').removeClass('active');
            $('#user-favorites').addClass('active');
            $('#user-rewards').removeClass('active');
        });

        $('#user-rewards').on('click', function() {
            $('.user-projects-section').addClass('hidden');
            $('.user-favorites-section').addClass('hidden');
            $('.user-rewards-section').removeClass('hidden');
            $('#user-projects').removeClass('active');
            $('#user-favorites').removeClass('active');
            $('#user-rewards').addClass('active');
        });
    </script>
@stop