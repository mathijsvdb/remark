@extends("layouts.master")

@section("content")
    <div class="container">

        <div id="basicinfo">
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