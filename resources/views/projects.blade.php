<h1>Projects</h1>

<a href="/projects/add">+ Add a project</a>


<ul>
    @foreach($projects as $project)
        <li>
            <a href="/projects/{{ $project->id }}">{{ $project->title }}</a>
        </li>
    @endforeach
</ul>
