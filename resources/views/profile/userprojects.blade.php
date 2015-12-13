<div class="container-fluid">
    @if(count($projects) > 0)
        <ul class="list-unstyled" id="projects">
            @foreach($projects as $project)
                <li class="project">
                    <a href="/projects/{{ $project->id }}" class="thumbnail project-thumbnail">
                        <img src="/uploads/{{ $project->img }}" alt="">

                        <div class="project-details">
                            <p class="title">{{ $project->title }}</p>
                            <p class="description">{{ $project->body }}</p>
                        </div>
                    </a>
                    <a href="/profile/{{ $project->user->username }}" class="username pull-left">{{ $project->user->username }}</a>
                    <span class="pull-right">{{ $project->likes->count() }} <span class="glyphicon glyphicon-heart"></span></span>
                    <span class="pull-right">{{ $project->favorites->count() }} <span class="glyphicon glyphicon-star"></span>&nbsp;</span>
                </li>
            @endforeach
        </ul>
    @else
        <div class="text-center">
            @if(Auth::id() == $user->id)
                <h4>You have no projects yet.</h4>
                <p>Add your first project now!</p>
                <a class="btn btn-primary" href="/projects/add"><span class="glyphicon glyphicon-plus"></span> Add a project</a>
            @else
                <h4>This user has no projects yet.</h4>
            @endif
        </div>
    @endif
</div>