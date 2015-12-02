@extends("layouts.master")

@section("content")

    <div class="adver_container">
        <h2>Your advertising's</h2> <a class="" href="/advertising/add">Add +</a>

        <ul class="row">
            @foreach($myAds as $ad)
                <div class="col-md-4 ad" id="{{$ad->id}}">
                    <li>
                        <h3>{{$ad->title}} </h3>
                        <p>Click Counter: {{$ad->clicks}}</p>
                        <p>{{$ad->description}} </p>
                        <img src="{{asset($ad->img)}}" alt="advertising">
                    </li>
                </div>
            @endforeach
        </ul>
    </div>

@stop