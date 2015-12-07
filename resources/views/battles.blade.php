@extends("layouts.master")

@section("content")

    <div class="battle_text_intro">
        <h1 class="intro">Participate in a battle or vote</h1>

        <p>Do you want to get some exposure and earn badges? Participate in our monthly competition.<br>
        Don't want to join with your project? Vote on your favorite projects by clicking on them, <br>
        going to their page and like them. Participating will earn you rewards!</p>
    </div>

    <div class="battle_container ">
        <h1><img class="axe" src="http://game-icons.net/icons/lorc/originals/png/000000/transparent/battle-axe.png" alt="battle_icon">  {{$active_battle->name}}</h1>
        <div class="information_battle"><p>{{$active_battle->description}}</p></div>
        <ul class="row">
            @foreach($battle_projects as $project)
                <li class="col-md-2 content-box">
                    <a href="/projects/{{ $project->id }}">{{ $project->title }} <span class="glyphicon glyphicon-heart"> {{ $project->likes }}</span></a>
                    <img src="/uploads/{!! $project->img !!}" alt="">
                    <p>{{$project->body}}</p>

                </li>
            @endforeach
        </ul>
    </div>

    @if (count($done_battles) > 0)
    <div class="battle_text_intro">
        <h1 class="intro">Previous Battles</h1>
        <p>See who has won in the past.
            Want to join as well, check the battle above to see how you can win too!</p>
    </div>

    <div class="battle_container inactive">
        <h2><img class="axe" src="http://game-icons.net/icons/lorc/originals/png/000000/transparent/battle-axe.png" alt="battle_icon">  {{$inactive_battle->name}}</h2>
        <div class="information_battle"><p>{{$inactive_battle->description}}</p></div>
        <ul class="row">
            @foreach($done_battles as $project)
                <li class="col-md-2 content-box">
                    <a href="/projects/{{ $project->id }}">{{ $project->title }} <span class="glyphicon glyphicon-heart"> {{ $project->likes }}</span></a>
                    <img src="/uploads/{!! $project->img !!}" alt="">
                    <p>{{$project->body}}</p>

                </li>
            @endforeach
        </ul>
    </div>
    @endif

@stop

@section("scripts")
@stop