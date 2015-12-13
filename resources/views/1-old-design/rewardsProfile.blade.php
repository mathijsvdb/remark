@extends('1-old-design.layouts.master')
@section("content")
    <div class="rewards_content row">

        <div class="rewards_left_container col-md-6">
            <h1>Yet to earn</h1>
            <ul>
                @for( $i = 0; $i < count($yettoearn); $i++)
                    <li class="badges_img "><img class="img-responsive img-rounded" src="{{ asset('/assets/images/badges/badges_').$yettoearn[$i].'.png' }}" alt="badge "></li>
                @endfor
            </ul>
        </div>
        <div class="rewards_right_container col-md-6">
            <h1>Earned badges</h1>
            <ul>
                @foreach($all_badges as $earnedBadges)
                    <li class="badges_img "><img class="img-responsive img-rounded" src="{{ asset('/assets/images/badges/badges_').$earnedBadges->badge_id.'.png' }}"></li>
                @endforeach
            </ul>
        </div>
    </div>

@stop
