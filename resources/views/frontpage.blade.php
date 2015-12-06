@extends("layouts.master")

@section("content")
    <div class="front_container_bg"></div>
    @if(!empty(Session::get('info')))
        <div class="alert alert-success">
            <strong>{!! Session::get('info') !!}</strong>
        </div>
    @endif

    @if(!Auth::check())
    <header>
        <div class="header-content">
            <div class="header-content-inner">
                <h1>Do you want to make the most of your design?</h1>
                <hr>
                <p>At remark <b> students </b> like you post a design, then other students, start giving other students feedback on the design so that the students can learn from each other!</p>
                <a href="{{ url('/register') }}" class="btn btn-primary animation-bounce">Start here, It's FREE!</a>
            </div>
        </div>
    </header>
    @else
    <header>
        <div class="header-content">
            <div class="header-content-inner">
                <h1>Get remarks and learn</h1>
                <hr>
                <a href="{{ url('/projects/add') }}" class="btn btn-primary animation-bounce">Add a project!</a>
            </div>
        </div>
    </header>
    @endif


    <section id="spotlight">
        <h2>Spotlight</h2>
        <hr>
        <!-- <img src="http://placehold.it/350x150"> -->
        <div class="row">
            <div class="col-md-8">
                <form class="form" id="searchonfrontpage" action="#">
                    <div class="form-group">
                        <div class="input-group">
                            <input type="text" class="form-control" aria-label="..." name="search" placeholder="What are you looking for?" id="searchFRONT">
                            <input type="hidden" name="_token" id="tokenhiddensearch" value="{{ csrf_token() }}">
                            <div class="input-group-btn">
                                <button class="btn btn-default" type="submit" id="searchbutton">Search</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>


            <!--<div class="col-md-4">
                <form class="form" action="">
                    <div class="form-group">
                        <div class="dropdown">
                            <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                Filter by tag
                                <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                                <li><a href="">Web Design</a></li>
                                <li><a href="">Illustrator</a></li>
                                <li><a href="">Photoshop</a></li>
                                <li><a href="">Mobile Design</a></li>
                                <li><a href="">Logo's</a></li>
                                <li><a href="">Posters</a></li>
                                <li><a href="">Material Design</a></li>
                                <li><a href="">Branding</a></li>
                            </ul>
                        </div>
                    </div>
                </form>
            </div>-->
        </div>

        <div class="row">

            <?php //var_dump($projects); ?>

        <div class="imagelist">

                <?php if(!isset($searches)){ ?>

                    @foreach($spotlight as $work)
                        <div class="col-md-4">
                            <a href="/projects/{!! $work->id !!}">
                                <img style="width: 300px; height: 300px;list-style: none" src="/uploads/{!! $work->img !!}" alt="">
                            </a>
                            <a href="/profile/{!! $work->username !!}">
                                <p style="text-transform: uppercase">{!! $work->username !!}</p>
                            </a>
                        </div>
                    @endforeach

                <?php }else{ ?>

                    <?php if(empty($searches)){ ?>

                    <h1>No search found</h1>

                    <?php }else{ ?>

                    @foreach($searches as $work)
                        <div class="col-md-4">
                            <a href="/projects/{!! $work->id !!}">
                                <img style="width: 300px; height: 300px;list-style: none" src="/uploads/{!! $work->img !!}" alt="">
                            </a>
                            <a href="/profile/{!! $work->username !!}">
                                <p style="text-transform: uppercase">{!! $work->username !!}</p>
                            </a>
                        </div>
                    @endforeach

                    <?php }?>

                <?php }?>

        </div>

        </div>
        
    </section>

@stop

@section('scripts')
    <script>

        $.ajaxSetup({
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}
        });

        $(document).ready(function() {

            $("#searchonfrontpage").submit(function(e){
                e.preventDefault();

                var whattosearch = $("#searchFRONT").val();
                var _token = $("#tokenhiddensearch").val();

                var dataString = "search="+whattosearch+"&token="+_token;

                $.ajax({
                    type: "POST",
                    url: "/search",
                    data: dataString,
                    success: function(data){
                        $("body" ).html(data);
                    },
                    error: function(xhr, status, error) {
                        //var err = eval(xhr.responseText);
                        console.log(error,status, xhr.responseText);
                    }
                });
            });

        });
    </script>

@stop