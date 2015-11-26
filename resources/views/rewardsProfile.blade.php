@extends('layouts.master')
@section("content")
    <div class="rewards_content row">
        <div class="rewards_left_container col-md-6">
            <ul>
                @for( $i =0; $i < 5; $i++)
                    <li class="badges_img"><img src="{{ asset('/assets/images/badges/badges_').$i.'.png' }}" alt="badge ">{{$i}}</li>

                @endfor
            </ul>
        </div>
        <div class="rewards_right_container col-md-6">
            <ul>
                @for( $j =0; $j < 5; $j++)
                    <li class="badges_img"><img src="{{ asset('/assets/images/badges/badges_').$j.'.png' }}" alt="badge">{{$j}}</li>

                @endfor
            </ul>
        </div>
    </div>

@stop
