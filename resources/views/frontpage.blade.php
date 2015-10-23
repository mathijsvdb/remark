@extends("layouts.master")

@section("content")
    @if(!empty(Session::get('info')))
        <div class="alert alert-success">
            <strong>{!! Session::get('info') !!}</strong>
        </div>
    @endif

    <header>
        <div class="header-content">
            <div class="header-content-inner">
                <h1>Do you want to make the most of your design?</h1>
                <hr>
                <p>At remark <b> students </b> like you post a design, then other students, start giving other students feedback on the design so that the students can learn from each other!</p>
                <a href="{{ url('/registreren') }}" class="btn btn-primary animation-bounce">Start here, It's FREE!</a>
            </div>
        </div>
    </header>

    <section id="spotlight">
        <h2>Spotlight</h2>
        <!-- <img src="http://placehold.it/350x150"> -->
        <div class="row">
            <div class="col-md-8">
                <div class="input-group">
                    <input type="text" class="form-control" aria-label="..." name="search" placeholder="search">
                    <div class="input-group-btn">
                        <button type="button" class="btn btn-default">Action</button>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="dropdown">
                    <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                        Filter by tag
                        <span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                        <li><a href="#">Web Design</a></li>
                        <li><a href="#">Illustrator</a></li>
                        <li><a href="#">Photoshop</a></li>
                        <li><a href="#">Mobile Design</a></li>
                        <li><a href="#">Logo's</a></li>
                        <li><a href="#">Posters</a></li>
                        <li><a href="#">Material Design</a></li>
                        <li><a href="#">Branding</a></li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="row">

        <div class="imagelist">
        @foreach($spotlight as $work)
                <div class="col-md-4">
                        <a href="/projects/{!! $work->id !!}">
                            <img style="width: 300px; height: 300px;list-style: none" src="/uploads/{!! $work->img !!}" alt="">
                        </a>
                        <a href="/profile/{!! $work->user_id !!}">
                            <p style="text-transform: uppercase">{!! $work->username !!}</p>
                        </a>
                </div>
        @endforeach
        </div>

        </div>
        
    </section>

@stop