@extends("newdesign.layouts.master")

@section("content")
    <div class="profile-top text-center">
        <div class="container-fluid">
            <img class="img-circle img-profile" src="http://lorempixel.com/100/100/people" alt="">
            <p>Mathijs Van den Broeck</p>
            <p>bio</p>
            <p><i class="fa fa-envelope"></i> mathijsvandenbroeck&commat;gmail.com</p>

            <ul class="social list-inline">
                <li>
                    <a href="">
                        <span class="fa-stack fa-lg">
                            <i class="fa fa-circle fa-stack-2x"></i>
                            <i class="fa fa-facebook fa-stack-1x fa-inverse"></i>
                        </span>
                    </a></li>
                <li>
                    <a href="">
                        <span class="fa-stack fa-lg">
                            <i class="fa fa-circle fa-stack-2x"></i>
                            <i class="fa fa-twitter fa-stack-1x fa-inverse"></i>
                        </span>
                    </a></li>
                <li>
                    <a href="">
                        <span class="fa-stack fa-lg">
                            <i class="fa fa-circle fa-stack-2x"></i>
                            <i class="fa fa-globe fa-stack-1x fa-inverse"></i>
                        </span>
                    </a>
                </li>
            </ul>
        </div>

        <!-- navigatie voor eigen projecten/favorites/... -->
    </div>

    <ul class="list-inline" id="nav-2">
        <li><a href="/myprojects">My Projects</a></li>
        <li><a href="/favorites">My Favorites</a></li>
    </ul>

    <div class="container-fluid">
        @if(1 == rand(0, 1))
        <ul class="list-unstyled" id="projects">
            @for($i= 0; $i < 20; $i++)
                <li class="project">
                    <a href="" class="thumbnail">
                        <img src="http://lorempixel.com/250/250/abstract" alt="...">
                        <span>title</span>
                        <span></span>
                        <span class="pull-right">125 <span class="glyphicon glyphicon-heart"></span></span>
                    </a>
                </li>
            @endfor
        </ul>
        @else
            <div class="text-center">
                <p>You have no projects</p>
                <a class="btn btn-primary" href="/projects/add"><span class="glyphicon glyphicon-plus"></span> Add a project</a>
            </div>
        @endif
    </div>
@stop