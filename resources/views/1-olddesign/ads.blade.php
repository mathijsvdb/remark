@extends("layouts.master")

@section("content")

    <div class="adver_container">



        <div class="content_adver col-md-10 content-box center-block">
            <h2>Your advertisements <a class="" href="/advertising/add">Add more +</a></h2>


            @if (count($myAds) > 0)
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
            </ul>
            @endforeach
            @else
                <p>There are no advertisments linked to your account</p>
            @endif
        </div>

    </div>

@stop