@extends("newdesign.layouts.master")

@section("content")
    <div class="profile-top text-center">
        <div class="container-fluid">
            <img class="img-circle" src="http://placehold.it/100x100" alt="">
            <p>Mathijs Van den Broeck</p>
            <p>mathijsvandenbroeck[at]gmail.com</p>
            <p>bio</p>

            <ul class="social list-inline">
                <li><a href="">Facebook</a></li>
                <li><a href="">Twitter</a></li>
                <li><a href="">Portfolio</a></li>
            </ul>
        </div>

        <!-- navigatie voor eigen projecten/favorites/... -->
    </div>

    <div class="container-fluid">
        <ul class="list-unstyled" id="projects">
            @for($i= 0; $i < 20; $i++)
                <li class="project">
                    <a href="" class="thumbnail">
                        <img src="http://placehold.it/200x200" alt="...">
                        <span>title</span>
                        <span class="pull-right">125 <span class="glyphicon glyphicon-heart"></span></span>
                    </a>
                </li>
            @endfor
        </ul>
    </div>
@stop