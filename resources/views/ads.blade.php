@extends("layouts.master")

@section("content")

    <div class="reclam_container">



        <div class="content_reclam col-md-12">
            <h2>Your advertisements <a class="" href="/advertising/add">Add more +</a></h2>


            @if (count($myAds) > 0)
            <ul class="row list-unstyled center-block">
            @foreach($myAds as $ad)
                <div id="{{$ad->id}}">
                    <li class="col-md-3 col-sm-3  ad item_reclam_content">
                        <div class="center-block wrapper_reclam">
                            <h3>{{$ad->title}} </h3>
                            <p>Click Counter: {{$ad->clicks}}</p>
                            <p>{{$ad->description}} </p>
                            <img src="{{asset($ad->img)}}" alt="reclam">
                        </div>
                    </li>
                </div>
            @endforeach
            </ul>
            @else
                <p>There are no advertisments linked to your account</p>
            @endif
        </div>

    </div>

@stop