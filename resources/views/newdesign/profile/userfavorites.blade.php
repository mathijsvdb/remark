<div class="container-fluid">
    @if(count($favorites) > 0)
        <ul class="list-unstyled" id="projects">
            @foreach($favorites as $favorite)
                <li class="project">
                    <a href="/projects/{{ $favorite->project->id }}" class="thumbnail project-thumbnail">
                        <img src="/uploads/{{ $favorite->project->img }}" alt="">

                        <div class="project-details">
                            <p class="title">{{ $favorite->project->title }}</p>
                            <p class="description">{{ $favorite->project->body }}</p>
                        </div>
                    </a>
                    <a href="#" class="username pull-left">{{ $favorite->project->user->username }}</a>
                    <span class="pull-right">{{ $favorite->project->likes->count() }} <span class="glyphicon glyphicon-heart"></span></span>
                    <span class="pull-right">{{ $favorite->project->favorites->count() }} <span class="glyphicon glyphicon-star"></span>&nbsp;</span>
                </li>
            @endforeach
        </ul>
    @else
        <div class="text-center">
            <h4>You have no favorites yet.</h4>
            <p>Click on the <i class="fa fa-star"></i> while checking out a project to favorite it.</p>
        </div>
    @endif
</div>