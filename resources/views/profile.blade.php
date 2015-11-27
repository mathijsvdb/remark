@extends("layouts.master")

@section("content")
    <div class="container">
        <div class="row">

            <div class="col-md-3">
                <ul id="recentbadges">
                    @for($i = 0; $i < count($badges); $i++)
                        <img style="width: 45px; height: 45px; padding: 5px;" src="/assets/images/badges/{{ $badges[$i]->badge_img }}" alt="">
                    @endfor
                    <br>
                    <a id="rewards" href="/update">View this users' badges</a>
                </ul>
            </div>

            <div id="basicinfo" class="col-md-6">
                @if($user->image == 'default.jpg')
                    <img class="img-circle" id="profilepicture" src="/assets/images/{!! $user->image !!}" alt="">
                @else
                    <img class="img-circle" id="profilepicture" src="/uploads/profilepictures/{!! $user->image !!}" alt="">
                @endif

                <a href="/profile/{!! $user->id !!}" id="user">{{ $user->firstname . " " . $user->lastname }}</a>
                <p>{{ $user->email }}</p>
                <div id="socialmediadiv">
                    <a href="{!! $user->facebook !!}" class="socialmedia" id="facebook">facebook</a>
                    <a href="{!! $user->twitter !!}" class="socialmedia" id="twitter">twitter</a>
                    <a href="{!! $user->website !!}" class="socialmedia" id="website">website</a>
                </div>

                @if(Auth::user())
                    @if($user->id == Auth::user()->id)
                        <a id="edit" href="/update">Edit my profile</a>
                    @endif
                @endif

            </div>

            <div id="profileRIGHT" class="col-md-3">
                <p>ADVERTISING AREA</p>
                <img src="http://placehold.it/200x150">
            </div>

        </div>
        <br />
        <hr />
        <div id="allwork">
            @foreach($projects as $work)
                <a href="/projects/{!! $work['id'] !!}">
                    <img class="projectimages" src="/uploads/{!! $work['img'] !!}" alt="">
                </a>
            @endforeach
        </div>
    </div>
@stop