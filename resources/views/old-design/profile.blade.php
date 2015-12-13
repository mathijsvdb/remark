@extends("old-design.layouts.master")

@section("content")

                <ul class="row myprofile_container">
                    <li class="col-md-3 list-item-height">
                        <div class="basicinfo content-box">

                            @if($user->image == 'default.jpg')
                                <img class="img-circle" id="profilepicture" src="/assets/images/{!! $user->image !!}" alt="">
                            @else
                                <img class="img-circle" id="profilepicture" src="/uploads/profilepictures/{!! $user->image !!}" alt="">
                            @endif


                            <a class="btn btn-default" href="/profile/{!! $user->username !!}" id="user">{{ $user->firstname . " " . $user->lastname }}</a>
                            <p>{{ $user->email }}</p>
                            <p>{{ $user->bio }}</p>


                            <div id="socialmediadiv">
                                @if(!empty($user->facebook))
                                    <a href="{!! $user->facebook !!}" class="socialmedia" id="facebook">facebook</a>
                                @endif
                                @if(!empty($user->twitter))
                                    <a href="{!! $user->twitter !!}" class="socialmedia" id="twitter">twitter</a>
                                @endif
                                @if(!empty($user->website))
                                    <a href="{!! $user->website !!}" class="socialmedia" id="website">website</a>
                                @endif
                            </div>

                            @if(Auth::user())
                                @if($user->id == Auth::user()->id)
                                    <a class="btn btn-default" id="edit" href="/update">Edit my profile</a>
                                @endif
                            @endif

                                @for($i = 0; $i < count($badges); $i++)
                                    <img style="width: 45px; height: 45px; padding: 5px;" src="/assets/images/badges/{{ $badges[$i]->badge_img }}" alt="">
                                @endfor
                            @if(Auth::user())
                                @if($user->id == Auth::user()->id)
                                    <a class="btn btn-default" id="rewards" href="/profile/{!! $user->username !!}/rewards">
                                        <span>View your badges</span></a>
                                @endif
                            @endif

                            <a style="display: block; width: 100%; clear: both; padding: 6px; text-decoration: none;" href="/profile/{{ $user->username }}/favorites">Checkout {{ $user->firstname }}'s favorites</a>
                        </div>
                    </li>
                    <li class="col-lg-9">
                        <div class="profile_projecten_user">
                            <h2>Your projects</h2>
                            @if(count($projects) == 0)
                                @if(Auth::user())
                                    @if($user->id == Auth::user()->id)
                                        <p>At the moment you don't have any projects. Want to upload some? <a class="btn btn-default" style="color:black" href="/projects/add">click this link!</a></p>
                                    @else
                                        <p>At the moment this person doesn't have any projects</p>
                                    @endif
                                @else
                                    <p>At the moment this person doesn't have any projects</p>
                                @endif
                            @else
                                @foreach($projects as $work)
                                    <a href="">
                                        <img class="projectimages content-box" src="/uploads/{!! $work['img'] !!}" alt="">
                                    </a>
                                @endforeach
                            @endif
                        </div>
                    </li>

                </ul>


        </div>
    </div>
@stop