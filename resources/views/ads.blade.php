@extends("layouts.master")

@section("content")

    <div class="reclam_container">

        <div class="reclam-top">
            <div class="container-fluid">
                <h1>Your advertisements</h1>
                    <a class="btn btn-primary" href="/advertising/add"><span class="glyphicon glyphicon-plus"></span>Add more</a>
            </div>
        </div>

        <div class="content_reclam col-md-12">



            @if (count($myAds) > 0)
            <ul class="row list-unstyled center-block">
            @foreach($myAds as $ad)
                <div id="{{$ad->id}}">

                    <li class="col-md-6 col-sm-6  ad item_reclam_content">
                        <div class="wrapper_reclam">
                            <img src="{{asset($ad->img)}}" class="col-ms-6" alt="reclam">
                            <div class=" info_reclam col-md-6">
                                <h3>{{$ad->title}} </h3>
                                <p>Click Counter: {{$ad->clicks}}</p>
                                <p>{{$ad->description}} </p>
                            </div>
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