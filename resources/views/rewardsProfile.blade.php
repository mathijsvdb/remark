@extends('layouts.master')
@section("content")
    <div class="rewards_content row">

        <div class="rewards_left_container col-md-6">
            <h1>Yet to earn</h1>
            <ul>
                @for( $i =0; $i < 5; $i++)
                    <li class="badges_img "><img class="img-responsive img-rounded" src="{{ asset('/assets/images/badges/badges_').$i.'.png' }}" alt="badge ">-naam badge-</li>

                @endfor
            </ul>
        </div>
        <div class="rewards_right_container col-md-6">
            <h1>Earend badges</h1>
            <ul>
                @for( $j =0; $j < 5; $j++)
                    <li class="badges_img "><img class="img-responsive img-rounded" src="{{ asset('/assets/images/badges/badges_').$j.'.png' }}" alt="badge">-naam badge-</li>

                @endfor
            </ul>
        </div>
    </div>

@stop
