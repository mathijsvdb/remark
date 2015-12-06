@extends("layouts.master")

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


                            <div id="socialmediadiv">
                                <a href="{!! $user->facebook !!}" class="socialmedia" id="facebook">facebook</a>
                                <a href="{!! $user->twitter !!}" class="socialmedia" id="twitter">twitter</a>
                                <a href="{!! $user->website !!}" class="socialmedia" id="website">website</a>
                            </div>

                            @if(Auth::user())
                                @if($user->id == Auth::user()->id)
                                    <a class="btn btn-default" id="edit" href="/update">Edit my profile</a>
                                @endif
                            @endif

                            @if($user->id == Auth::user()->id)
                                <a class="btn btn-default" id="rewards" href="/profile/{!! $user->username !!}/rewards">
                                    @for($i = 0; $i < count($badges); $i++)
                                        <img style="width: 45px; height: 45px; padding: 5px;" src="/assets/images/badges/{{ $badges[$i]->badge_img }}" alt="">
                                    @endfor
                                    <span>View your badges</span></a>
                            @endif

                            <a  class="btn btn-default" href="/profile/{{ $user->username }}/favorites">Checkout {{ $user->firstname }}'s favorites</a>
                        </div>
                    </li>
                    <li class="col-lg-9">
                        <div class="profile_projecten_user">
                            <h2>Your projects</h2>
                        @foreach($projects as $work)
                            <a href="/projects/{!! $work['id'] !!}">
                                <img class="projectimages content-box" src="/uploads/{!! $work['img'] !!}" alt="">
                            </a>
                        @endforeach
                        </div>
                    </li>

                </ul>




@stop