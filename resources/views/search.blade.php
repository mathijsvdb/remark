@extends("layouts.master")

@section("content")
    <div class="project-top">
        <div class="container-fluid">
            <h1>Search results</h1>
        </div>
    </div>

    <div class="row">

        <div class="container-fluid search_container">

        <?php if(!isset($searches)){ ?>

        <h1>No search parameters given.</h1>

        <?php }else{ ?>

            <?php if(empty($searches)){ ?>

                <h1>Nothing found</h1>

                <p>We haven't found anything in our records. Please try and search something else.</p>

            <?php }else{ ?>

            <h1>This is what we've found</h1>

            <p>Is this not what you are looking for? Try again with different keywords.</p>

            <ul class="list-unstyled" id="projects">
                @foreach($searches as $project)
                    <li class="project">
                        <a href="/projects/{{ $project->id }}" class="thumbnail project-thumbnail">
                            <img src="/uploads/{{ $project->img }}" alt="">

                            <div class="project-details">
                                <p class="title">{{ $project->title }}</p>
                                <p class="description">{{ $project->body }}</p>
                            </div>
                        </a>
                    </li>
                @endforeach
            </ul>
            <?php }?>

        <?php }?>

        </div>
    </div>

@stop

@section("scripts")
@stop