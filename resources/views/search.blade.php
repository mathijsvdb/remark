@extends("layouts.master")

@section("content")

    <div class="row">

        <?php if(!isset($searches)){ ?>

        <h1>No search parameters given.</h1>

        <?php }else{ ?>

            <?php if(empty($searches)){ ?>

                <h1>No search found</h1>

            <?php }else{ ?>
                @foreach($searches as $work)
                    <div class="col-md-4">
                        <a href="/projects/{!! $work->id !!}">
                            <img style="width: 300px; height: 300px;list-style: none" src="/uploads/{!! $work->img !!}" alt="">
                        </a>
                        <a href="/profile/{!! $work->user_id !!}">

                        </a>
                    </div>
                @endforeach
            <?php }?>

        <?php }?>

    </div>

@stop

@section("scripts")
@stop